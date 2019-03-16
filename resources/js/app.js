	new Vue({
		el: '#crud',
		created: function(){
			this.getKeeps();//Ejecuta el método al iniciar
		},
		data:{
			keeps: []
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
			}
		}
		
	});