<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\BulkVerification;
use App\Models\BulkVerificationResult;
use App\Jobs\ProcessEmailVerification;
use Carbon\Carbon;
use SplFileObject;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PasteEmailController extends Controller
{
    
   // --- NEW METHOD FOR PASTE EMAIL LIST ---
   public function pasteVerify(Request $request)
{
    $request->validate([
        'emails_to_verify' => 'required|string',
    ]);

    $user = Auth::user();
    if (!$user) {
        return back()->withErrors(['auth' => 'You must be logged in to perform this action.']);
    }

    $rawEmailsString = $request->input('emails_to_verify');

    $emails = collect(preg_split('/[\r\n, ]+/', $rawEmailsString))
        ->map(fn($email) => trim($email))
        ->filter(fn($email) => filter_var($email, FILTER_VALIDATE_EMAIL))
        ->unique()
        ->values();

    $totalEmails = $emails->count();

    if ($totalEmails === 0) {
        return redirect()->back()->with('error', 'No valid emails were provided for verification. Please enter emails in the correct format.');
    }

    // --- Remove credit check and deduction ---
    // if ($user->credits < $totalEmails) {
    //     return redirect()->back()->with('error', 'Insufficient credits to verify ' . $totalEmails . ' emails. You need ' . ($totalEmails - $user->credits) . ' more credits.');
    // }
    // $user->decrement('credits', $totalEmails);

    // Save as temporary file
    $uniqueFileName = 'pasted_list_' . Str::random(20) . '.txt';
    $userStoragePath = 'users/' . $user->id . '/uploads';
    $fileContent = $emails->implode("\n");

    try {
        Storage::put($userStoragePath . '/' . $uniqueFileName, $fileContent);
        $storedFilePath = $userStoragePath . '/' . $uniqueFileName;
    } catch (\Exception $e) {
        Log::error("Failed to store pasted email list for user {$user->id}: " . $e->getMessage());
        return back()->with('error', 'Failed to process your pasted email list. Please try again.');
    }

    $taskName = $this->generateRandomTaskName("Pasted Email List");

    $task = BulkVerification::create([
        'user_id' => $user->id,
        'task_name' => $taskName,
        'original_file_name' => "Pasted_List_" . now()->format('YmdHis') . ".txt",
        'stored_file_path' => $storedFilePath,
        'total_emails' => $totalEmails,
        'status' => 'pending',
        'progress' => 0,
    ]);

    // Dispatch background verification job
    ProcessEmailVerification::dispatch($task);

    return redirect()->route('tasksresult.index')->with('success', 'Your pasted email list has been submitted for verification! It will be processed in the background.');
}

    // --- END NEW METHOD ---

    private function generateRandomTaskName(string $originalFileName): string
    {
        $adjectives = ['New', 'Recent', 'Automated', 'Quick', 'Scheduled', 'Important', 'Fresh', 'Daily'];
        $verbs = ['Verification', 'Check', 'Scan', 'Audit', 'Process', 'Run'];
        $randomAdjective = $adjectives[array_rand($adjectives)];
        $randomVerb = $verbs[array_rand($verbs)];
        $timestamp = now()->format('M d, H:i');

        return "{$randomAdjective} {$randomVerb} - {$originalFileName} ({$timestamp})";
    }

    public function getTaskProgress(BulkVerification $task)
    {
        // Optional: Add authorization check if needed
        if (Auth::id() !== $task->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json([
            'id' => $task->id,
            'status' => $task->status,
            'progress' => $task->progress,
            'summary_counts' => $task->summary_counts, // Include summary if you want to display it live
        ]);
    }

    public function result($id)
    {
        $task = BulkVerification::find($id);

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found!');
        }

        $summaryCounts = BulkVerificationResult::where('bulk_verification_task_id', $task->id)
                                              ->groupBy('overall_status')
                                              ->selectRaw('overall_status, count(*) as count')
                                              ->pluck('count', 'overall_status')
                                              ->all();

        $statusMapping = [
            '✅ Safe' => '✅ Safe',
            '👥 Role-based' => '👥 Role-based',
            '🟠 Catch-All' => '🟠 Catch-All',
            '🔥 Disposable' => '🔥 Disposable',
            '📥 Inbox Full' => '📥 Inbox Full',
            '⚠️ Spam Trap' => '⚠️ Spam Trap',
            '❌ Invalid' => '❌ Invalid',
            '❓ Unknown' => '❓ Unknown',
            '🚫 Undeliverable' => '🚫 Undeliverable',
        ];

        $summary = [];
        foreach ($statusMapping as $dbStatusWithEmoji => $displayLabelWithEmoji) {
            $summary[$displayLabelWithEmoji] = $summaryCounts[$dbStatusWithEmoji] ?? 0;
        }

        $startedAt = $task->started_at ? Carbon::parse($task->started_at) : null;
        $completedAt = $task->completed_at ? Carbon::parse($task->completed_at) : null;

        $duration = 'N/A';
        if ($startedAt && $completedAt) {
            $duration = $completedAt->diffInSeconds($startedAt);
        }

        $execution = [
            'random' => $task->id,
            'status' => $task->status,
            'start_time' => $startedAt ? $startedAt->format('M d, Y H:i') : 'N/A',
            'end_time' => $completedAt ? $completedAt->format('M d, Y H:i') : 'N/A',
            'duration_seconds' => $duration,
            'total_emails' => $task->total_emails,
        ];

        $allEmailResults = BulkVerificationResult::where('bulk_verification_task_id', $task->id)->get();
        $data = $allEmailResults->map(function($result) {
            return [
                'email' => $result->email,
                'status' => $result->overall_status,
                'syntax' => $result->syntax,
                'role_based' => $result->role_based,
                'catch_all' => $result->catch_all,
                'disposable' => $result->disposable,
                'spam_trap' => $result->spam_trap,
                'smtp' => $result->smtp,
                'ssl' => $result->ssl,
            ];
        })->toArray();

        $colors = [
            '✅ Safe' => '#6b9e4a',
            '👥 Role-based' => '#b1aa3a',
            '🟠 Catch-All' => '#fbb615',
            '🔥 Disposable' => '#f9a01b',
            '📥 Inbox Full' => '#f15a22',
            '⚠️ Spam Trap' => '#f15a22',
            '❌ Invalid' => '#e02a2a',
            '❓ Unknown' => '#b0b0b0',
            '🚫 Undeliverable' => '#b0b0b0',
        ];

        $fileName = $task->original_file_name;

        return view('tasksresult.index', compact('fileName', 'execution', 'summary', 'data', 'colors'));
    }
}
