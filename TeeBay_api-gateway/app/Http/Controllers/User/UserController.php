<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){
        $data = User::all();
        return(compact('data'));
    }

    public function login(){
        $data = [
            'message' => 'success'
        ];
        return(compact('data'));
    }


}
