
@extends('default')

@section('content')

<h1>Raccourcir un nouveau lien</h1>
<!-- apres le changement des 3 routes en action au debut etait vide maintenant ça  devient {{ route('links.store') }}-->
<form action="{{ route('links.store') }}" method="post" style="margin-left: 20%; margin-top: 4%; ">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div  class="form-group" style="width: 600px;">
		<label for="url" style="font-weight: bold; margin-bottom: 3%; font-size: 1.5em;" >Lien à raccourcir</label>
		<input type="text" name="url" id="url" placeholder="http://......" class="form-control">
	</div>
	<div style="margin-top: 3%;">
		<button class="btn btn-primary">Raccourcir</button>
	</div>
</form>

@stop
