$("span.btDeconnexion").on("click", function(){
    window.location.href = '../_controllers/deconnexion.php';
});

$("img.logo").on("click", function () {
    window.location.href = 'homeAdmin.php';
});

$("p.gererCours").on("click", function (){
    // window.location.href = 'tableauUtilisateur.php';
});

$("p.gererQCM").on("click", function (){
    window.location.href = 'tableauQCM.php';
});

$("p.gererUtil").on("click", function (){
    window.location.href = 'tableauUtilisateur.php';
});

$("img.logoo").on("click", function () {
    window.location.href = 'homeApprenant.php';
});

$("p.voirCours").on("click", function (){
    // window.location.href = 'ta.php';
});

$("p.voirQCM").on("click", function (){
    window.location.href = 'tableauQCMApprenant.php';
});

$("p.voirForum").on("click", function (){
    window.location.href = 'tableauForum.php';
});