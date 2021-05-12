$(document).ready(function(){
    $("#boutonGererCours").on("click", function (){
        // window.location.href = 'tableauQCM.php';
    });

    $("#boutonGererQCM").on("click", function (){
        window.location.href = 'tableauQCM.php';
    });

    $("#boutonGererUtilisateur").on("click", function (){
        window.location.href = 'tableauUtilisateur.php';
    });

});