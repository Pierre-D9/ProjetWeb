une_variable_globale = 'Hello world';
var maVariable = rechercherTousLesForums2();
console.log("json en dehors de ma fonction : ");
console.log(maVariable);

function rechercherTousLesForums2() {
    //Récupère tous les forums sous format json depuis le script getForum
    $.getJSON("../_controllers/getForum.php", function (json) {
        var nomSaisie = "";
        var typeCoursChoisi = "";
        remplirTableauAvecBarreDeRecherche(json, nomSaisie, typeCoursChoisi);
        // remplirTableauAvecListeDeroullante(json, typeCoursChoisi);
        console.log("json dans la fonction : ");
        console.log(json);
        return json;
    });
}

function remplirTableauAvecBarreDeRecherche(json, nomSaisie, typeCoursChoisi){
    $('tbody').empty();
    var result = "";
    var id, nom, typeCours, auteur, dateF;
    // var typeCours = $('select').val();

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
            }
        }
    }

    $('tbody').append(result);
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
        window.location.href = 'chatForum.php';
    });
}

function remplirTableauAvecListeDeroullante(json, typeDeCours){
    $('tbody').empty();
    $('input.barreDeRecherche').val("");
    var result = "";
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
        }
    }

    $('tbody').append(result);
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
        window.location.href = 'chatForum.php';
    });
}



function rechercherTousLesForums(){
    $.ajax({
        url:"../_controllers/getForum.php", //nom du script php ou ajax va récupérer le fichier json
        dataType : 'html', //type de données renvoyées
        success : function(code_html, statut){
            return code_html;
            $("div.test").append(code_html);
        },
        error : function(resultat, statut, erreur){
            return erreur;
        }
    });
}

// var maVariable = rechercherTousLesForums2();
// console.log("json en dehors de ma fonction : ");
// console.log(maVariable);

$(document).ready(function(){
    $("input.btCreer").on("mouseover", function(){
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
        window.location.href = 'ajoutForum.php';
        // console.log(maVariable);
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
        window.location.href = 'chatForum.php';
    });

    $('input.barreDeRecherche').on("keyup", function () {
        // alert("tu changes la barre de recherche");
        // $('input.barreDeRecherche').val("");
    });

    $('select').on("change", function () {
        alert("tu changes la liste déroulante");
        // $('select').val("");
    });
})