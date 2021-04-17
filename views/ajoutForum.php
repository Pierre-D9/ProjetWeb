<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page ajouter un forum</title>
    <link rel="stylesheet" href="../assets/css/ajoutForum.css"/>
</head>
<body>
    <div class="contenneurTitre">
        <h1>Ajouter un forum</h1>
    </div>

    <div class="contenneur">
        <form>
            <div class="partieSujet">
                    <label for="nom">Nom générale : </label>
                    <input id="nom" name="nom" type="text" class="inputSujet" placeholder="Entrez un nom" />
            </div>
            <div class="partieQuestion">
                <label for="question">Question : </label>
                <input id="question" name="question" type="text" class="inputQuestion" placeholder="Entrez une question" />
            </div>
            <div class="partieTypeCours">
                <label for="typeCours">Type de cours : </label>
                <span class="listeDeroulante listeDeroulante-barre">
                    <select id="typeCours" class="typeCours">
                        <option value="1">Choisissez un cours</option>
                        <option value="2">The Godfather</option>
                        <option value="3">Pulp Fiction</option>
                        <option value="4">The Good</option>
                        <option value="5">12 Angry Men</option>
                    </select>
                </span>
            </div>
            <div class="lesBoutons">
                <input type="button" value="Annuler" class="btAnnuler">
                <input type="button" value="Valider" class="btValider">
            </div>
        </form>
    </div>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/ajoutForum.js"></script>
</body>
</html>