rechercherLesReponses();
const interval = window.setInterval(rechercherLesReponses, 10000);

function rechercherLesReponses() {
    var idForum = $('h2').attr('id');
    var vous = $('h1').attr('id');
    //Récupère toutes les forums sous format json depuis le script afficherLesReponses
    $.getJSON("../_controllers/afficherLesReponses.php", "idForum=" + escape(idForum), function (json) {
        afficherLesReponses(vous, json);
    });
}

function afficherLesReponses(vous, json){
    var blocMessage = $('div.lesMessages');
    blocMessage.empty();
    if(json.lesReponses.length !== 0){
        var result = "";
        var reponse, pseudoUtil, dateR, jour, mois, annee, heure;
        for(var i = 0; i < json.lesReponses.length; i++){
            reponse = json.lesReponses[i]["reponse"];
            pseudoUtil = json.lesReponses[i]["pseudoUtil"];
            dateR = json.lesReponses[i]["dateR"];

            annee = dateR.substring(0,4);
            mois = dateR.substring(5,7);
            jour = dateR.substring(8,10);

            heure = dateR.substring(11,16);

            if(pseudoUtil === vous){
                result += "<div class='blockMessageVous'>";
                result += "<div class='contenneurMessage'>";
                result += "<span class='contennueMessageVous'>";
                result += "<span class='pseudo'>"+pseudoUtil+"</span>";
                result += "<span class='leMessage'>"+reponse+"</span>";
                result += "<span class='date'>"+jour+"/"+mois+"/"+annee+"</span>";
                result += "<span class='heureV2'>"+heure+"</span>";
                result += "</span>";
                result += "</div>";
                result += "</div>";
            }else{
                result += "<div class='blockMessageAutre'>";
                result += "<div class='contenneurMessage'>";
                result += "<span class='contennueMessageAutre'>";
                result += "<span class='pseudo'>"+pseudoUtil+"</span>";
                result += "<span class='leMessage'>"+reponse+"</span>";
                result += "<span class='date'>"+jour+"/"+mois+"/"+annee+"</span>";
                result += "<span class='heure'>"+heure+"</span>";
                result += "</span>";
                result += "</div>";
                result += "</div>";
            }

        }
        blocMessage.append(result);
        var test = blocMessage.scrollTop = blocMessage.scrollHeight;
        var test = $('div.lesMessages').scrollTop = $('div.lesMessages').scrollHeight;
    }

    var i = 0;
    //Permet d'agrandir le message de type autre quand la souris est dessus et de le désagrandir quand la souris n'est plus dessus
    $("span.contennueMessageAutre").on("mouseover", function (){
        if(i === 0){
            $(this).animate({'padding-left':'+=10px', 'padding-bottom': '+=10px' }, "fast");
            $(this).parent().animate({"width": "+=2%"},'fast');
        }
        i = 1;
    }).on("mouseleave", function (){
        if(i === 1){
            $(this).animate({'padding-left':'-=10px', 'padding-bottom':'-=10px'}, "fast");
            $(this).parent().animate({'width':"-=2%"},'fast');
        }
        i = 0;
    });

    //Permet d'agrandir le message de type Vous quand la souris est dessus et de le désagrandir quand la souris n'est plus dessus
    $("span.contennueMessageVous").on("mouseover", function (){
        if(i === 0){
            $(this).animate({'padding-right':'+=10px', 'padding-bottom':'+=10px'}, "fast");
            $(this).parent().animate({'width':'+=2%'}, 'fast');
        }
        i = 1;
    }).on("mouseleave", function (){
        if(i === 1){
            $(this).animate({'padding-right':'-=10px', 'padding-bottom':'-=10px'}, "fast");
            $(this).parent().animate({'width':'-=2%'}, 'fast');
        }
        i = 0;
    });
}

function insererUneReponse(){
    var idForum = $('h2').attr('id');
    var vous = $('h1').attr('id');
    var message = $('textarea.reponse').val();

    console.log(idForum + " " + vous + " " + message);

    $.ajax({
        url:"../_controllers/insererUneReponse.php", //nom du script php ou ajax va récupérer le fichier json
        type: "POST",
        data : 'idForum=' + idForum + '&auteur=' + vous + '&message=' + message,
        dataType : 'html', //type de données renvoyées
        success : function(code_html, statut){
            console.log(code_html);
            $('textarea.reponse').val("");
            rechercherLesReponses();

        },
        error : function(resultat, statut, erreur){
            console.log(erreur);
        }
    });

}




$(document).ready(function(){

    //Permet de changer l'aspect du curseur quand la souris est sur le bouton input
    $("input.btEnvoyer").on("mouseover", function(){
        $(this).css('cursor','pointer');
    }).on("mouseleave",function (){
        $(this).css('cursor','auto');
    }).on("click", function (){
        insererUneReponse();
    });

});