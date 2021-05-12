<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page ajouter un forum</title>
    <link rel="stylesheet" href="../assets/css/ajoutForum.css"/>
</head>
<body>
<?php
$title = "Page ajouter un forum";
$linkCSS = "ajoutForum";
include("../_scripts/enteteApprenant.php");

$lesTypesDeCours = array();
include_once('../_controllers/chargementClasses.php');

$forumMySQL = new ForumMySQL();
$rs = $forumMySQL->rechercherLesTypesDeCours();
while($row = $rs->fetch()) {
    $unTypeDeCours = new TypeCours($row[0], $row[1]);
    $lesTypesDeCours[] = $unTypeDeCours;
}
?>
    <div class="contenneurTitre">
        <h1>Ajouter un forum</h1>
    </div>

    <div class="contenneur">
        <form action="../_controllers/ajouterUnForum.php" method="post">
            <div class="rentrerUtil">
                <div class="partieSujet">
                    <label for="titreSujet">Titre du sujet : </label>
                    <input type="text" id="titreSujet" name="titreSujet" class="titreSujet" required />
                </div>

                <div class="partieTypeCours">
                    <label for="typeCours">Type de cours : </label>
                    <span class="listeDeroulante listeDeroulante-barre">
                        <select name="typeCours" id="typeCours" class="typeCours" required>
                            <option value="">Choisissez un type de cours</option>
                            <?php
                            foreach($lesTypesDeCours as $unTypeDeCours){
                                echo "<option value='".$unTypeDeCours->idType."'>".$unTypeDeCours->typeC."</option>";
                            }
                            ?>
                        </select>
                    </span>
                </div>

                <div class="partieQuestion">
                    <label for="question">Question : </label>
                    <textarea name="question" id="question" class="question" rows="7" required ></textarea>
                </div>
            </div>

            <div class="lesBoutons">
                <input type="button" value="Annuler" class="btAnnuler">
                <input type="submit" value="Valider" class="btValider">
            </div>
        </form>
    </div>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/ajoutForum.js"></script>

<?php
    include("../_scripts/footer.php");
?>