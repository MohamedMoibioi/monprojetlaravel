@extends('parents.master')

@section('contenu')
<div class="card mt-5">
	<div class="card-header">
		Modification de l'etudiant
	</div>
	<div class="card-body">
		
		<form action="{{ route('etudiants.update',$etudiant->id) }}" method="POST" enctype="multipart/form-data">

			@csrf
			@method('PUT')
			
			<label for="">Preom</label>
			<input type="text" name="prenom" class="form-control" value="{{ $etudiant->prenom }}" required><br>

			<label for="">Nom</label>
			<input type="text" name="nom" class="form-control" value="{{ $etudiant->nom }}" required><br>

			<label for="">Telephone</label>
			<input type="text" name="phone" class="form-control   @error('phone') is-invalid @enderror" value="{{ $etudiant->phone }}" required>
			@error('phone')
			<small class="text-danger">{{ $message }}</small>
			@enderror<br>

			<label for="">Adresse</label>
			<input type="email" name="adresse" class="form-control  @error('adresse') is-invalid @enderror" value="{{ $etudiant->adresse }}" required>
			@error('adresse')
			<small class="text-danger">{{ $message }}</small>
			@enderror<br>

			<label for="">Profil</label>
			<input type="file" name="profil" class="form-control" value="{{ $etudiant->profil }}" required><br>
			
			<button type="submit" class="btn btn-warning mt-5">Modiffier</button>
		</form>
	</div>
</div>
@endsection