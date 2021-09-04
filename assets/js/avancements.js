// // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
// var $container1 = $('#immeuble_avancements');
	
// // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
// var index1 = $container1.find(':input').length;

// // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
// $('#add_avancement').click(function(e) {
//         alert(22222);
//     addAvancement($container1);

//     e.preventDefault(); // évite qu'un # apparaisse dans l'URL
//     return false;
// });

// // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle annonce par exemple).
// if (index1 == 0) {
//     addAvancement($container1);
// } else {
//     // S'il existe déjà des catégories, on ajoute un lien de suppression pour chacune d'entre elles
//     $container1.children('div').each(function() {
//     addLienSuppression($(this));

//     $(this).find('input').each(function(){

//         $(this).removeAttr('required')
//     });

//     $(this).hide();
//     });
// }

// // La fonction qui ajoute un formulaire CategoryType
// function addAvancement($container1) {
//   // Dans le contenu de l'attribut « data-prototype », on remplace :
//   // - le texte "__name__label__" qu'il contient par le label du champ
//   // - le texte "__name__" qu'il contient par le numéro du champ
//   var template1 = $container1.attr('data-prototype')
//     .replace(/immeuble_avancements__name__/g, 'Type avancement'+ (index1+1))
//     .replace(/__name__label__/g,        'Type avancement n° '+ (index1+1));

      

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