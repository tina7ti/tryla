
@extends('default')

@section('content')

<h1>Bravo ! </h1>

<div class="">
  <a href="{{ action('LinksController@show', ['id' => $link->id ]) }}" style="margin-left: 10%; border-radius: 5px 5px; width: 100px; height: 50px;">
{{ route('links.show',$link) }}
  </a>
</div>

@stop
