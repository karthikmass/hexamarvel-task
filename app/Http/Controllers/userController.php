<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    //
    //$path = $request->file('form_field_file_' . $fieldDetails['custom_field_id'])->move($resultData['folderDirectory'], $resultData['fileName']);

    public function uploadProfilePic($request)
    {
        return true;
    }
}
