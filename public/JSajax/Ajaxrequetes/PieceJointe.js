(function($){
	/* form ajout document agent */
	$("#btnAjoutDocument").on('click', function() {
		//$(this).html("En cours d'enregitrement...");
		//$(this).attr('backgroundColor','red');
	});

	/* link supprimer document agent */
	$('.linkDocSup').on('click', function(event) {
		event.preventDefault();
		let IdDoc = $(this).attr('id');
		let myUrl = $(this).attr('href');
		let routActuel = window.location.href;
		//console.log(routActuel);
		//alert(myUrl +'-'+ IdDoc);
		swal.fire({
			title: 'Suppression',
			text: 'voulez-vous vraiment supprimer cette Document',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'supprimer Document',
		}).then((result) => {
			if(result.isConfirmed){
				//swal.fire('suppression OK OK');
				$.ajax({
					url: myUrl,
					method: 'GET',
					data: {
						Id: IdDoc,
						_token: '{{csrf_token()}}'
					},
					success: function(response) {
					//_token: '{{csrf_token()}}'
						console.log(response);
						swal.fire(
							'suppression!',
							'Document supprimer avec success!',
							'success'
						).then((res) => {
							if (res.isConfirmed) {
								window.location.replace(routActuel);
							}
						});
						//window.location.replace(routActuel);
					}
				});
			}
		});
	});/* /End link supprimer document agent */

	/* validate form ajout document (piéce joint) agent */
	/*$("#formAjoutDocument").validate({
		rules : {
			docPieceJointe[] : {
         		required : true
        	}
        },
        messages: {
        	docPieceJointe[] : {
        		required : "veillez selectionner un ou plusieurs document"
        	}
        }
	});*/ /* /End validate form ajout document (piéce joint) agent */
})(jQuery); 
/* End function principal JQuery */