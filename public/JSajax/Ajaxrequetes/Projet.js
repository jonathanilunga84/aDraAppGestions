(function($){
	/* methode Ajax pour le formulaire de Ajout Projet qui est view/Pages/Projet/listesProjets dans Modal */
	$("#formAjoutProjet").validate({
		rules : {
			numeroProjet : {
         		minlength : 2,
         		maxlength : 100
        	},
        	intituleProjet : {
         		required : true,
         		minlength : 2,
         		maxlength : 200
        	},
        	dateProjet : {
         		required : true,
         		minlength : 2,
         		maxlength : 15
        	},
        	dateFinProjet : {
         		required : true,
         		minlength : 2,
         		maxlength : 15
        	},
        	lieuProjet : {
         		required : true,
         		minlength : 2,
         		maxlength : 100
        	}
		},
		messages: {
			numeroProjet : {
        		minlength : 'Le numéro du prpjet doit avoir au minimun 2 caractère',
        		maxlength : 'Le numéro du prpjet doit avoir au max 100 caractère'
        	},
        	intituleProjet : {
        		required : "L'intitulé du projet est obligatoire",
        		minlength : 'Intitulé du projet doit avoir au minimun 2 caractère',
        		maxlength : 'Intitulé du projet doit avoir au max 200 caractère'
        	},
        	dateProjet : {
        		required : 'date du projet est obligatoire',
        		minlength : 'date du projet doit avoir au minimun 2 caractère',
        		maxlength : 'date du projet doit avoir au max 15 caractère'
        	},
        	dateFinProjet : {
        		required : 'date fin projet est obligatoire',
        		minlength : 'date fin projet doit avoir au minimun 2 caractère',
        		maxlength : 'date fin projet doit avoir au max 15 caractère'
        	},
        	lieuProjet : {
        		required : 'Le lieu(e) du projet est obligatoire',
        		minlength : 'Le lieu(e) du projet doit avoir au minimun 2 caractère',
        		maxlength : 'Le lieu(e) du projet doit avoir au max 100 caractère'
        	}
		},
		submitHandler: function(form){
			let _token = $('input[type="hidden"]').attr('value'); 
    		let myUrl = $("#formAjoutProjet").attr('action');
    		let myMethode = $("#formAjoutProjet").attr('method');
    		let numeroProjet = $('#numeroProjet').val();	
    		let intituleProjet = $('#intituleProjet').val();
    		let dateProjet = $('#dateProjet').val();
    		let dateFinProjet = $('#dateFinProjet').val();
    		let lieuProjet = $('#lieuProjet').val();

    		/* button */
    		$('#btnSendProjet').html("Encours d'enregitrement...");
			$('#btnSendProjet').attr('disabled',true);
    		$.ajax({
    			url:myUrl,
      			method:myMethode,
			    data:{
			        _token,
			        numeroProjet,
			        intituleProjet,
			        dateProjet,
			        dateFinProjet,
			        lieuProjet
			    },
			    dataType:'json',
			    beforeSend:function(){
			        //console.log('vidange du span');
			        $(document).find('span.error-text').text('');
    			},
    			success:function(data){
    				console.log(data);
			        if(data.status == 0){
			          console.log(data.error);			          
			          $.each(data.error, function(prefix, val){
			            console.log("var prefix "+prefix+" ::valeur "+val);
			            $('span.'+prefix+'_error').text(val[0]);
			          });
			          $('#btnSendProjet').html('Enregister');
			          $('#btnSendProjet').attr('disabled',false);
			          //$('#BtnSubmitFormation').css('backgroundColor','');
			        }else{
			        	if (data.status == 1) {
			        		//document.getElementById('BtnSubmitFormation').reset();
			        		$('input[type=text]').val('');
			        	    console.log(data.messageSucces);
					        alert(data.messageSucces);
					        //$('#successMessage').html('Votre messages est bien envoyer avec succes');
					        $('#btnSendProjet').html('Enregister');
					        $('#btnSendProjet').attr('disabled',false);
					    	//$('#btnSendProjet').css('backgroundColor','');
					    }else{
					    	alert("Probleme lié au formulaire ou autre");
					    }
		
			        }
		    	},
		    	error:function(error){
		        	console.log(error.responseText);
		        	alert('Error sur le serveur 500');
		    	}
    		});
		}
	});/* /End formAjoutProjet*/

	/* methode Ajax pour le formulaire de Modification Projet qui est view/Pages/Projet/listesProjets dans Modal */
	//fectchOneProjetAjax();
	//function fectchOneProjetAjax(){}
	/* requete pour recuperer les infos d'un seul projet */
	$('.btnEditProjet').on('click', function(event){
		event.preventDefault();
		let getId = $(this).attr('id');
		//console.log(getId);
		//let currentElement = $(this).attr('id');
		//console.log(currentElement);
		//$(this).html('patienter...');
		//currentElement.html('load..');
		//currentElement.innerHtml="gggg";
		/*var myV = $('#myC');
		myV.html('Ngt My5');*/

		$.ajax({
			url: 'infos/projet/ajax',
			method: 'GET',
			data: {
				Id: getId,
				_token: '{{csrf_token()}}'
			},
			success: function(response) {
				//_token: '{{csrf_token()}}'
				console.log(response.infosOneProjet);//console.log(response.getInfosProjet);
				$("#intituleProjetModif").val(response.infosOneProjet.intituleProjet);
				$("#dateProjetModif").val(response.infosOneProjet.dateProjet);
				$("#dateFinProjetModif").val(response.infosOneProjet.dateFinProjet);
				$("#lieuProjetModif").val(response.infosOneProjet.lieuProjet);
				$("#IdModif").val(response.infosOneProjet.id);
			}
		});
	});/* /End request Get InfosOneProjet */

	/* methode Ajax pour le formulaire de Modification Projet qui est view/Pages/Projet/listesProjets dans Modal */
	$("#formModifProjet").validate({
		rules : {
			numeroProjetM : {
         		minlength : 2,
         		maxlength : 100
        	},
        	intituleProjetModif : {
         		required : true,
         		minlength : 2,
         		maxlength : 200
        	},
        	dateProjetModif : {
         		required : true,
         		minlength : 2,
         		maxlength : 15
        	},
        	dateFinProjetModif : {
         		required : true,
         		minlength : 2,
         		maxlength : 15
        	},
        	lieuProjetModif : {
         		required : true,
         		minlength : 2,
         		maxlength : 100
        	}
		},
		messages: {
			numeroProjetM : {
        		minlength : 'Le numéro du prpjet doit avoir au minimun 2 caractère',
        		maxlength : 'Le numéro du prpjet doit avoir au max 100 caractère'
        	},
        	intituleProjetModif : {
        		required : "L'intitulé du projet est obligatoire",
        		minlength : 'Intitulé du projet doit avoir au minimun 2 caractère',
        		maxlength : 'Intitulé du projet doit avoir au max 200 caractère'
        	},
        	dateProjetModif : {
        		required : 'date du projet est obligatoire',
        		minlength : 'date du projet doit avoir au minimun 2 caractère',
        		maxlength : 'date du projet doit avoir au max 15 caractère'
        	},
        	dateFinProjetModif : {
        		required : 'date fin projet est obligatoire',
        		minlength : 'date fin projet doit avoir au minimun 2 caractère',
        		maxlength : 'date fin projet doit avoir au max 15 caractère'
        	},
        	lieuProjetModif : {
        		required : 'Le lieu(e) du projet est obligatoire',
        		minlength : 'Le lieu(e) du projet doit avoir au minimun 2 caractère',
        		maxlength : 'Le lieu(e) du projet doit avoir au max 100 caractère'
        	}
		},
		submitHandler: function(form){
			let _token = $('input[type="hidden"]').attr('value'); 
    		let myUrl = $("#formModifProjet").attr('action');
    		let myMethode = $("#formModifProjet").attr('method');
    		let numeroProjetM = $('#numeroProjetM').val();	
    		let intituleProjetModif = $('#intituleProjetModif').val();
    		let dateProjetModif = $('#dateProjetModif').val();
    		let dateFinProjetModif = $('#dateFinProjetModif').val();
    		let lieuProjetModif = $('#lieuProjetModif').val();
    		let IdModif = $('#IdModif').val();

    		/* button */
    		$('#btnSendModifProjet').html("Encours de modification...");
			$('#btnSendModifProjet').attr('disabled',true);
    		$.ajax({
    			url:myUrl,
      			method: "put",
			    data:{
			        _token,
			        numeroProjetM,
			        intituleProjetModif,
			        dateProjetModif,
			        dateFinProjetModif,
			        lieuProjetModif,
			        IdModif
			    },
			    dataType:'json',
			    beforeSend:function(){
			        //console.log('vidange du span');
			        $(document).find('span.error-text').text('');
    			},
    			success:function(data){
    				console.log(data);
			        if(data.status == 0){
			          console.log(data.error);			          
			          $.each(data.error, function(prefix, val){
			            console.log("var prefix "+prefix+" ::valeur "+val);
			            $('span.'+prefix+'_error').text(val[0]);
			          });
			          $('#btnSendModifProjet').html('Enregister');
			          $('#btnSendModifProjet').attr('disabled',false);
			          //$('#BtnSubmitFormation').css('backgroundColor','');
			        }else{
			        	if (data.status == 1) {
			        		//document.getElementById('BtnSubmitFormation').reset();
			        		$('input[type=text]').val('');
			        	    console.log(data.messageSucces);
					        //alert(data.messageSucces);
					        swal.fire(
								'Modification!',
								'Projet modification avec success!',
								'success'
							);
					        $('#btnSendModifProjet').html('Enregister');
					        $('#btnSendModifProjet').attr('disabled',false);
					    	//$('#btnSendProjet').css('backgroundColor','');
					    	$("#modal-ModifProjet").modal('hide');
					    }else{
					    	alert("Probleme lié au formulaire ou autre");
					    }
		
			        }
		    	},
		    	error:function(error){
		        	console.log(error.responseText);
		        	alert('Error sur le serveur 500');
		    	}
    		});
		}
	});/* /End formModifProjet*/

	//fectchAllProjetAjax(); //"{{route('admin.projets.listesProjets.fectchAllProjetAjax')}}",
	function fectchAllProjetAjax(){
		$.ajax({
			url: 'listes/projet/ajax',
			method: 'GET',
			success: function(res){
				console.log(res);
				$("#show_all_projets").html(res);
			}
		});
	}

	//function pour supprimer un projet
	/*$(".show_confirm_Delete_Projet_URL").on('click', function(event) {
		event.preventDefault();
		let Id = $(this).attr('id');
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
				$.ajax({
					url: 'delete/projet',
					method: 'post',
					data: {
						_token: "{{ csrf_token() }}",
						id: Id
					},
					success: function(res){
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
	});*/ /* /End delete ajax methode */

})(jQuery); 
/* End function principal JQuery */