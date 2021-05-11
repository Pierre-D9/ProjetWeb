$(document).ready(function(){
    $("span.btDeconnexion").on("click", function(){
        window.location.href = '../_controllers/deconnexion.php';
    });

    $("#boutonGererCours").on("click", function (){
        console.log("test");
        // window.location.href = '../_controllers/deconnexion.php';
    });

    $("#boutonGererQCM").on("click", function (){
        console.log("test2");
        // window.location.href = '../_controllers/deconnexion.php';
    });

    $("#boutonGererUtilisateur").on("click", function (){
        console.log("test3");
        // window.location.href = '../_controllers/deconnexion.php';
    });

});