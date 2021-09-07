<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller //every controller MUST extend Comtroller
{
    public function home()
    {
        return view('welcome');
    }

    public function get_test()
    {
        
    }
}
