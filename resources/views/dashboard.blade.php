@extends('app')

@section('content')

	<div class="row" id="crud">
		<div class="col-12">
			<h1>CRUD Laravel y Vue</h1>
		</div>
		<div class="col-7">
			<a href="#" class="btn btn-primary float-right mb-3">Nueva Tarea</a>
			<table class="table table-hover table-striped" >
				<thead>
					<th>ID</th>
					<th>Tarea</th>
					<th colspan="2">
						
					</th>
				</thead>
				<tbody>
					<tr v-for="keep in keeps">
						<td>@{{keep.id}}</td>
						<td>@{{keep.keep}}</td>
						<td><a href="#" class="btn btn-warning btn-sm">Editar</a></td>
						<td><a href="#" class="btn btn-danger btn-sm" v-on:click.prevent = "removeKeep(keep)">Eliminar</a></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-5">
			<pre>
				@{{ $data }}
			</pre>
		</div>
	</div>

@endsection