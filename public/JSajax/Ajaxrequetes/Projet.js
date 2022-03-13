(function($){
	/* methode Ajax pour le formulaire de Ajout Projet qui est view/Pages/Projet/listesProjets dans Modal */
	$("#formAjoutProjet").validate({
		rules : {
			numeroProjet : {
         		required : true,
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
        		required : 'Le numéro du projet est obligatoire',
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

	});
})(jQuery); 
/* End function principal JQuery */