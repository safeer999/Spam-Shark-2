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

class ApiIntegrationController extends Controller
{
    //
    public function index()
    {
         $user=Auth::user();

       $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
        return view('api.index',compact('task'));
    }
}
