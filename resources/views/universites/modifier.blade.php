@extends('parents.master')

@section('contenu')

<div class="card mt-5">
		<div class="card-header">
			Modification de l'universite
		</div>
		<div class="card-body">
			<form action="{{ route('universites.update',$universite->id) }}" method="POST">
				
		@method('PUT')
		@csrf

		<label for="">Nom </label>
		<input type="text" name="libelle" class="form-control mb-3" value="{{ $universite->libelle }}" required>

		<div class="mb-3">
		<label for="">Description </label>

		<textarea type ="text" name="description" class="form-control" rows="5" value="{{ $universite->description }}" required >
			
		</textarea>
	</div>

		<button type="submit" class="btn btn-warning">Modifier la categorie</button>
	</form>
		</div>
	</div>
@endsection