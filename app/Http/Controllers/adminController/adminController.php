<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public  function login(){
        return view('admin.login');
    }
}
