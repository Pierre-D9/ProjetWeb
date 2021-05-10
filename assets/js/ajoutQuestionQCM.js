$(document).ready(function(){
    var numQuestion = 1;
    var nbrReponse = 2; //nombre de réponse de la question
    $('form').on("submit", false);

    $.ajax({
        url:"../_functions/rechercherQuestionQCM.php", //nom du script php ou ajax va récupérer le fichier json
        type: "GET",
        data : "numQuestion="+numQuestion,
        dataType : 'html', //type de données renvoyées
        success : function(code_html, statut){
            if(code_html != ""){
                const leJson = JSON.parse(code_html);
                var nomQuestion = leJson.laQuestion['question'];
                $('textarea').val(nomQuestion);
                $('label.labelQuestion').html("Question "+numQuestion + " : ");
                nbrReponse =  leJson.laQuestion['lesReponses'].length;
                var lesReponses = $('div.partieReponse');
                lesReponses.empty();
                var resultat = "";
                for(var i = 1; i < nbrReponse+1; i++){
                    if(leJson.laQuestion['tabCheckBox'][i-1] == 0){
                        resultat += "<div class='uneReponse'>\n" +
                            "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                            "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ leJson.laQuestion['lesReponses'][i-1]+"' required/>\n" +
                            "           <input type='checkbox' id='CBreponse"+ i +"' name='CBreponse"+ i +"' class='CBreponse"+ i +"'>\n" +
                            "           <p class='btRemove' id='btR"+ i +"'></p>"+
                            "      </div>";
                    }else{
                        resultat += "<div class='uneReponse'>\n" +
                            "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                            "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ leJson.laQuestion['lesReponses'][i-1]+"' required/>\n" +
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
                console.log(code_html);
            }
        },
        error : function(resultat, statut, erreur){
            console.log(erreur);
        }
    });
    $('label.labelQuestion').html("Question "+numQuestion + " : ");

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
    }).on("click", function () {
        if(numQuestion == 1){
            window.location.href= "ajoutQCM.php";
        }else{
            numQuestion--;
            $.ajax({
                url:"../_functions/rechercherQuestionQCM.php", //nom du script php ou ajax va récupérer le fichier json
                type: "GET",
                data : "numQuestion="+numQuestion,
                dataType : 'html', //type de données renvoyées
                success : function(code_html, statut){
                    if(code_html != ""){
                        const leJson = JSON.parse(code_html);
                        var nomQuestion = leJson.laQuestion['question'];
                        $('textarea').val(nomQuestion);
                        $('label.labelQuestion').html("Question "+numQuestion + " : ");
                        nbrReponse =  leJson.laQuestion['lesReponses'].length;
                        var lesReponses = $('div.partieReponse');
                        lesReponses.empty();
                        var resultat = "";
                        for(var i = 1; i < nbrReponse+1; i++){
                            if(leJson.laQuestion['tabCheckBox'][i-1] == 0){
                                resultat += "<div class='uneReponse'>\n" +
                                    "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                                    "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ leJson.laQuestion['lesReponses'][i-1]+"' required/>\n" +
                                    "           <input type='checkbox' id='CBreponse"+ i +"' name='CBreponse"+ i +"' class='CBreponse"+ i +"'>\n" +
                                    "           <p class='btRemove' id='btR"+ i +"'></p>"+
                                    "      </div>";
                            }else{
                                resultat += "<div class='uneReponse'>\n" +
                                    "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                                    "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ leJson.laQuestion['lesReponses'][i-1]+"' required/>\n" +
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
                        console.log(code_html);
                    }
                },
                error : function(resultat, statut, erreur){
                    console.log(erreur);
                }
            });
            $('label.labelQuestion').html("Question "+numQuestion + " : ");
            $(this).blur();
        }
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
        if(numQuestion>1){
            var leTextarea = $('textarea').val();
            var tabReponse = [];
            var tabCheckBox = [];
            for(var i = 0; i<nbrReponse; i++){
                tabReponse.push($('input.reponse'+(i+1)).val());
                if ($('input.CBreponse'+(i+1)).is(":checked")){
                    tabCheckBox.push(1);
                }else{
                    tabCheckBox.push(0);
                }
            }
            window.location.href = "../_controllers/ajouterQCM.php?question="+leTextarea+"&numQuestion="+numQuestion+"&lesReponses="+tabReponse+"&tabCheckBox="+tabCheckBox;
        }else{
            alert("Vous devez mettre au moin 2 question")
        }
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
    }).on("click", function () {
        //Vérification si tous est remplie
        var isAllRemplie = 1;
        var leTextarea = $('textarea').val();
        if(leTextarea === ""){
            isAllRemplie = 0;
        }else{
            for(var i = 1; i <= nbrReponse; i++){
                if($('input.reponse'+i).val() === ""){
                    isAllRemplie = 0;
                }
            }
        }

        //Si tous est remplie
        if(isAllRemplie == 1){
            if(numQuestion>50){
                alert("Impossible de faire plus de 50 questions");
            }else{
                var tabReponse = [];
                var tabCheckBox = [];
                for(var i = 0; i<nbrReponse; i++){
                    tabReponse.push($('input.reponse'+(i+1)).val());
                    if ($('input.CBreponse'+(i+1)).is(":checked")){
                        tabCheckBox.push(1);
                    }else{
                        tabCheckBox.push(0);
                    }
                }
                $.ajax({
                    url:"../_controllers/ajouterQuestion.php", //nom du script php ou ajax va récupérer le fichier json
                    type: "GET",
                    data : "question="+leTextarea+"&numQuestion="+numQuestion+"&lesReponses="+tabReponse+"&tabCheckBox="+tabCheckBox,
                    dataType : 'html', //type de données renvoyées
                    success : function(code_html, statut){
                        if(code_html != ""){
                            const leJson = JSON.parse(code_html);
                            var nomQuestion = leJson.laQuestion['question'];
                            $('textarea').val(nomQuestion);
                            nbrReponse =  leJson.laQuestion['lesReponses'].length;
                            var lesReponses = $('div.partieReponse');
                            lesReponses.empty();
                            var resultat = "";
                            for(var i = 1; i < nbrReponse+1; i++){
                                 if(leJson.laQuestion['tabCheckBox'][i-1] == 0){
                                    resultat += "<div class='uneReponse'>\n" +
                                        "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                                        "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ leJson.laQuestion['lesReponses'][i-1]+"' required/>\n" +
                                        "           <input type='checkbox' id='CBreponse"+ i +"' name='CBreponse"+ i +"' class='CBreponse"+ i +"'>\n" +
                                        "           <p class='btRemove' id='btR"+ i +"'></p>"+
                                        "      </div>";
                                }else{
                                    resultat += "<div class='uneReponse'>\n" +
                                        "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                                        "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' value='"+ leJson.laQuestion['lesReponses'][i-1]+"' required/>\n" +
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
                            resultat ="";
                            $('textarea').val("");
                            nbrReponse = 2;
                            var lesReponses = $('div.partieReponse');
                            lesReponses.empty();
                            for(var i = 1; i < nbrReponse+1; i++){
                                resultat += "<div class='uneReponse'>\n" +
                                    "           <label for='reponse1'>Réponse "+ i +" : </label>\n" +
                                    "           <input type='text' name='reponse"+ i +"' class='reponse"+ i +"' id='reponse"+ i +"' required/>\n" +
                                    "           <input type='checkbox' id='CBreponse"+ i +"' name='CBreponse"+ i +"' class='CBreponse"+ i +"'>\n" +
                                    "           <p class='btRemove' id='btR"+ i +"'></p>"+
                                    "      </div>";
                            }
                            lesReponses.append(resultat);
                            for(var i = 1; i < nbrReponse+1; i++){
                                clickTrait(i);
                            }
                        }
                        numQuestion++;
                        $('label.labelQuestion').html("Question "+numQuestion + " : ");
                    },
                    error : function(resultat, statut, erreur){
                        console.log(erreur);
                    }
                });

            }
        }
    });


});

