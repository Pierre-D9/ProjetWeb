var i = 0;
$(document).ready(function(){

    //Permet de changer l'aspect du curseur quand la souris est sur le bouton input
    $("input.btEnvoyer").on("mouseover", function(){
        $(this).css('cursor','pointer');
    }).on("mouseleave",function (){
        $(this).css('cursor','auto');
    });

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


});