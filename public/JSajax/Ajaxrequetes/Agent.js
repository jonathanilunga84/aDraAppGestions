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
         		required : true,
         		minlength : 2,
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
         		minlength : 2,
         		maxlength : 15
        	},
        	dateDebut : {
         		minlength : 2,
         		maxlength : 15
        	},
        	dateFinPrevue : {
         		minlength : 2,
         		maxlength : 15
        	},
        	DateFinEffective : {
         		minlength : 2,
         		maxlength : 15
        	},
        	DureeContratMois : {
         		minlength : 2,
         		maxlength : 15
        	},
        	DureeContratJour : {
         		minlength : 2,
         		maxlength : 15
        	},
        	status : {
         		maxlength : 100
        	},
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
			        status
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

	});
})(jQuery); 
/* End function principal JQuery */