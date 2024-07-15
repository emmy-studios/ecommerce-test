<?php

namespace App\Http\Controllers\Accounts;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordMail;
use App\Models\Core\Websiteinfo;
use App\Models\User;

class PasswordController extends Controller
{
    public function forgot()
    {
        $websiteInfo = Websiteinfo::first();

        return view('accounts.password.forgot-password', ['websiteInfo' => $websiteInfo]);
    }

    public function forgotPassword(Request $request)
    {
        
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) {

            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            
            return redirect()->back()->with('success', 'Please check your email and reset your password');

        } else {
            return redirect()->back()->withErrors(['error' => 'Email Not Found in the System']);
        }
    }

    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            
            //$data['user'] = $user;
            //$data['websiteInfo'] = Websiteinfo::first();
            $websiteInfo = Websiteinfo::first();
            
            return view('accounts.password.reset-password', ['websiteInfo' => $websiteInfo, 'user' => $user]);

        } else {
            abort(404);
        }
    }

    public function resetPost($token, Request $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if (!empty($user)) {
            
            if ($request->password == $request->password_confirmation) {
                
                $user->password = Hash::make($request->password);
                if (empty($user->email_verified_at)) {
                    $user->email_verified_at = date('Y-m-d H:i:s');
                }
                $user->remember_token = Str::random(40);
                $user->save();

                return redirect('login')->with('success', 'Password Successfully Changed');

            } else {
                return redirect()->back()->withErrors(['error' => 'Password fields do not match!']);
            }

        } else {
            abort(404);
        }
    }

}
