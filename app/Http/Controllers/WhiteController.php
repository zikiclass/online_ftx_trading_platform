<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Redirect;


use Auth;
class WhiteController extends Controller
{
    function dashboard_fnc(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $email = Auth::user()->email;
        $msgID = Auth::user()->message;
        //GET NOTIFICATION DETAILS
        $data = array(
            'message' => DB::table('notification')->where('email', $email)->orderBy('id', 'desc')->get(),
            'message_' => DB::table('notification')->where('email', $email)->where('status', 'UNREAD')->get(),
            'mainMsg' => DB::table('messages')->where('id', $msgID)->get(),
            'admin_settings' => DB::table('settings')->get(),
            'deposit_rec' => DB::table('transactions')->where('email', $email)->where('transact_type', 'deposit')->orderBy('id', 'desc')->get(),
            'withdraw_rec' => DB::table('transactions')->where('email', $email)->where('transact_type', 'withdraw')->orderBy('id', 'desc')->get(),
            'transactions' => DB::table('transactions')->where('email', $email)->orderBy('id', 'desc')->get(),
            'kyc_verification' => DB::table('kyc_verification')->where('email', $email)->get(),

            'reqIP' => request()->ip()
        );
        return view('white.dashboard', $data);
   
    }
    
}
