@extends('parents.master')

@section('contenu')
<div class="card mt-5">
	<div class="card-header">
		<h1>Etudiant  {{ $etudiant->nom }}</h1>
	</div>

	<div class="card-body">

		<li class="list-group-item"><strong>Crée le :</strong>{{ $etudiant->created_at }}</li><br>

		<ul class="list-group">

			<li class="list-group-item">
				<img src="{{ $etudiant->imagePrincipale() }}" width="90">
			</li>

			<li class="list-group-item"><strong>Prenom :</strong> {{ $etudiant->prenom}}</li>

			<li class="list-group-item"><strong>Nom :</strong> {{ $etudiant->nom}}</li>

			<li class="list-group-item"><strong>Telephone :</strong> {{ $etudiant->phone}}</li>

			<li class="list-group-item"><strong>Adresse :</strong> {{ $etudiant->adresse}}</li>

			<li class="list-group-item"><strong>classe :</strong> {{$etudiant->classe->nom }}</li>

			
		</ul>
		
	</div>
</div>
@endsection