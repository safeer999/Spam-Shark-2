<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Role;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\BulkVerification;
use App\Models\BulkVerificationResult;
use App\Jobs\ProcessEmailVerification;
use Carbon\Carbon;
use SplFileObject;
use PhpOffice\PhpSpreadsheet\IOFactory;
class AdminDashboardController extends Controller
{
  
    public function  index(){
      $user= Auth::user();
         $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
        return view('dashboard',compact('task'));
    }
     public function  adminprofile(){
       $user= Auth::user();
         $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
        return view('layouts.components.profile',compact('task'));
    }
    public function customedit()
    {
       $user= Auth::user();
         $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
      return view('layouts.components.customprofile',compact('task'), [
        'user' => Auth::user()
    ]);

        
    }
      public function custompassedit()
    {
       $user= Auth::user();
         $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
      return view('layouts.components.custompasswordedit',compact('task'), [
        'user' => Auth::user()
    ]);

}
public function setting()
{
   $user= Auth::user();
         $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
    return view('layouts.components.setting',compact('task'));
}




//new dashboar 
public function spamshark()
{
   $user=Auth::user();

       $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
  return view('spamshark.dashboard',compact('task'));
}
}

