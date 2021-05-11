<?php
    $nomPrenom = $_SESSION['nomPrenom'];
?>
    <div class="header">

        <div class="Titre">
            <img src="../assets/Image/WearleonlyColor.png" class="logo">
        </div>
        <div class="nomEtDeco">
            <p class="nomAdmin"><?php echo $nomPrenom; ?></p>
            <span class="btDeconnexion"><i class="fas fa-power-off" style="transform: scale(2);"></i></span>
        </div>
    </div>
    <img src="../assets/Image/FondAdmin.png" id="image">
    <br/>
    <br/>
