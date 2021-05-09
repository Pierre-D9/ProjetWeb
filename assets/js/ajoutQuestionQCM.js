$(document).ready(function(){
    var numQuestion = 1;
    var nbrReponse = 2; //nombre de réponse de la question
    $('form').on("submit", false);

    $('label.labelQuestion').html("Question "+numQuestion + " : ");

    $('input.btSuivant').on("focus", function () {
       alert("nice ça");
    });

    gererBoutonPrescedent();
    gererBoutonSuivant();

    clickTrait(1);
    clickTrait(2);

    function clickTrait(numReponse){
        $('#btR'+numReponse).on("click", function () {
            if(nbrReponse>2){
                var id = $(this).attr('id');
                var splitID = id.split('R');
                var numeroReponse = splitID[1];
                var lesReponses = $(this).parent().parent();
                var tableauReponse = [];
                var tableauCheckBox = [];
                for(var i = 1; i < nbrReponse+1; i++){
                    if(i != numeroReponse){
                        var laReponse =  $('input.reponse'+i).val();
                        if ($('input.CBreponse'+i).is(":checked")){
                            tableauCheckBox.push(1)
                        }else{
                            tableauCheckBox.push(0)
                        }
                        tableauReponse.push(laReponse);
                    }
                }
                nbrReponse--;
                lesReponses.empty();
                var resultat = "";
                for(var i = 1; i < nbrReponse+1; i++){
                    if(tableauCheckBox[i-1] == 0){
                        resultat += "<div class='uneReponse'>\n" +
                            "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                            "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ tableauReponse[i-1]+"' required/>\n" +
                            "           <input type='checkbox' id='CBreponse"+ i +"' name='CBreponse"+ i +"' class='CBreponse"+ i +"'>\n" +
                            "           <p class='btRemove' id='btR"+ i +"'></p>"+
                            "      </div>";
                    }else{
                        resultat += "<div class='uneReponse'>\n" +
                            "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                            "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ tableauReponse[i-1]+"' required/>\n" +
                            "           <input type='checkbox' id='CBreponse"+ i +"' name='CBreponse"+ i +"' class='CBreponse"+ i +"' checked>\n" +
                            "           <p class='btRemove' id='btR"+ i +"'></p>"+
                            "      </div>";
                    }
                }
                lesReponses.append(resultat);
                for(var i = 1; i < nbrReponse+1; i++){
                    clickTrait(i);
                }
            }else{
                alert("Il doit y avoir minimum 2 réponses");
            }
        });
    }


    $("input.btPlus").on("mouseover", function(){
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
            "color" : "blue", //Change la couleur du texte en orange foncé
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave",function (){
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color" : "blue", //Change la couleur d'arrière en bleue
            "color" : "white", //Change la couleur du texte en blanc foncé
        });
    }).on("click", function (){
        if(nbrReponse<6){
            nbrReponse++;
            var result = "<div class='uneReponse'>\n" +
                "           <label for='reponse1'>Réponse "+ nbrReponse +" : </label>\n" +
                "           <input type='text' name='reponse"+ nbrReponse +"' class='reponse"+ nbrReponse +"' id='reponse"+ nbrReponse +"' required/>\n" +
                "           <input type='checkbox' id='CBreponse"+ nbrReponse +"' name='CBreponse"+ nbrReponse +"' class='CBreponse"+ nbrReponse +"'>\n" +
                "           <p class='btRemove' id='btR"+ nbrReponse +"'></p>"+
                "         </div>";
            $('div.partieReponse').append(result);
            clickTrait(nbrReponse);
        }else{
            alert("limite de réponse atteinte");
        }
    });



    $("input.btPrecedent").on("mouseover", function(){
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
            "color" : "#FF8C00", //Change la couleur du texte en orange foncé
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave",function (){
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color" : "#FF8C00", //Change la couleur d'arrière en orange foncé
            "color" : "white", //Change la couleur du texte en blanc
        });
    });

    $("input.btValider").on("mouseover", function(){
        //Lorsque le pointeur de la souris est sur le bouton
        $(this).css({
            "background-color" : "white", //Change la couleur d'arrière en blanc
            "color" : "#FF8C00", //Change la couleur du texte en orange foncé
            "cursor" : "pointer" //Change l'aspect du pointeur
        });
    }).on("mouseleave",function (){
        //Lorsque le pointeur de la souris n'est plus sur le bouton
        $(this).css({
            "background-color" : "#FF8C00", //Change la couleur d'arrière en orange foncé
            "color" : "white", //Change la couleur du texte en blanc
        });
    }).on("click", function (){
        window.location.href = 'tableauForum.php';
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
    });

    function gererBoutonPrescedent(){
        var boutonPrecedent = $("input.btPrecedent");
        if(numQuestion == 1){
            boutonPrecedent.on("click", function () {
                window.location.href = 'ajoutQCM.php';
            });
        }else{
            boutonPrecedent.on("click", function () {
                $(this).blur();
                numQuestion--;
            });
        }

    }

    function gererBoutonSuivant(){
        if(numQuestion == 50){
            $("input.btSuivant").on("submit", function () {
                $(this).blur();
                alert("nope");
            });
        }else{
            $("input.btSuivant").on("click", function(){
                $(this).blur();
            });

        }
    }

});

