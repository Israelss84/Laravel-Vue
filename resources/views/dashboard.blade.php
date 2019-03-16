@extends('app')

@section('content')

	<div class="row" id="crud">
		<div class="col-12">
			<h1>CRUD Laravel y Vue</h1>
		</div>
		<div class="col-7">
			<a href="#" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#crear">Nueva Tarea</a>
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
						<td><a href="#" class="btn btn-warning btn-sm" v-on:click.prevent = "editKeep(keep)">Editar</a></td>
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


		<!-- Modal Agregar -->
         <form method="POST" v-on:submit.prevent="createKeep">

            <div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Nueva Tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body"> 
                            
                    <div class="form-group">
                        <label for="keep">Crear Tarea</label>
                        <input type="text" name="keep" class="form-control" v-model="newKeep">
                        <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>

        </form>

        <!-- Modal Modificar -->
         <form method="POST" v-on:submit.prevent="updateKeep(fillKeep.id)">

            <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Editar Tarea</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body"> 
                            
                    <div class="form-group">
                        <label for="keep">Editar Tarea</label>
                        <input type="text" name="keep" class="form-control" v-model="fillKeep.keep">
                        <span v-for="error in errors" class="text-danger">@{{ error }}</span>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>

        </form>




	</div>

@endsection