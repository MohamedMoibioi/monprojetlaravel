@extends('parents.master')

@section('contenu')

<div class="card mt-5">
	<div class="card-header">
		Liste des classes
		<a href="{{ route('classes.create') }}" class="btn btn-outline-success float-right">Ajouter une classe </a>
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>N°</th>
					<th>Nom</th>
					<th>universite</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($classes as $key => $classe)
				<tr>
					<td>{{ $key + 1 }}</td>
					<td>{{ $classe->nom }}</td>
					<td>{{ $classe->universite->libelle }}</td>
					<td>
						
						<div class="btn-group">
							<a href="{{ route('classes.show',$classe->id) }}" class="btn btn-info">detail</a>
							<a href="{{ route('classes.edit',$classe->id) }}" class=" btn btn-warning">modifier</a>

							<form action="{{ route('classes.destroy',$classe->id) }}" method="post">
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