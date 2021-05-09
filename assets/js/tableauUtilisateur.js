
$(document).ready(function(){
    rechercherTousLesUtilisateurs();
    function rechercherTousLesUtilisateurs() {
        //Récupère tous les forums sous format json depuis le script getForum
        $.getJSON("../_controllers/getUtilisateurs.php", function (json) {

            remplirTableauAvecBarreDeRecherche(json);

            $("input.btMS").on("mouseover", function(){
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
            }).on("click", function() {
                var pseudo = $(this).attr('id');
                window.location.href = 'modifierUtilisateur.php?pseudo=' + pseudo;
            });

        });
    }
    function remplirTableauAvecBarreDeRecherche(json){
        leTbody = $('tbody');
        leTbody.empty();
        var result = "";
        var pseudo , password, nom, prenom, mail;
        var nbr = 0;
        //Si le type de cours est renseigné ou non

        //Pour chaque forum
        for (var i = 0; i < json.lesUtilisateursJson.length; i++) {
            pseudo=json.lesUtilisateursJson[i]["pseudo"];
            password=json.lesUtilisateursJson[i]["password"];
            nom=json.lesUtilisateursJson[i]["nom"];
            prenom=json.lesUtilisateursJson[i]["prenom"];
            mail=json.lesUtilisateursJson[i]["mail"];

            result += " <tr class='trBody' id='1'>";
            result +=" <td class='tdForum1'>"+pseudo+"</td>";
            result += "<td class='tdForum1' style=' padding: 10px 25px'>"+nom+"</td>";
            result += "<td class='tdForum1' style=' padding: 10px 50px'>"+prenom+"</td>";
            result += "<td class='tdForum1'>"+mail+"</td>";
            result += "<td  style='padding: 10px 10px'><input type='button' class='btMS' id='"+pseudo+"' value='Modifier' /></td> ";
            result += "<td style=' padding: 10px 40px'><input type='button' class='btMS' value='Supprimer'/></td>";

            result += " </tr>" ;

        }

        leTbody.append(result);

    }


    $("input.btAjouter").on("mouseover", function(){
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
        window.location.href = 'ajouterUtilisateur.php';
    });


});

