<?php

namespace App\Http\Controllers;

use \Request;

class HelloController extends Controller
{
    function __construct ()
    {

    }

    public function index($name)
    {
        dd(Request::ip());
        return "salut $name";
        return view('welcome');
    }
}