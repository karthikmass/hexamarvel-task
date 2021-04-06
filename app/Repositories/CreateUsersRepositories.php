<?php
namespace App\Repositories;
use App\User;

use Illuminate\Support\Facades\DB;
use Exception;

use Illuminate\Support\Facades\Log;

class CreateUsersRepositories
{
    public function createUsers($request)
    {
        try{
            DB::beginTransaction();
            $data['email'] = $request->email;
            $data['name'] = $request->name;
            $data['password'] = $this->make_password($request['password']);
            User::create($data);
            DB::commit();
            return true;
        }
        catch(Exception $e)
        {
            DB::rollback();
            Log::info($e->getMessage());
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


?>