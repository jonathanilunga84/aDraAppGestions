(function($){
	/* methode Ajax pour le formulaire de Ajout Agent qui est view/Pages/Agents/listesAgents dans Modal */
	$("#formAjoutAgent").validate({
		rules : {
			nom : {
         		required : true, 
         		minlength : 2,
         		maxlength : 100
        	},
        	postnom : {
         		required : true,
         		minlength : 2,
         		maxlength : 100
        	},
        	prenom : {
         		required : true,
         		minlength : 2,
         		maxlength : 100
        	},
        	sexe : {
         		required : true,
         		maxlength : 10
        	},
        	etatCivil : {
         		required : true,
         		maxlength : 100
        	},
        	telephone : {
         		minlength : 9,
         		maxlength : 15
        	},
        	lieuNaissance : {
         		minlength : 2,
         		maxlength : 200
        	},
        	email : {
         		minlength : 2,
         		maxlength : 100
        	},
        	NumCarteIdentite : {
         		minlength : 2,
         		maxlength : 100
        	},
        	nationalite : {
         		minlength : 2,
         		maxlength : 100
        	},
        	adresseResidence : {
         		minlength : 2,
         		maxlength : 200
        	},
        	NumCompteBancaire : {
         		minlength : 2,
         		maxlength : 200
        	},
        	projet_id : {
        		required : true,
         		maxlength : 200
        	},
        	fonction : {
         		minlength : 2,
         		maxlength : 200
        	},
        	lieuAffectation : {
         		minlength : 2,
         		maxlength : 200
        	},
        	dateNaissance : {
         		maxlength : 15
        	},
        	dateDebut : {
         		maxlength : 15
        	},
        	dateFinPrevue : {
         		maxlength : 15
        	},
        	DateFinEffective : {
         		maxlength : 15
        	},
        	DureeContratMois : {
         		maxlength : 15
        	},
        	DureeContratJour : {
         		maxlength : 15
        	},
        	status : {
         		maxlength : 100
        	},
        	salaires : {
         		maxlength : 200
        	}
		},
		messages: {
			nom : {
        		required : 'Le Nom est obligatoire',
        		minlength : 'Le Nom doit avoir au minimun 2 caractère',
        		maxlength : 'Le Nom doit avoir au max 100 caractère'
        	},
        	postnom : {
        		required : "Le Postnom est obligatoire",
        		minlength : 'Le Postnom doit avoir au minimun 2 caractère',
        		maxlength : 'Le Postnom doit avoir au max 200 caractère'
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
    		let myUrl = $("#formAjoutAgent").attr('action');
    		let myMethode = $("#formAjoutAgent").attr('method');
    		let nom = $('#nom').val();	
    		let postnom = $('#postnom').val();
    		let prenom = $('#prenom').val();
    		let sexe = $('#sexe').val();
    		let etatCivil = $('#etatCivil').val();
    		let telephone = $('#telephone').val();
    		let lieuNaissance = $('#lieuNaissance').val();
    		let email = $('#email').val();
    		let NumCarteIdentite = $('#NumCarteIdentite').val();
    		let nationalite = $('#nationalite').val();
    		let adresseResidence = $('#adresseResidence').val();
    		let NumCompteBancaire = $('#NumCompteBancaire').val();
    		let projet_id = $('#projet_id').val();
    		let fonction = $('#fonction').val();
    		let lieuAffectation = $('#lieuAffectation').val();
    		let dateNaissance = $('#dateNaissance').val();
    		let dateDebut = $('#dateDebut').val();
    		let dateFinPrevue = $('#dateFinPrevue').val();
    		let DateFinEffective = $('#DateFinEffective').val();
    		let DureeContratMois = $('#DureeContratMois').val();
    		let DureeContratJour = $('#DureeContratJour').val();
    		let status = $('#status').val();
    		let devise = $('#devise').val();
    		let salaires = $('#salaires').val() +" "+ devise;
    		//console.log('SalaireDevise '+salaires);
    		/*button*/ 
    		$('#btnSendAgent').html("Encours d'enregitrement...");
			$('#btnSendAgent').attr('disabled',true);
    		$.ajax({
    			url:myUrl,
      			method:myMethode,
			    data:{
			        _token,
			        nom,
			        postnom,
			        prenom,
			        sexe,
			        etatCivil,
			        telephone,
			        lieuNaissance,
			        email,
			        NumCarteIdentite,
			        nationalite,
			        adresseResidence,
			        NumCompteBancaire,
			        projet_id,
			        fonction,
			        lieuAffectation,
			        dateNaissance,
			        dateDebut,
			        dateFinPrevue,
			        DateFinEffective,
			        DureeContratMois,
			        DureeContratJour,
			        status,
			        salaires
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
			          $('#btnSendAgent').html('Enregister');
			          $('#btnSendAgent').attr('disabled',false);
			          //$('#BtnSubmitFormation').css('backgroundColor','');
			        }else{
			        	if (data.status == 1) {
			        		//document.getElementById('BtnSubmitFormation').reset();
			        		$('input[type=text]').val('');
			        	    console.log(data.messageSucces);
					        alert(data.messageSucces);
					        //$('#successMessage').html('Votre messages est bien envoyer avec succes');
					        $('#btnSendAgent').html('Enregister');
					        $('#btnSendAgent').attr('disabled',false);
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
	});/* /End formAjoutAgent*/
	
	/* methode pour la suppression d'un gent */
	$('.btnDeleteAgent').on('click', function(event){
		event.preventDefault();
		let getId = $(this).attr('id');
		console.log(getId);
		swal.fire({
			title: 'Suppression',
			text: 'voulez-vous vraiment supprimer cette Agent',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'supprimer Agent',
		}).then((result) => {
			if(result.isConfirmed){
				//swal.fire('suppression OK OK');
				$.ajax({
					url: 'delete/agent',
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
							'Agent suppremer avec success!',
							'success'
						);
						//$("#identite").val(response.getInfosAgent.nom +" "+ response.getInfosAgent.prenom);
						//$("#identiteId").val(response.getInfosAgent.id);
					}
				});
			}
		});
	});/* /End methode pour la suppression d'un gent */

	/* request Get InfosAgent */
	$('.btnModifAgentGetInfos').on('click', function(event){
		event.preventDefault();
		let getId = $(this).attr('id');
		let myUrl = $(this).attr('href'); //'infos/agent/ajax'
		//console.log(myUrl+"--"+getId);
		$.ajax({
			url: myUrl,
			method: 'GET',
			data: {
				id: getId,
				_token: '{{csrf_token()}}'
			},
			success: function(response) {
				//console.log(response.projetAgent.intituleProjet);
				//console.log(response);
				$("#IdAgentModif").val(response.getInfosAgent.id);
				$("#nomModif").val(response.getInfosAgent.nom);
				$("#postnomModif").val(response.getInfosAgent.postnom);
				$("#prenomModif").val(response.getInfosAgent.prenom);
				$("#sexeModif").val(response.getInfosAgent.sexe);
				$("#etatCivilModif").val(response.getInfosAgent.etatCivil);
				$("#telephoneModif").val(response.getInfosAgent.telephone);
				$("#lieuNaissanceModif").val(response.getInfosAgent.lieuNaissance);
				$("#emailModif").val(response.getInfosAgent.email);
				$("#NumCarteIdentiteModif").val(response.getInfosAgent.NumCarteIdentite);
				$("#nationaliteModif").val(response.getInfosAgent.nationalite);
				$("#adresseResidenceModif").val(response.getInfosAgent.adresseResidence);
				$("#NumCompteBancaireModif").val(response.getInfosAgent.NumCompteBancaire);
				//$("#projet_idModif").val(response.projetAgent.intituleProjet);
				$("#fonctionModif").val(response.getInfosAgent.fonction);
				$("#lieuAffectationModif").val(response.getInfosAgent.lieuAffectation);
				$("#dateNaissanceModif").val(response.getInfosAgent.dateNaissance);
				$("#dateDebuModif").val(response.getInfosAgent.dateDebut);
				$("#dateFinPrevueModif").val(response.getInfosAgent.dateFinPrevue);
				$("#DateFinEffectiveModif").val(response.getInfosAgent.DateFinEffective);
				$("#DureeContratMoisModif").val(response.getInfosAgent.DureeContratMois);
				$("#DureeContratJourModif").val(response.getInfosAgent.DureeContratJour);
				$("#statusModif").val(response.getInfosAgent.status);
				$("#salairesModif").val(response.getInfosAgent.salaires);
			},/*,
			error:function(error){
		       	console.log(error.responseText);
		       	alert('Error sur le serveur 500');
		    }*/
		});
	});/* /End request Get InfosAgent */

	/* methode Ajax pour le formulaire de Modification Agent qui est view/Pages/Agents/listesAgents dans Modal */
	$("#formModifAgent").validate({
		rules : {
			IdAgentModif : {
				required: true
			},
			nomModif : {
         		required : true, 
         		minlength : 2,
         		maxlength : 100
        	},
        	postnomModif : {
         		minlength : 2,
         		maxlength : 100
        	},
        	prenomModif : {
         		minlength : 2,
         		maxlength : 100
        	},
        	sexeModif : {
         		required : true,
         		maxlength : 10
        	},
        	etatCivilModif : {
         		required : true,
         		maxlength : 100
        	},
        	telephoneModif : {
         		minlength : 9,
         		maxlength : 15
        	},
        	lieuNaissanceModif : {
         		minlength : 2,
         		maxlength : 200
        	},
        	emailModif : {
         		minlength : 2,
         		maxlength : 100
        	},
        	NumCarteIdentiteModif : {
         		minlength : 2,
         		maxlength : 100
        	},
        	nationaliteModif : {
         		minlength : 2,
         		maxlength : 100
        	},
        	adresseResidenceModif : {
         		minlength : 2,
         		maxlength : 200
        	},
        	NumCompteBancaireModif : {
         		minlength : 2,
         		maxlength : 200
        	},
        	fonctionModif : {
         		minlength : 2,
         		maxlength : 200
        	},
        	lieuAffectationModif : {
         		minlength : 2,
         		maxlength : 200
        	},
        	dateNaissanceModif : {
         		maxlength : 15
        	},
        	dateDebuModif : {
         		maxlength : 15
        	},
        	dateFinPrevueModif : {
         		maxlength : 15
        	},
        	DateFinEffectiveModif : {
         		maxlength : 15
        	},
        	DureeContratMoisModif : {
         		maxlength : 15
        	},
        	DureeContratJourModif : {
         		maxlength : 15
        	},
        	statusModif : {
         		maxlength : 100
        	},
        	salairesModif : {
         		maxlength : 200
        	}
		},
		messages: {
			nomModif : {
        		required : 'Le Nom est obligatoire',
        		minlength : 'Le Nom doit avoir au minimun 2 caractère',
        		maxlength : 'Le Nom doit avoir au max 100 caractère'
        	},
        	postnomModif : {
        		minlength : 'Le Postnom doit avoir au minimun 2 caractère',
        		maxlength : 'Le Postnom doit avoir au max 100 caractère'
        	},
        	dateDebuModif : {
        		maxlength : 'date du projet doit avoir au max 15 caractère'
        	},
        	dateFinPrevueModif : {
        		maxlength : 'date fin projet doit avoir au max 15 caractère'
        	},
        	lieuAffectationModif : {
        		minlength : 'Le lieu(e) du projet doit avoir au minimun 2 caractère',
        		maxlength : 'Le lieu(e) du projet doit avoir au max 100 caractère'
        	}
		},
		submitHandler: function(form){
			let _token = $('input[type="hidden"]').attr('value'); 
    		let myUrl = $("#formModifAgent").attr('action');
    		let myMethode = $("#formModifAgent").attr('method');
    		let IdAgentModif = $('#IdAgentModif').val();
    		let nom = $('#nomModif').val();	
    		let postnom = $('#postnomModif').val();
    		let prenom = $('#prenomModif').val();
    		let sexe = $('#sexeModif').val();
    		let etatCivil = $('#etatCivilModif').val();
    		let telephone = $('#telephoneModif').val();
    		let lieuNaissance = $('#lieuNaissanceModif').val();
    		let email = $('#emailModif').val();
    		let NumCarteIdentite = $('#NumCarteIdentiteModif').val();
    		let nationalite = $('#nationaliteModif').val();
    		let adresseResidence = $('#adresseResidenceModif').val();
    		let NumCompteBancaire = $('#NumCompteBancaireModif').val();
    		//let projet_id = $('#projet_id').val();
    		let fonction = $('#fonctionModif').val();
    		let lieuAffectation = $('#lieuAffectationModif').val();
    		let dateNaissance = $('#dateNaissanceModif').val();
    		let dateDebut = $('#dateDebuModif').val();
    		let dateFinPrevue = $('#dateFinPrevueModif').val();
    		let DateFinEffective = $('#DateFinEffectiveModif').val();
    		let DureeContratMois = $('#DureeContratMoisModif').val();
    		let DureeContratJour = $('#DureeContratJourModif').val();
    		let status = $('#statusModif').val();
    		let devise = $('#deviseModif').val();
    		let salaires = $('#salairesModif').val() +" "+ devise;
    		//console.log('SalaireDevise '+_token);
    		/*button*/ 
    		$('#btnModifAgent').html("Encours de modif...");
			$('#btnModifAgent').attr('disabled',true);
    		$.ajax({
    			url:myUrl,
      			method: "put",
			    data:{
			        _token,
			        IdAgentModif,
			        nom,
			        postnom,
			        prenom,
			        sexe,
			        etatCivil,
			        telephone,
			        lieuNaissance,
			        email,
			        NumCarteIdentite,
			        nationalite,
			        adresseResidence,
			        NumCompteBancaire,
			        //projet_id,
			        fonction,
			        lieuAffectation,
			        dateNaissance,
			        dateDebut,
			        dateFinPrevue,
			        DateFinEffective,
			        DureeContratMois,
			        DureeContratJour,
			        status,
			        salaires
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
			          $('#btnModifAgent').html('Enregister');
			          $('#btnModifAgent').attr('disabled',false);
			          //$('#BtnSubmitFormation').css('backgroundColor','');
			        }else{
			        	if (data.status == 1) {
			        		//document.getElementById('BtnSubmitFormation').reset();
			        		$('input[type=text]').val('');
			        		console.log(data);
			        	    //console.log(data.messageSucces);
					        alert(data.messageSucces);
					        //$('#successMessage').html('Votre messages est bien envoyer avec succes');
					        $('#btnModifAgent').html('Enregister');
					        $('#btnModifAgent').attr('disabled',false);
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
	});/* /End formModifAgent*/

	/* methode pour modification des status(observation) d'un Agent(Staff) */
	$('.linkBtnModifStatusAgent').on('click', function(event) {
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
	/* /End methode pour modification des status(observation) d'un Agent(Staff) */
})(jQuery); 
/* End function principal JQuery */