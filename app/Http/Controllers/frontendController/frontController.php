<?php

namespace App\Http\Controllers\frontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function view;

class frontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('frontend.pages.index');
    }

    public function resume()
    {
        return  view('frontend.pages.resume');
    }

    public function portfolio(){
        return view('frontend.pages.portfolio');
    }

    public  function blog(){
        return view('frontend.pages.blog');
    }

    public  function contact(){
        return view('frontend.pages.contact');
    }
}
