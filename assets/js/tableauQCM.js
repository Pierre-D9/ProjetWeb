rechercherTousLesQCM();

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
        window.location.href = 'ajoutQCM.php';
    });

});

