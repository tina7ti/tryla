@include('errors')

{!! Form::open($options) !!}
<div class="form-group">
    {!! Form::label('title','Titre') !!}
    {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug','URL') !!}
    {!! Form::text('slug',$post->slug,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id','Catégorie') !!}
    {!! Form::select('category_id',$categories , $post->category_id,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tags[]','Tags') !!}
    {!! Form::select('tags[]', App\Tag::pluck('name','id') ,$post->tags->pluck('id') ,['class'=>'form-control','multiple'=>true]) !!}
</div>
<div class="form-group">
    {!! Form::label('content','Contenu') !!}
    {!! Form::textarea('content',$post->content,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <label>
        {!! Form::checkbox('online',0,$post->online) !!}
        En ligne ?
    </label>
</div>
<button class="btn btn-info">{{ $bouton }}</button>
{!! Form::close() !!}