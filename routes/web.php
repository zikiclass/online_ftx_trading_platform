<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\GreenController;
use App\Http\Controllers\WhiteController;
use App\Http\Controllers\OrangeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::get('investment', [MyController::class, 'investment_fnc'])->name('investment');
Route::get('terms', [MyController::class, 'terms_fnc'])->name('terms');
Route::get('faq', [MyController::class, 'faq_fnc'])->name('faq');

Route::get('register', [MyController::class, 'register_fnc'])->name('register');
Route::get('register_/{email}', [MyController::class, 'register_fnc_'])->name('register_');
Route::post('register_db', [MyController::class, 'register_db_fnc'])->name('register_db');
Route::get('reset', [MyController::class, 'reset'])->name('reset');
Route::post('reset_db', [MyController::class, 'reset_db'])->name('reset_db');

Route::get('login', [MyController::class, 'login_fnc'])->name('login');
Route::post('login_db', [MyController::class, 'login_db_fnc'])->name('login_db');

Route::get('forgot', [MyController::class, 'forgot_fnc'])->name('forgot');
Route::get('forgot_db', [MyController::class, 'forgot_db_fnc'])->name('forgot_db');
Route::get('/verifyemail', [MyController::class, 'verifyemail'])->name('verifyemail');
Route::post('emailverify_db', [MyController::class, 'emailverify_db'])->name('emailverify_db');
Route::get('/resetpassword', [MyController::class, 'resetpassword'])->name('resetpassword');
Route::post('reset_password_db', [MyController::class,  'reset_password_db'])->name('reset_password_db');

//Route::group(['middleware' => ['auth', 'auth.user','prevent-back']], function(){
Route::get('dashboard', [MyController::class, 'dashboard_fnc'])->name('dashboard');
Route::post('profile-update', [MyController::class, 'profile_update'])->name('profile-update');
Route::post('withdraw_', [MyController::class, 'withdraw_'])->name('withdraw_');
Route::get('removemsg', [MyController::class, 'removemsg'])->name('removemsg');
Route::post('dep_', [MyController::class, 'dep_'])->name('dep_');
Route::get('getWallet_/{wallet}', [MyController::class, 'getWallet_']);
Route::post('upload_proof', [MyController::class, 'upload_proof'])->name('upload_proof');
Route::post('kyc_upload', [MyController::class, 'kyc_upload'])->name('kyc_upload');
Route::get('sendmail', [MyController::class, 'sendmail'])->name('sendmail');
Route::post('changepassword', [MyController::class, 'changepassword'])->name('changepassword');
Route::get('read/{id}', [MyController::class, 'read'])->name('read');
Route::get('readall', [MyController::class, 'readall'])->name('readall');
Route::get('unreadall', [MyController::class, 'unreadall'])->name('unreadall');
//});




//G R E E E N    -----   D A S H B O A R D

Route::get('premium_dashboard', [GreenController::class, 'dashboard_fnc'])->name('premium_dashboard');

//E N D   O F  G R E E N  D A S H B O A R D

//O R A N G E    -----   D A S H B O A R D

Route::get('ultimate_dashboard', [OrangeController::class, 'dashboard_fnc'])->name('ultimate_dashboard');

//E N D   O F  O R A N G E   D A S H B O A R D

//W H I T E   -----   D A S H B O A R D

Route::get('retirement_dashboard', [WhiteController::class, 'dashboard_fnc'])->name('retirement_dashboard');

//E N D   O F  W H I T E    D A S H B O A R D



//Route::group(['middleware' => ['auth', 'auth.admin', 'prevent-back']], function(){
Route::get('admin_', [MyController::class, 'admin__'])->name('admin_');
Route::post('update_user_balance', [MyController::class, 'update_user_balance'])->name('update_user_balance');
Route::post('delete_user', [MyController::class, 'delete_user'])->name('delete_user');
Route::get('/admin_deposit_', [MyController::class, 'admin_deposit_']);
Route::get('/withdrawal_setup', [MyController::class, 'withdrawal_setup']);
Route::get('admin_verification_', [MyController::class, 'admin_verification_'])->name('admin_verification_');
Route::get('admin_message_', [MyController::class, 'admin_message_'])->name('admin_message_');
Route::get('admin_settings_', [MyController::class, 'admin_settings_'])->name('admin_settings_');
Route::post('update_transaction', [MyController::class, 'update_transaction'])->name('update_transaction');
Route::post('verify_kyc', [MyController::class, 'verify_kyc'])->name('verify_kyc');
Route::post('user_verification', [MyController::class, 'user_verification'])->name('user_verification');
Route::post('update_wallet', [MyController::class, 'update_wallet'])->name('update_wallet');
Route::post('withdraw_update_admin', [MyController::class, 'withdraw_update_admin'])->name('withdraw_update_admin');
Route::get('/setmessage_admin', [MyController::class, 'setmessage_admin'])->name('setmessage_admin');
Route::post('set_notification_db', [MyController::class, 'set_notification_db'])->name('set_notification_db');
Route::post('send_mail_db', [MyController::class, 'send_mail_db'])->name('send_mail_db');
Route::post('delete_message', [MyController::class, 'delete_message'])->name('delete_message');
Route::post('assign_notification_db', [MyController::class, 'assign_notification_db'])->name('assign_notification_db');
Route::get('/upgrade_to_user', [MyController::class, 'upgrade_to_user'])->name('upgrade_to_user');
Route::get('/upgrade_to_admin', [MyController::class, 'upgrade_to_admin'])->name('upgrade_to_admin');
Route::get('/changeplan', [MyController::class, 'changeplan'])->name('changeplan');
Route::post('changeplan_db', [MyController::class, 'changeplan_db'])->name('changeplan_db');
//});

Route::get('logout', [MyController::class, 'logout'])->name('logout');




