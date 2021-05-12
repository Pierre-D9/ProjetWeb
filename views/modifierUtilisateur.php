<?php
$title = "Page utilisateurs";
$linkCSS = "ajouterUtilisateur";
include("../_scripts/enteteAdmin.php");
$tabInfoUtil = $_SESSION['utilAEnvoyer'];
$pseudo = $tabInfoUtil[0];
$nom = $tabInfoUtil[1];
$prenom = $tabInfoUtil[2];
$mail = $tabInfoUtil[3];
?>
<div class="contenneurTitre">
    <h1>Modifier un utilisateur</h1>
</div>

<div  class="contenneur" >
    <form action="../_controllers/modifierUnUtilisateur.php" method="post">
        <div class ="rentrerUtil " >
            <div class="partieNom" style="  padding: 10px 10px; font-size: 20px;" >
                <label for="pseudo" class="labelPseudo">Pseudo : </label>
                <input type="text" value="<?=$pseudo ?>" name="pseudo" class="inputPseudo" readonly/>
            </div>
        </div>
        <div class ="rentrerUtil , cadre " >
            <div class="partieNom" style="  padding: 10px 10px; font-size: 20px;" >
                <label  for="nom"><b>Nom :</b></label>

                <input  type = "text" name ="nom"  class="titreSujet" id = "nom" value="<?=$nom ?>" required />
            </div>
            <div class = "partiePrenom " style="  padding: 10px 10px; font-size: 20px;" >
                <label   for="prenom" ><b>Prenom:</b></label>
                <input type = "text" name ="prenom"  class="titreSujet"  value="<?=$prenom ?>"  required />
            </div>

            <div class = "partieMail " style="  padding: 10px 10px;  font-size: 20px; " >
                <label  for="email" ><b>Adresse mail:</b></label>
                <input type = "text" name ="mail" class="titreSujet" value="<?=$mail ?>" required />
            </div>

            <div class = " lesBoutons ">

                <input type="button" value="Annuler"  class = "btAnnuler"   >
                <input type="submit"  value="Modifier" class = "btValider"   >


            </div>
        </div>

    </form>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/ajouterUtilisateur.js"></script>


<?php include("../_scripts/footerAdmin.php"); ?>

