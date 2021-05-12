<?php
$title = "Page forum";
$linkCSS = "tableauForum";
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
    <h1>Les forums</h1>
</div>

<div class="contenneur">
    <form>
        <div class ="ajouterUnCours">
           <input type="button" class="btCreer" value="Créer un forum" />
        </div>
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
                    <tr>
                        <th>Nom du forum</th>
                        <th>Type de cours</th>
                        <th>Auteur</th>
                        <th>Date</th>
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
                        <td class="tdForum1">09/04/2021</td>

                    </tr>
                    <tr class="trBody" id="2">
                        <td class="tdForum2">Ceci est un nom de forum</td>
                        <td class="tdForum2">type de cours</td>
                        <td class="tdForum2">012345678912</td>
                        <td class="tdForum2">09/04/2021</td>
                    </tr>
                    <tr class="trBody" id="3">
                        <td class="tdForum3">Ceci est un nom de forum</td>
                        <td class="tdForum3">type de cours</td>
                        <td class="tdForum3">012345678912</td>
                        <td class="tdForum3">09/04/2021</td>
                    </tr>
                    <tr class="trBody" id="4">
                        <td class="tdForum4">Ceci est un nom de forum</td>
                        <td class="tdForum4">type de cours</td>
                        <td class="tdForum4">012345678912</td>
                        <td class="tdForum4">09/04/2021</td>
                    </tr>
                    <tr class="trBody" id="5">
                        <td class="tdForum5">Ceci est un nom de forum</td>
                        <td class="tdForum5">type de cours</td>
                        <td class="tdForum5">012345678912</td>
                        <td class="tdForum5">09/04/2021</td>
                    </tr>
                    <tr class="trBody" id="6">
                        <td class="tdForum6">Ceci est un nom de forum</td>
                        <td class="tdForum6">type de cours</td>
                        <td class="tdForum6">012345678912</td>
                        <td class="tdForum6">09/04/2021</td>
                    </tr>
                    <tr class="trBody" id="7">
                        <td class="tdForum7">Ceci est un nom de forum</td>
                        <td class="tdForum7">type de cours</td>
                        <td class="tdForum7">012345678912</td>
                        <td class="tdForum7">09/04/2021</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<br/>
<br/>
<br/>
<br/>

<!-- Les scripts js -->
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/tableauForum.js"></script>

<?php include("../_scripts/footer.php") ?>