<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Http; 
use Illuminate\Support\Facades\Log;  



class SingleEmailVerifyController extends Controller
{
     public function __construct()
    {
        set_time_limit(500000); // Set to a large value to avoid timeout
    }
    
    public function signleverify(Request $request)
    {
       {
    $request->validate([
        'email' => 'required|email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
    ]);

    $email = $request->input('email');
   

    $emailToVerify = trim($request->input('email'));

        $disposableDomains = json_decode(file_get_contents(storage_path('app/disposableDomains.json')), true);
        $spamTraps = json_decode(file_get_contents(storage_path('app/spamTrapsList.json')), true);
        $spamTrapDomains = array_keys($spamTraps['domains']);

        // Process the single email
        $verificationResult = $this->processSingleEmail(
            $emailToVerify,
            $disposableDomains,
            $spamTrapDomains
        );

        // For single verification, you likely want to return JSON for API usage
        // or a specific view for a detailed single result.
        // Let's assume you want to return a JSON response with the details.
        // ✅ Return JSON instead of Blade view
    return response()->json($verificationResult);
}
    }
     private function processSingleEmail(string $email, array $disposableDomains, array $spamTrapDomains): array
    {
        $domain = substr(strrchr($email, "@"), 1);
        $username = strstr($email, '@', true);

        $syntax = $this->isValidSyntax($email) ? '✅ Safe' : '❌ Invalid';
        $disposable = in_array($domain, $disposableDomains) ? '🔥 Disposable' : null;
        $roleBased = $this->isRoleBased($username) ? '👥 Role-based' : null;
        $spamTrap = in_array($email, $spamTrapDomains) ? '⚠️ Spam Trap' : null; // Note: Your current spamTrapDomains check if email is in keys, not if domain is.
                                                                                // If spamTrapsList.json 'domains' key maps domain to data, then this `in_array($email, $spamTrapDomains)` might need adjustment.
                                                                                // Assuming for now, 'spamTrapDomains' contains actual email addresses.
        $smtp = $this->verifySMTP($email);
        $catchAll = $this->checkCatchAll($domain);
        $ssl = $this->isSslEnabled($domain);

        // Determine the final classification for this email
        $finalStatus = $this->determineFinalStatus($syntax, $spamTrap, $disposable, $roleBased, $smtp, $catchAll);

        return [
            'email' => $email,
            'status' => $finalStatus,
            'syntax' => $syntax,
            'role_based' => $roleBased,
            'catch_all' => $catchAll,
            'disposable' => $disposable,
            'spam_trap' => $spamTrap,
            'smtp' => $smtp,
            'ssl' => $ssl,
            'domain' => $domain, // <--- ADD THIS LINE
            'timestamp' => date('Y-m-d H:i:s'), // Changed from Carbon::now()
        ];
    }

    // Your existing public function verifyAllEmails()
    // ... (Your bulk verification function remains the same) ...

    // All your existing private helper functions (isValidSyntax, hasMxRecord, isRoleBased, verifySMTP, checkCatchAll, isSslEnabled, determineFinalStatus)
    // ... (Keep these exactly as they are) ...
    private function isValidSyntax($email)
    {
        return preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email);
    }
    private function hasMxRecord($domain)
    {
        return checkdnsrr($domain, 'MX');
    }
    private function isRoleBased($username)
    {
        $roleBasedList = [
            'admin', 'abuse', 'accounting', 'billing', 'business',
            'compliance', 'contact', 'devnull', 'editor', 'errors',
            'feedback', 'finance', 'hostmaster', 'hr', 'info',
            'inquiries', 'inquiry', 'jobs', 'legal', 'mail',
            'marketing', 'media', 'news', 'noc', 'noreply',
            'office', 'orders', 'postmaster', 'press', 'privacy',
            'registrar', 'recruit', 'recruitment', 'returns', 'root',
            'sales', 'security', 'service', 'services', 'shipping',
            'smtp', 'spam', 'staff', 'subscribe', 'support',
            'sysadmin', 'tech', 'technical', 'unsubscribe', 'usenet',
            'uucp', 'webmaster', 'www', 'hello'
        ];
        return in_array(strtolower($username), $roleBasedList);
    }

   private function verifySMTP($email)
{
    $ports = [25, 587, 465];
    $domain = substr(strrchr($email, "@"), 1);
    $from = 'safeer@aethondigital.com'; // Use a verified email address

    // Get MX records
    if (!getmxrr($domain, $mxhosts) || empty($mxhosts)) {
        return '❓ Unknown (No MX Records)';
    }

    $mxhost = $mxhosts[0];
    $fp = null;

    foreach ($ports as $port) {
        $fp = @fsockopen($mxhost, $port, $errno, $errstr, 5);
        if ($fp) {
            break;
        }
    }

    if (!$fp) {
        return '🚫 Connection Failed';
    }

    stream_set_timeout($fp, 2);

    $safeRead = function () use ($fp, $email) {
        $line = fgets($fp, 1024);
        if ($line !== false) {
            \Log::debug("SMTP read [$email]: " . trim($line));
        }
        return $line !== false ? trim($line) : false;
    };

    $safeWrite = function ($cmd) use ($fp, $email) {
        \Log::debug("SMTP write [$email]: $cmd");
        $written = fwrite($fp, $cmd . "\r\n");
        if ($written === false || feof($fp)) {
            throw new \Exception("Failed to write command: $cmd");
        }
    };

    try {
        $response = $safeRead();
        if (!$response || stripos($response, '220') === false) {
            throw new \Exception("No 220 greeting from server.");
        }

        $safeWrite("EHLO aethondigital.com");
        $response = $safeRead();
        if (stripos($response, '250') === false) {
            $safeWrite("HELO aethondigital.com");
            $response = $safeRead();
        }

        usleep(500000);
        $safeWrite("MAIL FROM:<$from>");
        $mailResponse = $safeRead();

        usleep(500000);
        $safeWrite("RCPT TO:<$email>");
        $rcptResponse = $safeRead();

        $safeWrite("QUIT");
        fclose($fp);

        \Log::info("SMTP response for $email: $rcptResponse");

        $catchAllResult = $this->checkCatchAll($domain);

        if (stripos($rcptResponse, '250') !== false) {
            if ($catchAllResult === '🟠 Catch-All') {
                return '📥 Possibly Deliverable (Catch-All)';
            } else {
                return '📥 Deliverable';
            }
        } elseif (stripos($rcptResponse, '550') !== false) {
            return '🚫 Undeliverable';
        } elseif (stripos($rcptResponse, '552') !== false) {
            return '📥 Inbox Full';
        } elseif (preg_match('/^4\d{2}/', $rcptResponse)) {
            return '❓ Temporary Error';
        } else {
            return '❓ Unknown';
        }

    } catch (\Exception $e) {
        if (is_resource($fp)) {
            fclose($fp);
        }
        \Log::error("SMTP verification error for $email: " . $e->getMessage());
        return '❓ Unknown';
    }
}


private function checkCatchAll($domain)
{
    $ports = [25];
    $fakeEmail = 'randomfakeuser_' . uniqid() . '@' . $domain;
    $from = 'safeer@aethondigital.com';

    if (!getmxrr($domain, $mxhosts) || empty($mxhosts)) {
        return '❌ No MX';
    }

    $mxhost = $mxhosts[0];
    $fp = null;

    foreach ($ports as $port) {
        $fp = @fsockopen($mxhost, $port, $errno, $errstr, 3);
        if ($fp) break;
    }

    if (!$fp) {
        return '🚫 SMTP Fail';
    }

    stream_set_timeout($fp, 2);

    $safeRead = function () use ($fp, $domain) {
        $line = fgets($fp, 1024);
        if ($line !== false) {
            \Log::debug("Catch-All read [$domain]: " . trim($line));
        }
        return $line !== false ? trim($line) : false;
    };

    $safeWrite = function ($cmd) use ($fp, $domain) {
        \Log::debug("Catch-All write [$domain]: $cmd");
        $result = @fwrite($fp, $cmd . "\r\n");
        if ($result === false || feof($fp)) {
            throw new \Exception("fwrite failed on: $cmd");
        }
        return $result;
    };

    try {
        $safeRead();
        $safeWrite("HELO yourdomain.com");
        $safeRead();

        $safeWrite("MAIL FROM:<$from>");
        $safeRead();

        $safeWrite("RCPT TO:<$fakeEmail>");
        $rcptResponse = $safeRead();

        $safeWrite("QUIT");
        fclose($fp);

        if (stripos($rcptResponse, "250") !== false) {
            return '🟠 Catch-All';
        } elseif (stripos($rcptResponse, "550") !== false) {
            return '✅ Not Catch-All';
        } else {
            return '❓ Unknown';
        }
    } catch (\Exception $e) {
        if (is_resource($fp)) {
            fclose($fp);
        }
        \Log::error("Catch-All error for {$domain}: " . $e->getMessage());
        return '❓ Unknown';
    }
}




    private function isSslEnabled($domain)
    {
        $context = stream_context_create(['ssl' => ['capture_peer_cert' => true]]);
        $stream = @stream_socket_client(
            "ssl://{$domain}:443",
            $errno,
            $errstr,
            5,
            STREAM_CLIENT_CONNECT,
            $context
        );

        if ($stream) {
            fclose($stream);
            return '✅ SSL Enabled';
        }

        return '❌ SSL Not Enabled';
    }



    private function determineFinalStatus($syntax, $spamTrap, $disposable, $roleBased, $smtp, $catchAll)
    {
        if ($syntax === '❌ Invalid') {
            return '❌ Invalid';
        } elseif ($spamTrap) {
            return '⚠️ Spam Trap';
        } elseif ($disposable) {
            return '🔥 Disposable';
        } elseif ($roleBased) {
            return '👥 Role-based';
        } elseif ($smtp === '🚫 Disabled') {
            return '🚫 Disabled';
        } elseif ($smtp === '📥 Inbox Full') {
            return '📥 Inbox Full';
        } elseif ($smtp === '❓ Unknown') {
            return '❓ Unknown';
        } elseif ($catchAll === '🟠 Catch-All') {
            return '🟠 Catch-All';
        }
        // If all checks passed and email is deliverable
        if ($smtp === '📥 Deliverable') {
            return '✅ Safe';
        }

        return '❓ Unknown'; // Fallback
    }
    
}
