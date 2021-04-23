@extends('parents.master')


@section('contenu')

<div class="card mt-5">
	<div class="card-header ">
		Ajouter d'un etudiant

	</div>
	<div class="card-body ">
		<form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<label for="">Preom</label>
			<!-- <input type="text" name="username" value="{{ old('username') }}"> -->
			<input type="text" name="prenom" class="form-control" value="{{ old('prenom')}}"><br>

			<label for="">Nom</label>
			<input type="text" name="nom" class="form-control" value="{{ old('nom')}}"><br>

			<label for="">Telephone</label>
			<input type="text" name="phone" value="{{ old('phone')}}" class="form-control  @error('phone') is-invalid @enderror">
			@error('phone')
			<small class="text-danger">{{ $message }}</small>
			@enderror<br>

			<label for="">Adresse</label>
			<input type="email" name="adresse" class="form-control  @error('adresse') is-invalid @enderror" value="{{ old('adresse')}}">
			@error('adresse')
			<small class="text-danger">{{ $message }}</small>
			@enderror<br>

			<label for="">Profil</label>
			<input type="file" name="profil" class="form-control"><br>
		
			<label for="">Nom de le classe</label>
			<select name="classe" class="form-control" >
				@foreach($classes as $classe)
				<option value="{{ $classe->id }}">{{ $classe->nom }}</option>
				@endforeach
			</select>
			
			<button type="submit" class="btn btn-success mt-5">Enregistrer</button>
		</form>
	</div>
</div>

@endsection