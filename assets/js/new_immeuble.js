// import { indexVerification, addCollection } from './collections'; 
$(function(){

// On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
var $container_immeuble_appartements = $('#immeuble_appartements');
	
// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
var $index_immeuble_appartements = $container_immeuble_appartements.children('fieldset').length;

indexVerification($index_immeuble_appartements, $container_immeuble_appartements, 'Type appartement n° ', 'immeuble_appartements_');
// On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
$('#add_appartement').click(function(e) {
        
    addCollection($index_immeuble_appartements, $container_immeuble_appartements, 'Type appartement n° ');
    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    return false;
});

// On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
var $container_immeuble_avancements = $('#immeuble_immobilier_avancements');
	
// On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
var $index_immeuble_avancements = $container_immeuble_avancements.find('fieldset').length;

indexVerification($index_immeuble_avancements, $container_immeuble_avancements, 'Avancement n° ', 'immeuble_immobilier_avancements_');

// On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
$('#add_avancement').click(function(e) {
    
    addCollection($index_immeuble_avancements, $container_immeuble_avancements, 'Avancement n° ');

    e.preventDefault(); // évite qu'un # apparaisse dans l'URL
    return false;
});

    


// La fonction qui ajoute un formulaire de collection
function addCollection($index, $container, $texte_remplacement) {
    // Dans le contenu de l'attribut « data-prototype », on remplace :
    // - le texte "__name__label__" qu'il contient par le label du champ
    // - le texte "__name__" qu'il contient par le numéro du champ
    var template = $container.attr('data-prototype')
    .replace(/__name__label__/g, $texte_remplacement + ($index+1) )
    .replace(/__name__/g, $index+1);
  
        
  
      // On crée un objet jquery qui contient ce template
      var $prototype = $(template);
  
      // On ajoute au prototype un lien pour pouvoir supprimer la catégorie
      addDeleteLink($prototype);
  
      // On ajoute le prototype modifié à la fin de la balise <div>
      $container.append($prototype);
  
      // Enfin, on incrémente le compteur pour que le prochain ajout se fasse avec un autre numéro
      
    //   $index = $index + 1 ;
    if($texte_remplacement === "Type appartement n° "){
        $index_immeuble_appartements++;
    }
    else{
        $index_immeuble_avancements++;
    }
      
  }
  
  // La fonction qui ajoute un lien de suppression d'une collection
  function addDeleteLink($prototype) {
      // Création du lien
      var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
  
      // Ajout du lien
      $prototype.append($deleteLink);
  
      // Ajout du listener sur le clic du lien pour effectivement supprimer la collection
      $deleteLink.click(function(e) {
          $prototype.remove();
  
          e.preventDefault(); // évite qu'un # apparaisse dans l'URL
          return false;
      });
  }

  function indexVerification($index, $container, $texte_remplacement, $attribut){
      // On ajoute un premier champ automatiquement s'il n'en existe pas déjà un (cas d'une nouvelle collection par exemple).
      if ($index == 0) {
          addCollection($index, $container, $texte_remplacement);
      } else {
          // S'il existe déjà des collections, on ajoute un lien de suppression pour chacune d'entre elles
          $container.children('fieldset').each(function(index) {
              addDeleteLink($(this));
                  $(this).children('div').first().attr("id", $attribut + (index + 1));
                  $(this).children('legend').first().html($texte_remplacement + (index + 1))
      
          });
      }		
  }

    
    
});