<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

/* Repositories */
use App\Repositories\CreateUsersRepositories;

class RegisterController extends Controller
{
    public function __construct(CreateUsersRepositories $createUsersRepositories)
    {
        $this->createUsersRepositories = $createUsersRepositories;
    }
    public function userRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'max:255', 'min:8'],
        ]);
        if ($validator->fails()) {
            $errors= $validator->errors();
            return view('NewRegister', ['errors'=>true,'message'=>json_decode(json_encode($errors),true)]);
        }
        else
        {
            $createUser = $this->createUsersRepositories->createUsers($request);
            if($createUser === true)
            {
                $data = ['userName' => $request->name];
                return view('components.success-alert', $data);
            }
            else{
                return view('NewRegister', ['errors'=>true,'message'=>array(array('Something went wrong please try again later !!!'))]);
            }
            
        }
    }

    public function userRegisterScreen(Request $request)
    {
        $data = ['errors'=>false,'message'=>''];
        return view('NewRegister', $data);
    }
}
