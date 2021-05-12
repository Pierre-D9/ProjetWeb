rechercherTousLesQCM2();

function rechercherTousLesQCM() {
    //Récupère tous les QCM sous format xml depuis le script
    $.ajax({
        type: "GET",
        url: "../assets/xml/lesQCM.xml",
        dataType: "xml",
        success: parseXml
    });

    function parseXml(xml) {
        $('tbody').empty();
        var racine = xml.documentElement;
        var nbrQCM = racine.childNodes.length;
        if(nbrQCM == 0 ){
            $('tbody').append("<p style='font-size: 25px;'>Aucun forum pour ce type de cours</p>");
        }else{
            for(var i=0; i<nbrQCM; i++){
                var unQcm = racine.childNodes[i];
                // var numQCM = unQcm.attributes();
                var leTitre = unQcm.childNodes[0].nodeValue;
                // var typeDeCours = unQcm.getElementsByTagName("nomQCM").nodeValue;
                // var pseudo = unQcm.getElementsByTagName("pseudo").nodeValue;
                console.log(leTitre);
                console.log(numQCM);
                // console.log(typeDeCours);
                // console.log(pseudo);
            }
        }
        console.log(nbrQCM);


    }
}

function rechercherTousLesQCM2(){
    $.getJSON("../_functions/lireXML.php", function (json) {
        leTbody = $('tbody');
        leTbody.empty();
        var result = "";
        var nomQcm, idQCM, pseudo, typeCours;
        //Si le type de cours est renseigné ou non

        console.log(json);
        //Pour chaque forum
        for (var i = 0; i < json.lesQCM.qcm.length; i++) {
            idQCM = json.lesQCM.qcm[i]['@attributes']['idQCM'];
            nomQcm = json.lesQCM.qcm[i]['nomQcm'];
            typeCours = (json.lesQCM.qcm[i]['typeDeCours']);
            pseudo = json.lesQCM.qcm[i]['pseudo'];

            result +='<tr class="trBody" id="'+i+'">\n' +
                '                        <td class="tdForum1">'+nomQcm+'</td>\n' +
                '                        <td class="tdForum1">'+typeCours+'</td>\n' +
                '                        <td class="tdForum1">'+pseudo+'</td>\n' +
                '                    </tr>'
        }
        leTbody.append(result);
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
    });
}





$(document).ready(function() {
    $("input.btCreer").on("mouseover", function () {
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color": "white", //Change la couleur d'arrière en blanc
            "color": "darkblue", //Change la couleur du texte en orange foncé
            "cursor": "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave", function () {
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color": "darkblue", //Change la couleur d'arrière en blanc
            "color": "white", //Change la couleur du texte en orange foncé
        });
    }).on("click", function () {
        window.location.href = 'ajoutQCM.php';
    });

});

