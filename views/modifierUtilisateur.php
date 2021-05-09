<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page utilisateurs </title>
    <link rel="stylesheet" href="../assets/css/ajouterUtilisateur.css"/>
</head>
<body>
<?php
include_once('../_controllers/chargementClasses.php');
?>
<div class="contenneurTitre">
    <h1>modifier un utilisateur </h1>
</div>

<div  class="contenneur" >
    <form action="../_controllers/modifierUnUtilisateur.php" method="post">
        <div class ="rentrerUtil " >
            <div class="partieNom" style="  padding: 10px 10px; font-size: 20px;" >
        <label  for="ID"><b>ID :</b></label>
                <input type="text" name="pseudo" >
            </div>
        </div>
        <div class ="rentrerUtil , cadre " >
            <div class="partieNom" style="  padding: 10px 10px; font-size: 20px;" >
                <label  for="nom"><b>Nom :</b></label>
                <input  type = "text" name ="nom"  class="titreSujet"  "required />
            </div>
            <div class = "partiePrenom " style="  padding: 10px 10px; font-size: 20px;" >
                <label   for="prenom" ><b>Prenom:</b></label>
                <input type = "text" name ="prenom"  class="titreSujet"  "  required />
            </div>

            <div class = "partieMail " style="  padding: 10px 10px;  font-size: 20px; " >
                <label  for="email" ><b>Adresse mail:</b></label>
                <input type = "text" name ="mail" class="titreSujet"  " required />
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

</body>
</html>

