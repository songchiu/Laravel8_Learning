<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends Controller
{
    //There's some difference between "invoke" and "constructor"
    //Find more on the Internet!!

    public function __invoke()
    {
        return 'text~~testing';
    }
}
