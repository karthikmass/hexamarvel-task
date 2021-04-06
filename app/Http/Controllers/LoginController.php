<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function LoginScreen(Request $request)
    {
        $data = ['errors'=>false,'message'=>''];
        return view('Login', $data);
    }

    public function userLogin(Request $request)
    {
        $verifyUser = User::where('email', $request->email)->first();
        if(!empty($verifyUser))
        {
            $dbString = $verifyUser->password;
            $verify = $this->verify_Password($dbString, $request->password);
            if($verify)
            {
                $data = ['userName' => $verifyUser->name];
                return view('components.success-login-alert ', $data);
            }
            return view('components.failure-password-login-alert ');
        }
        return view('components.failure-login-alert ');
    } 

    public function verify_Password($dbString, $password)
    {
        $pieces = explode("$", $dbString);

        if ($pieces[0] != 'pbkdf2_sha256') {
            return false;
        }

        $iterations = $pieces[1];
        $salt = $pieces[2];
        $old_hash = $pieces[3];

        $hash = hash_pbkdf2("SHA256", $password, $salt, $iterations, 0, true);
        $hash = base64_encode($hash);
        if ($hash == $old_hash) {
            return true;
        } else {
            return false;
        }
    }

    public static function make_password($password)
    {
        $algorithm = "pbkdf2_sha256";
        $iterations = 10000;

        $newSalt = openssl_random_pseudo_bytes(6);
        $newSalt = base64_encode($newSalt);

        $hash = hash_pbkdf2("SHA256", $password, $newSalt, $iterations, 0, true);
        $toDBStr = $algorithm . "$" . $iterations . "$" . $newSalt . "$" . base64_encode($hash);

        return $toDBStr;
    }
}
