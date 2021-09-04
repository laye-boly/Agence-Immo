$(function(){
	// $("#menu-symbol").click(function(){
		
	// 	$("#menu-wrapper").toggle();
		
	// });

	// $("#show-menu-immobilier").click(function(){
		
	// 	$("#menu-immobilier").toggle();

	// 	if($("#menu-immobilier").css("display") == "block"){
	// 		$("#show-menu-immobilier").attr("class", "glyphicon glyphicon-minus-sign");
	// 	}else{
	// 		$("#show-menu-immobilier").attr("class", "glyphicon glyphicon-plus-sign");
	// 	}

	
	// });

	// $("#show-menu-solaire").click(function(){
		
	// 	$("#menu-solaire").toggle();

	// 	if($("#menu-solaire").css("display") == "block"){
	// 		$("#show-menu-solaire").attr("class", "glyphicon glyphicon-minus-sign");
	// 	}else{
	// 		$("#show-menu-solaire").attr("class", "glyphicon glyphicon-plus-sign");
	// 	}

	
	// });

	
	// On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
	var $container_immeuble_appartements = $('#immeuble_appartements');
	
	// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
	var $index_immeuble_appartements = $container_immeuble_appartements.find(':input').length;
	
	// On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
	$('#add_appartement').click(function(e) {
			
		addCollection($index_immeuble_appartements, $container_immeuble_appartements, 'Type appartement n° ');
	
		e.preventDefault(); // évite qu'un # apparaisse dans l'URL
		return false;
	});

	IndexVerification($index_immeuble_appartements, $container_immeuble_appartements, 'Type appartement n° ');
	
	// // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
	// if ($index_immeuble_appartements == 0) {
	// 	addCollection(index_immeuble_appartements, $container_immeuble_appartements, 'Type appartement n° ');
	// } else {
	// 	// S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
	// 	$container_immeuble_appartements.children('div').each(function() {
	// 	addDeleteLink($(this));
	
	// 	$(this).find('input').each(function(){
	
	// 		$(this).removeAttr('required')
	// 	});
	
	// 	$(this).hide();
	// 	});
	// }

	// On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
var $container_immeuble_avancements = $('#immeuble_immobilier_avancements');
	
// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
var $index_immeuble_avancements = $container_immeuble_avancements.find(':input').length;

// On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
$('#add_avancement').click(function(e) {
    
    addCollection($index_immeuble_avancements, $container_immeuble_avancements, 'Avancement n° ');

    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    return false;
});

    
	IndexVerification($index_immeuble_avancements, $container_immeuble_avancements, 'Avancement n° ');

// // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
// if (index_immeuble_avancements == 0) {
//     addCollection($index_immeuble_avancements, $container_immeuble_avancements, 'Avancement n° ');
// } else {
//     // S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
//     $container_immeuble_avancements.children('div').each(function() {
// 	addDeleteLink($(this));

//     $(this).find('input').each(function(){

//         $(this).removeAttr('required')
//     });

//     $(this).hide();
//     });
// }
	
	// // La fonction qui ajoute un formulaire de collection
	// function addCollection($index, $container, $texte_remplacement) {
	//   // Dans le contenu de l'attribut « data-prototype », on remplace :
	//   // - le texte "__name__label__" qu'il contient par le label du champ
	//   // - le texte "__name__" qu'il contient par le numéro du champ
	//   var template = $container.attr('data-prototype')
	//   .replace(/__name__label__/g, $texte_remplacement + ($index+1) )
	//   .replace(/__name__/g, $index+1);
	
		  
	
	// 	// On crée un objet jquery qui contient ce template
	// 	var $prototype = $(template);
	
	// 	// On ajoute au prototype un lien pour pouvoir supprimer la catégorie
	// 	addDeleteLink($prototype);
	
	// 	// On ajoute le prototype modifié à la fin de la balise <div>
	// 	$container.append($prototype);
	
	// 	// Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
	// 	$index++;
	// }
	
	// // La fonction qui ajoute un lien de suppression d'une collection
	// function addDeleteLink($prototype) {
	// 	// Création du lien
	// 	var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
	
	// 	// Ajout du lien
	// 	$prototype.append($deleteLink);
	
	// 	// Ajout du listener sur le clic du lien pour effectivement supprimer la catégorie
	// 	$deleteLink.click(function(e) {
	// 		$prototype.remove();
	
	// 		e.preventDefault(); // évite qu'un # apparaisse dans l'URL
	// 		return false;
	// 	});
	// }

	// function IndexVerification($index, $container, $texte_remplacement){
	// 	// On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
	// 	if ($index == 0) {
    // 		addCollection($index, $container, $texte_remplacement);
	// 	} else {
    // 		// S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
    // 		$$container.children('div').each(function() {
	// 			addDeleteLink($(this));

   	// 	 		$(this).find('input').each(function(){

    //     			$(this).removeAttr('required')
    // 			});

    // 			$(this).hide();
    // 		});
	// 	}		
	// }

	



// // La fonction qui ajoute un formulaire CategoryType
// function addAvancement($container1) {
//   // Dans le contenu de l'attribut « data-prototype », on remplace :
//   // - le texte "__name__label__" qu'il contient par le label du champ
//   // - le texte "__name__" qu'il contient par le numéro du champ
//   var template1 = $container1.attr('data-prototype')
//     .replace(/__name__label__/g, 'Avancement n° '+ (index1+1))
//     .replace(/__name__/g,        index1+1);

      

//     // On crée un objet jquery qui contient ce template
//     var $prototype1 = $(template1);

//     // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
//     addLienSuppression($prototype1);

//     // On ajoute le prototype modifié à la fin de la balise <div>
//     $container1.append($prototype1);

//     // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
//     index1++;
// }

// // La fonction qui ajoute un lien de suppression d'une catégorie
// function addLienSuppression($prototype1) {
//     // Création du lien
//     var $deleteLink1 = $('<a href="#" class="btn btn-danger">Supprimer</a>');

//     // Ajout du lien
//     $prototype1.append($deleteLink1);

//     // Ajout du listener sur le clic du lien pour effectivement supprimer la catégorie
//     $deleteLink1.click(function(e) {
//         $prototype1.remove();

//         e.preventDefault(); // évite qu'un # apparaisse dans l'URL
//         return false;
//     });
// }
});