<?php
$title = "Page utilisateurs";
$linkCSS = "ajouterUtilisateur";
include("../_scripts/enteteAdmin.php");

?>
<div class="contenneurTitre">
    <h1>Ajouter un utilisateur </h1>
</div>

<div  class="contenneur" >
    <form action="../_controllers/ajouterUnUtilisateur.php" method="post">
        <div class ="rentrerUtil , cadre " >
            <div class="partieNom" style="  padding: 10px 10px; font-size: 20px;" >
                <label  for="nom"><b>Nom :</b></label>
                <input  type = "text" name ="nom" id="nom" class="titreSujet" required />
            </div>
            <div class = "partiePrenom " style="  padding: 10px 10px; font-size: 20px;" >
                <label   for="prenom" ><b>Prenom:</b></label>
                <input type = "text" name ="prenom" id="prenom" class="titreSujet" required />
            </div>

            <div class = "partieMail " style="  padding: 10px 10px;  font-size: 20px; " >
                <label  for="email" ><b>Adresse mail:</b></label>
                <input type = "email" name ="mail" id="mail" class="titreSujet"  required />
            </div>

            <div class = "partieMail " style="  padding: 10px 10px;  font-size: 20px; " >
                <label  for="email" ><b>Pseudo:</b></label>
                <input type = "text" name ="pseudo" id="pseudo" class="titreSujet"  required />
            </div>

            <div class = "partieMail " style="  padding: 10px 10px;  font-size: 20px; " >
                <label  for="password" ><b>Mot de passe:</b></label>
                <input type = "password" name ="password" id="password" class="titreSujet"  required />
            </div>

            <div class = " lesBoutons ">

                <input type="button" value="Annuler"  class = "btAnnuler"   >
                <input type="submit"  value="Ajouter" class = "btValider"   >


            </div>
        </div>

    </form>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/ajouterUtilisateur.js"></script>

<?php include("../_scripts/footer.php"); ?>
