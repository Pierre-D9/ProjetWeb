$(document).ready(function(){


    $("input.btAnnuler").on("mouseover", function(){
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
            "color" : "#FF8C00", //Change la couleur du texte en orange foncé
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave",function (){
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color" : "#FF8C00", //Change la couleur d'arrière en blanc
            "color" : "white", //Change la couleur du texte en orange foncé
        });
    }).on("click", function () {
        window.location.href = 'tableauQCM.php';
    });


    $("input.btSuivant").on("mouseover", function(){
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
            "color" : "#FF8C00", //Change la couleur du texte en orange foncé
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave",function (){
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color" : "#FF8C00", //Change la couleur d'arrière en blanc
            "color" : "white", //Change la couleur du texte en orange foncé
        });
    }).on("click", function(){
        //Envoie les données saisies au serveur à l'aide de ajax
        $.post(
            '../_controllers/ajouterTitreQCM.php', // Le fichier cible côté serveur.
            {
                nomQCM : $("input.nomQCM").val(),
                typeCours : $('select').val()
            },
            nom_fonction_retour, // Nom de la fonction de retour.
            'text' // Format des données reçues.
        );

        function nom_fonction_retour(texte_recu){
            console.log(texte_recu);
        }
    });


    var leSelect = $('select');
    couleurOptionSelect(leSelect);


    function couleurOptionSelect(leSelect){
        var valeur = leSelect.val();
        if(valeur !== ""){
            leSelect.css("color","black");
        }else{
            $('select').css("color","grey");
        }
    }

    leSelect.on("change", function () {
        var valeur = $(this).val();
        if(valeur !== ""){
            $(this).css("color","black");
        }else{
            $(this).css("color","grey");
        }
    });

    $()

});

