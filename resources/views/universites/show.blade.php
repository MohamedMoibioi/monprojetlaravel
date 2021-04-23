@extends('parents.master')

@section('contenu')
<div class="card mt-5">
	<div class="card-header">
		Details Universite
	</div>
	<div class="card-body">
		<ul class="list-group">
			<li class="list-group-item"><strong>Nom :</strong> {{ $universite->libelle}}</li>

			<li class="list-group-item"><strong>Description :</strong> {{ $universite->description}}</li>

			<li class="list-group-item"><strong>Crée le :</strong>{{ $universite->created_at }}</li>
		</ul>
		
	</div>
</div>
@endsection