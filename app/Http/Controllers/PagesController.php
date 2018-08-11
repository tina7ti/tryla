<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function about()
    {
        $title = "A propos";
        return view('pages/about',['title' => $title] );
    }

    public function contact()
    {
        Mail::send(['emails.contact','emails.contact-text'],['username' => 'test'], function($message)
        {
            $message->to('amel77aad@gmail.com')->subject('welcome');
        });

    }
}
