(function($){
	$('.btnAjoutCongeAgent').on('click', function(event){
		event.preventDefault();
		let getId = $(this).attr('id');
		let getUrl = $(this).attr('href'); //'infos/agent/ajax'
		//console.log(getId);
		//console.log(getUrl);
		//alert(getId);
		//let currentElement = $(this).attr('id');
		//console.log(currentElement);
		//$(this).html('patienter...');
		//currentElement.html('load..');
		//currentElement.innerHtml="gggg";
		/*var myV = $('#myC');
		myV.html('Ngt My5');*/

		$.ajax({
			/*url: 'infos/agent/ajax',*/
			url: getUrl,
			method: 'GET',
			data: {
				id: getId,
				_token: '{{csrf_token()}}'
			},
			success: function(response) {
				//_token: '{{csrf_token()}}'
				//console.log(response.getInfosAgent);
				$("#identite").val(response.getInfosAgent.nom +" "+ response.getInfosAgent.prenom);
				$("#identiteId").val(response.getInfosAgent.id);
			}
		});
	});/* /End request Get InfosAgent */

	/* methode Ajout Conge */ 
	$("#formAjoutConge").validate({
		rules : {
			identiteId : {
         		required : true, 
        	},
			identite : {
         		required : true, 
         		minlength : 2,
         		maxlength : 100
        	},
        	/*projet_idConge : {
         		required : true, 
         		maxlength : 200
        	},*/
        	circonstanceConge : {
         		required : true, 
         		maxlength : 100
        	},
        	totalJourPrevueConge : { 
        		required: true,
         		maxlength : 100
        	},
        	congeDejaPris : {
        		maxlength : 100
        	},
        	nbrJrD : {
        		required : true,
        		maxlength : 100
        	},
        	nbrJourR : {
        		maxlength : 100
        	},
        	dateDepart : {
         		maxlength : 15
        	},
        	dateRetour : {
         		maxlength : 15
        	}
        },
        messages: {
        	identite : {
        		required : "L'identite est obligatoire",
        		minlength : "L'identite doit avoir au minimun 2 caractère",
        		maxlength : "L'identite doit avoir au max 100 caractère"
        	},
        	/*projet_idConge : {
        		required : "Le projet est obligatoire",
        		maxlength : "Le projet doit avoir au max 200 caractère"
        	},*/
        	circonstanceConge : {
        		maxlength : "Circonstance Conge doit avoir au max 100 caractère"
        	},
        	totalJourPrevueConge : { 
        		required : "le Total des jours prevue obligatoire",
        		maxlength : "Duéer Conge doit avoir au max 100 caractère"
        	},
        	nbrJrD : {
        		required : "Le nombre de jours demande obligatoire",
        		maxlength : "Le nombre de jours demandé doit avoir au max 100 caractère"
        	},
        	nbrJourR : {
        		maxlength : "Le nombre de jour restant doit avoir au max 100 caractère"
        	},
        	dateDepart : {
         		maxlength : "Date de dapart Conge doit avoir au max 15 caractère"
        	},
        	dateRetour : {
         		maxlength : "Date de retour Conge doit avoir au max 15 caractère"
        	},
        },
        submitHandler: function(form){
        	let _token = $('input[type="hidden"]').attr('value'); 
    		let myUrl = $("#formAjoutConge").attr('action');
    		let myMethode = $("#formAjoutConge").attr('method');
    		let identiteId = $('#identiteId').val();identiteId
    		let identite = $('#identite').val();
    		//let projet_idConge = $('#projet_idConge').val();
    		let circonstanceConge = $('#circonstanceConge').val();
    		let totalJourPrevueConge = $('#totalJourPrevueConge').val();
    		let congeDejaPris = $('#congeDejaPris').val();
    		let nbrJrD = $('#nbrJrD').val();
    		let nbrJourR = $('#nbrJourR').val();
    		let explicationConge = $('#explicationConge').val();
    		let dateDepart = $('#dateDepart').val();
    		let dateRetour = $('#dateRetour').val();

    		$('#btnSendAjoutConge').html("Encours d'enregitrement...");
			$('#btnSendAjoutConge').attr('disabled',true);

			$.ajax({
    			url:myUrl,
      			method:myMethode,
      			data:{
			    	_token,
			    	identiteId,
			        identite,
			        /*projet_idConge,*/
			        circonstanceConge,
			        totalJourPrevueConge,
			        congeDejaPris,
			        nbrJourR,
			        nbrJrD,
			        explicationConge,
			        dateDepart,
			        dateRetour
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
			          $('#btnSendAjoutConge').html('Enregister');
			          $('#btnSendAjoutConge').attr('disabled',false);
			          //$('#BtnSubmitFormation').css('backgroundColor','');
			        }else{
			        	if (data.status == 1) {
			        		$('input[type=text]').val('');
			        	    console.log(data.messageSucces);
					        alert(data.messageSucces);
					        //$('#successMessage').html('Votre messages est bien envoyer avec succes');
					        $('#btnSendAjoutConge').html('Enregister');
					        $('#btnSendAjoutConge').attr('disabled',false);
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
	});
	/* /End methode Ajout Conge */ 
	

	/* methode pour la suppression d'un Conge */
	$('.show_confirm_Delete_Conge_URL').on('click', function(event){
		event.preventDefault();
		let getId = $(this).attr('id');
		console.log(getId);
		swal.fire({
			title: 'Suppression',
			text: 'voulez-vous vraiment supprimer cette Conge',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'supprimer Agent',
		}).then((result) => {
			if(result.isConfirmed){
				//swal.fire('suppression OK OK');
				$.ajax({
					url: 'delete/conge',
					method: 'GET',
					data: {
						Id: getId,
						_token: '{{csrf_token()}}'
					},
					success: function(response) {
					//_token: '{{csrf_token()}}'
						console.log(response);
						swal.fire(
							'suppression!',
							'Congé suppremer avec success!',
							'success'
						);
						window.location.reload();
						//$("#identite").val(response.getInfosAgent.nom +" "+ response.getInfosAgent.prenom);
						//$("#identiteId").val(response.getInfosAgent.id);
					}
				});
			}
		});
	});/* /End methode pour la suppression d'un Conge */

	/* methode pour modification des status(observation) d'un conge */
	$('.linkBtnModifStatusConge').on('click', function(event) {
		event.preventDefault();
		let linkModifStatus = $(this).attr('href');
		swal.fire({
			title: 'Modification',
			text: "voulez-vous vraiment modifier l'observation?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: "modifier l'observation",
		}).then((result) => {
			if(result.isConfirmed){
				//swal.fire('suppression OK OK');
				$.ajax({
					url: linkModifStatus,
					method: 'GET',
					data: {
						_token: '{{csrf_token()}}'
					},
					success: function(response) {
					//_token: '{{csrf_token()}}'
						swal.fire(
							'modification!',
							'Observation modifié avec success!',
							'success'
						).then((res) => {
							if (res.isConfirmed) {
								//window.location.replace(routActuel);
								window.location.reload();
							}
						});
						//window.location.reload();
					}
				});
			}
		});

	})
	/* /End methode pour modification des status(observation) d'un conge */
	
	/* methode modif Conge */
	$("#formModifConge").validate({
		rules : {
        	totalJourPrevueConge : { 
        		required: true,
         		maxlength : 100
        	},
        	congeDejaPris : {
        		maxlength : 100
        	},
        	nbrJrD : {
        		required : true,
        		maxlength : 100
        	},
        	nbrJourR : {
        		maxlength : 100
        	},
        	dateDepart : {
         		maxlength : 15
        	},
        	dateRetour : {
         		maxlength : 15
        	}
        },
        messages: {
        	totalJourPrevueConge : { 
        		required : "le Total des jours prevue obligatoire",
        		maxlength : "Duéer Conge doit avoir au max 100 caractère"
        	},
        	nbrJrD : {
        		required : "Le nombre de jours demande obligatoire",
        		maxlength : "Le nombre de jours demandé doit avoir au max 100 caractère"
        	},
        	nbrJourR : {
        		maxlength : "Le nombre de jour restant doit avoir au max 100 caractère"
        	},
        	dateDepart : {
         		maxlength : "Date de dapart Conge doit avoir au max 15 caractère"
        	},
        	dateRetour : {
         		maxlength : "Date de retour Conge doit avoir au max 15 caractère"
        	},
        },
        submitHandler: function(form){
        	let _token = $('input[type="hidden"]').attr('value'); 
    		let myUrl = $("#formModifConge").attr('action');
    		let myMethode = $("#formModifConge").attr('method');
    		let totalJourPrevueConge = $('#totalJourPrevueConge').val();
    		let congeDejaPris = $('#congeDejaPris').val();
    		let nbrJrD = $('#nbrJrD').val();
    		let nbrJourR = $('#nbrJourR').val();
    		let explicationConge = $('#explicationConge').val();
    		let dateDepart = $('#dateDepart').val();
    		let dateRetour = $('#dateRetour').val();

    		$('#btnModifConge').html("En cours de modification...");
			$('#btnModifConge').attr('disabled',true);
			//$('#btnModifConge').css('color',"yellow");

			$.ajax({
    			url:myUrl,
      			method:myMethode,
      			data:{
			    	_token,
			        totalJourPrevueConge,
			        congeDejaPris,
			        nbrJourR,
			        nbrJrD,
			        explicationConge,
			        dateDepart,
			        dateRetour
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
			          $('#btnModifConge').html('Valider la modification');
			          $('#btnModifConge').attr('disabled',false);
			          //$('#BtnSubmitFormation').css('backgroundColor','');
			        }else{
			        	if (data.status == 1) {
			        		//$('input[type=text]').val('');
			        	    console.log(data.messageSucces);
					        //alert(data.messageSucces);
					        swal.fire(
								'modification!',
								data.messageSucces,
								'success'
							)
					        //$('#successMessage').html('Votre messages est bien envoyer avec succes');
					        $('#btnModifConge').html('Valider la modification');
					        $('#btnModifConge').attr('disabled',false);
					    	window.location.reload();
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
	});/* /End methode modif Conge */
})(jQuery); 
/* End function principal JQuery */