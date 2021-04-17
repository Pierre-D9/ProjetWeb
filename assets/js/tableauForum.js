$(document).ready(function(){

    $("button.btCreer").on("mouseover", function(){
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
    }).on("click", function (){
        //Lorsque l'utilisateur clique sur le bouton

    });

    $("tr.trBody").on("mouseover", function(){
        $(this).css({
            "background-color" : "#3782c8", //Change la couleur d'arrière en bleue
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
        var id = $(this).attr('id');
        $("td.tdForum"+id).css({//les td correspondant au tr
            "color" : "white", //Change la couleur du texte en blanc foncé
        })
    }).on("mouseleave", function (){
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
        });
        var id = $(this).attr('id');
        $("td.tdForum"+id).css({ //les td correspondant au tr
            "color" : "#3782c8", //Change la couleur du texte en bleue
        })
    }).on("click", function () {
        var id = $(this).attr('id');
        alert(id);
        //Ici on va vers le forum correspondant
    });

})