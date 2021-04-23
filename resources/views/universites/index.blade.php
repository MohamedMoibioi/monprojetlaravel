@extends('parents.master')

@section('contenu')

<div class="container">
	<div class="row">
		<div class="col-lg-12 jumbotron">
			<h3>Liste des universite</h3>
		</div>

		<div class="col-lg-12">
			<p>
				@if(session('message'))
				<div class="alert alert-success" role="alert">
					{{ session('message') }}
				</div>
				@endif
				@if(session('messagedelete'))
				<div class="alert alert-danger" role="alert">
					{{ session('messagedelete') }}
				</div>
				@endif
			</p>
			<div class="card">
				<p>
					<a href="{{route('universites.create')}}" class="float-right btn btn-outline-success mt-2 mr-2">Ajouter une universite</a>
					
				</p>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Id</th>
							<th>libelle</th>
							<th>Crée le</th>
							<th>Modifié le</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($universite as $universite)
						<tr>
							<td>{{ $universite->id }}</td>
							<td>{{ $universite->libelle }}</td>
							<td>{{ $universite->created_at }}</td>
							<td>{{ $universite->updated_at }}</td>
							<td>
								<div class="btn-group">
									<a href="{{ route('universites.show',$universite->id) }}" class="btn btn-info">detail</a>
									<a href="{{ route('universites.edit',$universite->id) }}" class=" btn btn-warning">modifier</a>

									<form action="{{ route('universites.destroy',$universite->id) }}" method="post">
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
	</div>
</div>
@endsection