<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CreditBalanceController extends Controller
{
    //
     public function index()
    {
         $user=Auth::user();

       $task = BulkVerification::where('user_id', $user->id)
                                    ->orderByDesc('created_at')
                                    ->get();
        return view('credit.index',compact('task'));
    }
}
