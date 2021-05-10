$(document).ready(function(){

    $("input.btValider,.btAnnuler").on("mouseover", function(){
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

    });
    $("input.btAnnuler").on("click", function (){
        window.location.href = 'tableauUtilisateur.php';
    });






});