rechercherTousLesForums();

function rechercherTousLesForums() {
    //Récupère tous les forums sous format json depuis le script getForum
    $.getJSON("../_controllers/getForum.php", function (json) {
        var nomSaisie = "";
        var typeCoursChoisi = "";
        remplirTableauAvecBarreDeRecherche(json, nomSaisie, typeCoursChoisi);

        $('select').on("change", function () {
            var typeDeCours = $('select').val();
            remplirTableauAvecListeDeroullante(json, typeDeCours);
            $('input.barreDeRecherche').val("");
        });

        $('input.barreDeRecherche').on("keyup", function () {
            var typeDeCours = $('select').val();
            var nomSaisie = $('input.barreDeRecherche').val();
            remplirTableauAvecBarreDeRecherche(json, nomSaisie, typeDeCours);
        });
    });
}

function remplirTableauAvecBarreDeRecherche(json, nomSaisie, typeCoursChoisi){
    leTbody = $('tbody');
    leTbody.empty();
    var result = "";
    var id, nom, typeCours, auteur, dateF;

    var nbr = 0;

    //Si le type de cours est renseigné ou non
    if (typeCoursChoisi === ""){
        //Pour chaque forum
        for (var i = 0; i < json.lesForumJson.length; i++) {
            if (json.lesForumJson[i]["nom"].toLowerCase().startsWith(nomSaisie.toLowerCase())) {


                //Identification de toutes les variables pour la ligne
                id = json.lesForumJson[i]["id"];
                nom = json.lesForumJson[i]["nom"];
                typeCours = json.lesForumJson[i]["typeCours"];
                auteur = json.lesForumJson[i]["auteur"];
                dateF = json.lesForumJson[i]["dateF"];

                //Création de la ligne
                result += "<tr class='trBody' id='"+id+"'>";
                result += "<td class='tdforum"+id+"'>"+nom+"</td>";
                result += "<td class='tdforum"+id+"'>"+typeCours+"</td>";
                result += "<td class='tdforum"+id+"'>"+auteur+"</td>";
                result += "<td class='tdforum"+id+"'>"+dateF+"</td>";
                result += "</tr>";

                nbr++
            }
        }
    }else{
        //Pour chaque forum
        for (var i = 0; i < json.lesForumJson.length; i++) {
            if (json.lesForumJson[i]["nom"].toLowerCase().startsWith(nomSaisie.toLowerCase()) && json.lesForumJson[i]["typeCours"].toLowerCase() === typeCoursChoisi.toLowerCase()) {

                //Identification de toutes les variables pour la ligne
                id = json.lesForumJson[i]["id"];
                nom = json.lesForumJson[i]["nom"];
                typeCours = json.lesForumJson[i]["typeCours"];
                auteur = json.lesForumJson[i]["auteur"];
                dateF = json.lesForumJson[i]["dateF"];

                //Création de la ligne
                result += "<tr class='trBody' id='"+id+"'>";
                result += "<td class='tdforum"+id+"'>"+nom+"</td>";
                result += "<td class='tdforum"+id+"'>"+typeCours+"</td>";
                result += "<td class='tdforum"+id+"'>"+auteur+"</td>";
                result += "<td class='tdforum"+id+"'>"+dateF+"</td>";
                result += "</tr>";
                nbr++;
            }
        }
    }

    if(nbr == 0){
        result += "<p style='font-size: 25px;'>Aucun forum de se nom</p>";
    }

    leTbody.append(result);
    remettreLeJquery();

}

function remplirTableauAvecListeDeroullante(json, typeDeCours){
    leTbody = $('tbody');
    leTbody.empty();
    $('input.barreDeRecherche').val("");
    var result = "";
    var nbr = 0;
    var id, nom, typeCours, auteur, dateF;
    for (var i = 0; i < json.lesForumJson.length; i++) {
        if (json.lesForumJson[i]["typeCours"].toLowerCase() === typeDeCours.toLowerCase() || typeDeCours === "") {
            id = json.lesForumJson[i]["id"];
            nom = json.lesForumJson[i]["nom"];
            typeCours = json.lesForumJson[i]["typeCours"];
            auteur = json.lesForumJson[i]["auteur"];
            dateF = json.lesForumJson[i]["dateF"];

            result += "<tr class='trBody' id='"+id+"'>";
            result += "<td class='tdforum"+id+"'>"+nom+"</td>";
            result += "<td class='tdforum"+id+"'>"+typeCours+"</td>";
            result += "<td class='tdforum"+id+"'>"+auteur+"</td>";
            result += "<td class='tdforum"+id+"'>"+dateF+"</td>";
            result += "</tr>";
            nbr++;
        }
    }

    if(nbr == 0){
        result += "<p style='font-size: 25px;'>Aucun forum pour ce type de cours</p>";
    }

    leTbody.append(result);
    remettreLeJquery();
}

function remettreLeJquery() {
    $("tr.trBody").on("mouseover", function(){
        $(this).css({
            "background-color" : "#3782c8", //Change la couleur d'arrière en bleue
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
        $(this).children().css({ //les td correspondant au tr
            "color" : "white" //Change la couleur du texte en blanc
        });
    }).on("mouseleave", function (){
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
        });
        $(this).children().css({
            "color" : "#3782c8" //Change la couleur du texte en blanc
        });
    }).on("click", function () {
        var id = $(this).attr('id');
        url = '../_controllers/afficherUnForum.php?idForum='+id;
        window.location.href = url;
    });
}


$(document).ready(function() {
    $("input.btCreer").on("mouseover", function () {
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color": "white", //Change la couleur d'arrière en blanc
            "color": "#FF8C00", //Change la couleur du texte en orange foncé
            "cursor": "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave", function () {
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color": "#FF8C00", //Change la couleur d'arrière en blanc
            "color": "white", //Change la couleur du texte en orange foncé
        });
    }).on("click", function () {
        window.location.href = 'ajoutForum.php';
    });

});

