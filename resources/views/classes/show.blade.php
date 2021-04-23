@extends('parents.master')

@section('contenu')
<div class="card mt-5">
	<div class="card-header">
		<h2>Details de la {{ $classe->nom}}</h2>
	</div><br>

	<li class="list-group-item"><strong>Crée le :</strong>{{ $classe->created_at }}</li><br>
	<div class="card-body">
		<ul class="list-group">
			<li class="list-group-item"><strong>Nom :</strong> {{ $classe->nom}}</li>

			<li class="list-group-item"><strong>Description :</strong> {{ $classe->description}}</li>

			<li class="list-group-item"><strong>Universite :</strong> {{ $classe->universite->libelle}}</li>

			<li class="list-group-item"><strong>Crée le :</strong>{{ $classe->created_at }}</li>
		</ul>
		
	</div>
</div>