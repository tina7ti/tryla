<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        $title = "A propos";
        return view('pages/about',['title' => $title] );
    }
}
