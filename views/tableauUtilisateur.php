<?php
$title = "Page utilisateurs";
$linkCSS = "tableauUtilisateur";
include("../_scripts/enteteAdmin.php");

?>
<body>
<div class="contenneurTitre">
    <h1>Les utilisateurs </h1>
</div>

<div class="contenneur">
    <div class ="ajouterUnUtilis">
        <input type="button" class="btAjouter" value="Ajouter un utilisateur" />
    </div>

    <div class="leTableau">
        <div class="enteteTableau">
            <table>
                <thead>
                <tr class="trEntete">
                    <th>ID</th>
                    <th>Nom </th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Modifier</th>
                    <th>Suprimer</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="bodyTableau">
            <table>
                <tbody>
                <tr class="trBody" id="1">
                    <td class="tdForum1">2564983745</td>
                    <td class="tdForum1"style =" padding: 10px 25px">nom1</td>
                    <td class="tdForum1" style =" padding: 10px 50px">prenom1</td>
                    <td class="tdForum1">nom1_prenom1@user.com</td>
                    <td class="tdForum1" style =" padding: 10px 30px"><button class= "btM"  onClick="location.href='ModifierUtilisateur.php?pseudo';">modifier</button></td>
                    <td class="tdForum1"style =" padding: 10px 40px"><button class = "btS"  onClick="location.href='suprimerUnUtilisateur.php?pseudo';">supprimer</button></td>

                </tr>
                <tr class="trBody" id="2">
                    <td class="tdForum1">2465987589</td>
                    <td class="tdForum1">nom 2</td>
                    <td class="tdForum1">prenom 2</td>
                    <td class="tdForum1">nom2_prenom2@user.com</td>
                    <td class="tdForum1"><button class="btM"  onClick="location.href='ModifierUtilisateur.php?pseudo';">modifier</button></td>
                    <td class="tdForum1"><button class = "btS"  onClick="location.href='SuprimerUtilisateur.php?pseudo';">supprimer</button></td>

                </tr>
                <tr class="trBody" id="3">
                    <td class="tdForum1">6598423657</td>
                    <td class="tdForum1">nom 3</td>
                    <td class="tdForum1">prenom 3</td>
                    <td class="tdForum1">nom3_prenom3@user.com</td>
                    <td class="tdForum1"><button class="btM"  onClick="location.href='ModifierUtilisateur.php?pseudo';">modifier</button></td>
                    <td class="tdForum1"><button class = "btS"  onClick="location.href='SuprimerUtilisateur.php?pseudo';">supprimer</button></td>

                </tr>
                <tr class="trBody" id="4">
                    <td class="tdForum1">6245983217</td>
                    <td class="tdForum1">nom 4</td>
                    <td class="tdForum1">prenom 4</td>
                    <td class="tdForum1">nom4_prenom4@user.com</td>
                    <td class="tdForum1"><button class="btM"  onClick="location.href='ModifierUtilisateur.php?pseudo';">modifier</button></td>
                    <td class="tdForum1"><button class = "btS"  onClick="location.href='SuprimerUtilisateur.php?pseudo';">supprimer</button></td>

                </tr>
                <tr class="trBody" id="5">
                    <td class="tdForum1">3264895231</td>
                    <td class="tdForum1">nom 5</td>
                    <td class="tdForum1">prenom 5</td>
                    <td class="tdForum1">nom5_prenom5@user.com</td>
                    <td class="tdForum1"><button class="btM"  onClick="location.href='ModifierUtilisateur.php?pseudo';">modifier</button></td>
                    <td class="tdForum1"><button class = "btS"  onClick="location.href='SuprimerUtilisateur.php?pseudo';">supprimer</button></td>

                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/tableauUtilisateur.js"></script>

</body>
<?php include("../_scripts/footer.php"); ?>
</html>
