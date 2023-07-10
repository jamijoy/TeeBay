<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title' => 'TeeBay Home'
        ];
        //for home.blade.php
        return(compact('data'));
    }
}
