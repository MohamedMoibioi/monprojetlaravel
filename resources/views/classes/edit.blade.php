@extends('parents.master')

@section('contenu')

<div class="card mt-5">
	<div class="card-header">
		Modification classe
	</div>
	<div class="card-body">
		<form action="{{ route('classes.update',$classe->id) }}" method="POST" >
			
			@method('PUT')
			@csrf

			<label for="">Nom classe</label>
			<input type="text" name="nom" class="form-control mb-3" value="{{ $classe->nom }}" required>

			<label for="">Description </label>
			<textarea name="description"  class="form-control" rows="10"></textarea><br>

			
			<button type="submit" class="btn btn-warning">Modifier la classe</button>
		</form>
	</div>
</div>
@endsection