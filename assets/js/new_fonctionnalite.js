$(function(){
    // var ajout_fonctionnalite = document.getElementById('ajout_fonctionnalite');

    // Ajout du listener sur le clic du lien  ajouter une fonctionnalité
    $('#ajout_fonctionnalite').click(function(e) {
        e.preventDefault();
        var div_fonctionnalite = $('div#champ_fonctionnalite');
        addFonctionnalite(div_fonctionnalite);
        return false;
    });

    // La fonction qui ajoute un champ de saisie d'une fonctionnalité au formulaire
    function addFonctionnalite($champ_fonctionnalite) {

        var nbreAjout = parseInt($('input#nbre-ajout').attr('value'));
  
        var $champ = $('<div class="form-group" style="margin-bottom: 5px;"><label for="fon'+nbreAjout+'">Fonctionnalite</label> <input class="form-control input-nom-fonctionnalite" type="text" name="fon'+nbreAjout+'" required="" style="margin-right: 4px;"></div>');
 
        nbreAjout = nbreAjout + 1;
        $('input#nbre-ajout').attr('value', nbreAjout);
        $('div#submit').show();
        // On ajoute au champ un lien pour pouvoir supprimer la fonctionnalite
        addDeleteLink($champ);

        // On ajoute le nouveau champ de saisaie   à la fin du formulaire
        $champ_fonctionnalite.append($champ);

            
    }


    // La fonction qui ajoute un lien de suppression d'une fonctionnalite
    function addDeleteLink($champ) {
        // Création du lien
        var $deleteLink = $('<a href="#" class="btn btn-danger">Supprimer</a>');
        // Ajout du lien
         $champ.append($deleteLink);
        // Ajout du listener sur le clic du lien pour effectivement supprimer la fonctionnalite
        $deleteLink.click(function(e) {
            e.preventDefault();
            $champ.remove();
            nbreAjout = parseInt($('input#nbre-ajout').attr('value'));
            $('input#nbre-ajout').attr('value', nbreAjout - 1);
            nbreAjout = parseInt($('input#nbre-ajout').attr('value'));
            if(nbreAjout == 0 ){
                $('div#submit').hide();
            }else{
                $('input.input-nom-fonctionnalite').each(function(index){
                $(this).attr('name', 'fon'+index);     
          });
            }

    return false;
  });
}

});
