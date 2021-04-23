@extends('parents.master')

@section('contenu')

<h3>Enregistrement des universites</h3>
<div class="card mt-5">
	<form action="{{ route('universites.index') }}" method="post" enctype="multipart/form-data">

		@csrf

	<div class="mb-3">
		<label for="libelle" class="form-label">Nom</label>

		<input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" value="{{ old('libelle')}}">

		@error('libelle')
			<small class="text-danger">{{ $message }}</small>
		@enderror

	</div>

	<div class="mb-3">
		<label for="">Description </label>
		<textarea name="description"  class="form-control" rows="10" value="{{ old('description')}}"></textarea>

		<button type="submit" class="btn btn-success mt-5">Ajouter l'universite</button>
	</div>

	</form>

</div>
@endsection