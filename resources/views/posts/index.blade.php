 @extends('default')



 @section('content')
     <p><a href="{{ route('news.create') }}" class="btn btn-success" style="float: right;">Ajouter un article</a></p>

     @foreach($posts as $post)

     <h1>{{ $post->title }}</h1>
     @if($post->category)
     <p><em style="color: cornflowerblue;">{{ $post->category->name }}</em></p>
     @endif
     <p>{{ $post->content }}</p>

     <p><a href="{{ route('news.edit',$post) }}" class="btn btn-info">Edit</a></p>

     @endforeach

 @stop