<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page ajouter un forum</title>
    <link rel="stylesheet" href="../assets/css/ajoutQuestionQCM.css"/>
</head>
<body>
<div class="contenneurTitre">
    <h1>Ajouter les question</h1>
</div>

<div class="contenneur">
    <form action="" method="post">
        <div class="rentrerAdmin">
            <div class="partieQuestion">
                <div class="laQuestion">
                    <label for="question" class="labelQuestion" >Question : </label>
                </div>
                <textarea id="question" name="question" class="question" required></textarea>
            </div>
            <div class="informatif">
                <p>(Cocher les réponses vraie)</p>
            </div>
            <div class="partieReponse">
                <div class="uneReponse">
                    <label for="reponse1">Réponse 1 : </label>
                    <input type="text" name="reponse1" class="reponse1" id="reponse1" required/>
                    <input type="checkbox" id="CBreponse1" name="CBreponse1" class="CBreponse1">
                    <p class="btRemove" id="btR1"></p>
                </div>
                <div class="uneReponse">
                    <label for="reponse2">Réponse 2 : </label>
                    <input type="text" name="reponse2" class="reponse2" id="reponse2" required/>
                    <input type="checkbox" id="CBreponse2" name="CBreponse2" class="CBreponse2">
                    <p class="btRemove" id="btR2"></p>
                </div>
            </div>
            <div class="contenneurBoutonPlus">
                <div class="boutonPlus">
                    <input type="button" class="btPlus" value="+ de réponses">
                </div>
            </div>

        </div>

        <div class="lesBoutons">
            <input type="button" value="Précédent" class="btPrecedent">
            <input type="submit" value="Valider" class="btValider">
            <input type="submit" value="Suivant" class="btSuivant">
        </div>
    </form>
</div>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/ajoutQuestionQCM.js"></script>
</body>
</html>