<script src="{{asset('/JSajax/Ajaxrequetes/Projet.js')}}" type="text/javascript"></script>
<script src="{{asset('/JSajax/Ajaxrequetes/Agent.js')}}" type="text/javascript"></script>
<script src="{{asset('/JSajax/Ajaxrequetes/CongeAgent.js')}}" type="text/javascript"></script>

<script type="text/javascript">
	//function pour supprimer un projet //url: 'delete/projet',
	$(".show_confirm_Delete_Projet_URL").on('click', function(event) {
		event.preventDefault();
		let Id = $(this).attr('id');
		let dt = $(this).attr('data-my');
		//console.log("#"+Id);
		//$("#"+Id).html("V");
		//$("dt").addClass("btnSupprimerSelected");
		console.log('Id a Sup-> ' +Id);
		swal.fire({
			title: 'Suppression',
			text: 'voulez-vous vraiment supprimer ce projet',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'supprimer',
		}).then((result) => {
			if(result.isConfirmed){
				//swal.fire('suppression OK OK');
				//$(this).html('Suppression encours...');
				$.ajax({
					url: "{{route('admin.projets.projet.delete')}}",
					method: 'post',
					data: {
						_token: "{{ csrf_token() }}",
						id: Id
					},
					success: function(res){
						//$("#"+Id).html('');
						console.log(res);
						swal.fire(
							'suppression!',
							'Projet suppremer avec success!',
							'success'
						);
					}
				});
			}
		});
	}); /* /End function pour supprimer un projet */
</script>