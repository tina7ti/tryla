<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Link;
use Input;

class LinksController extends Controller
{
    public function create()
    {
    	return view("links.create");
    }
    public function store()
    {
      $url = Input::get('url');
    /*  $link = Link::where('url',$url)->first();
      if (!$link) {
        $link = Link::create(['url' => $url]);
      }*/
      // tous ça sera remplacer par la fonction suivante :
     $link = Link::firstOrCreate(['url' => $url]);

     return view('links.success',compact('link'));
    }
    public function show($id)
    {
        $link = Link::findOrFail($id);
        return new RedirectResponse($link->url);
    }
}
