<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexaaaController extends Controller
{

    public function __construct()
    {
        $this->middleware('VerifyAdmin');
    }


    public function login(){
        dd(11);
    }
}
