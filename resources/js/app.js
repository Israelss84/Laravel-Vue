	new Vue({
		el: '#crud',
		created: function(){
			this.getKeeps();//Ejecuta el método al iniciar
		},
		data:{
			keeps: [],
			newKeep: '',
			errors: [],
			fillKeep: {'id': '', 'keep': ''}
		},
		methods: {
			getKeeps(){
				var urlKeeps = 'tasks';
				axios.get(urlKeeps).then( response => {
					this.keeps = response.data
				});
			},
			removeKeep(dato){
				var url = 'tasks/' + dato.id;
				axios.delete(url).then( response => {					
					this.getKeeps();
					toastr.success( 'El ID ' + dato.id + ' fue eliminado correctamente.');
				});
			},
			createKeep(){
				var urlcreate = "tasks";
				axios.post(urlcreate, { keep: this.newKeep }).then( response => {
					this.getKeeps();
					this.newKeep = "";
					this.errors = [];
					$('#crear').modal('hide');
					toastr.success('Nueva Tarea creada con éxito');

				}).catch( error => {
					this.errors = error.response.data
				});
			},
			editKeep(keep){
				this.fillKeep.id = keep.id;
				this.fillKeep.keep = keep.keep;
				$('#editar').modal('show');				
			},
			updateKeep(id){
				url = 'tasks/' + id;
				axios.put(url, this.fillKeep).then(response => {
					this.getKeeps();
					this.fillKeep = {'id': '', 'keep': ''};
					this.errors = [];
					$('#editar').modal('hide');
					toastr.success('Tarea actualizada con éxito');
				}).catch( error => {
					this.errors = error.response.data
				});
			}
		}
		
	});