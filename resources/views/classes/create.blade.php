@extends('parents.master')


@section('contenu')

<div class="card mt-5">
	<div class="card-header">
		Ajouter une classe

	</div>
	<div class="card-body">
		<form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

			<label for="">Nom classe</label>
			<input type="text" name="nom" value="{{ old('nom')}}" class="form-control @error('nom') is-invalid @enderror">

			@error('nom')
			<small class="text-danger">{{ $message }}</small>
			@enderror<br>

			<label for="">Description </label>
			<textarea name="description"  class="form-control" rows="10"></textarea>

			<label for="">Nom Universite</label>

			<select name="universite" class="form-control" value="{{ old('universite')}}" >
				@foreach($universites as $universite)
				<option value="{{ $universite->id }}">{{ $universite->libelle }}</option>
				@endforeach
			</select>
			
			<button type="submit" class="btn btn-success mt-5">Enregistrer</button>
		</form>
	</div>
</div>

@endsection