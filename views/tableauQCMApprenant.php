<?php
$title = "Page QCM";
$linkCSS = "tableauQCMApprenant";
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
    <h1>Les QCMs</h1>
</div>

<div class="contenneur">
    <form>
        <div class="choixTypeCours">
            <span class="listeDeroulante listeDeroulante-barre">
                <select>
                    <option value="">Tous les types de cours</option>
                    <?php
                    foreach($lesTypesDeCours as $unTypeDeCours){
                        echo "<option value='".$unTypeDeCours->typeC."'>".$unTypeDeCours->typeC."</option>";
                    }
                    ?>
                </select>
            </span>
        </div>
        <div class="rechercher">
            <input type="search" placeholder="Nom du forum" class="barreDeRecherche" maxlength="40"/>
        </div>
    </form>
    <div class="leTableau">
            <div class="enteteTableau">
                <table>
                    <thead>
                    <tr class="leTrEntete">
                        <th>Nom du QCM</th>
                        <th>Type de cours</th>
                        <th>Auteur</th>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="bodyTableau">
                <table>
                    <tbody>
                    <tr class="trBody" id="1">
                        <td class="tdForum1">Ceciiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii est un nom de forum très très long vraiment long</td>
                        <td class="tdForum1">type de cours</td>
                        <td class="tdForum1">012345678912</td>
                        <td class="tdForum1"><input type="button" class="btModifier" value="Modifier"></td>
                        <td class="tdForum1"><input type="button" class="btSupprimer" value="Supprimer"></td>
                    </tr>

                    <tr class="trBody" id="1">
                        <td class="tdForum1">Ceciiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii est un nom de forum très très long vraiment long</td>
                        <td class="tdForum1">type de cours</td>
                        <td class="tdForum1">012345678912</td>
                        <td class="tdForum1"><input type="button" class="btModifier" value="Modifier"></td>
                        <td class="tdForum1"><input type="button" class="btSupprimer" value="Supprimer"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<div class="test">

</div>

<!-- Les scripts js -->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/tableauQCMApprenant.js"></script>

<?php include("../_scripts/footer.php"); ?>