<?php

namespace App\Http\Controllers\experınceController;

use App\Http\Controllers\Controller;
use http\Env\Request;

class experınceControl extends Controller
{
    public  function  index (){
        return view('admin.pages.experince.experinceList');
    }
    public function add( )
    {

        return view('admin.pages.experince.experincedd');
    }
}
