@extends('parents.master')

@section('contenu')

<div class="card mt-5">
	<div class="card-header">
		Liste des etudiants
		<a href="{{ route('etudiants.create') }}" class="btn btn-outline-success ">Ajouter un etudiant</a>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>N°</th>
					<th>Prenom</th>
					<th>Nom</th>
					<th>telephone</th>
					<th>adresse</th>
					<th>classe</th> 
					<th>Profil</th> 
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($etudiants as $key => $etudiant)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $etudiant->prenom }}</td>
					<td>{{ $etudiant->nom }}</td>
					<td>{{ $etudiant->phone }}</td>
					<td>{{ $etudiant->adresse }}</td>
					<td>{{ $etudiant->classe->nom }}</td>
					<td>
						<img src="{{ $etudiant->imagePrincipale() }}" width="50">
					</td> 
					
					<td>

						<div class="btn-group">
							<a href="{{ route('etudiants.show',$etudiant->id) }}" class="btn btn-info">detail</a>
							<a href="{{ route('etudiants.edit',$etudiant->id) }}" class=" btn btn-warning">modifier</a>

							<form action="{{ route('etudiants.destroy',$etudiant->id) }}" method="post">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-danger">supprimer</button>
							</form>
						</div>

					</td>
				</tr> 
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection