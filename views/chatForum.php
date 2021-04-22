<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page chat forum</title>
    <link rel="stylesheet" href="../assets/css/chatForum.css"/>
</head>
<?php
session_start();
if(isset($_SESSION['leForum'])){
    $leForum = $_SESSION['leForum'];
    $idForum = $leForum[0];
    $nom = $leForum[1];
    $question = $leForum[2];
    $dateF = $leForum[3];
    $createur = $leForum[4];
    $idTypeCours = $leForum[5];
    $vous = "FarahB";

?>
<body>
    <h1 id="<?php echo $vous;?>">Forum</h1>

    <div class="contennue">
        <div class="enteteChat">
            <?php echo "<h2 id='".$idForum."'>".$nom."</h2>"; ?>
            <div class="questionEtDate">
                <div class="question">
                    <p><span class="pseudoVous"><?php echo $createur; ?> </span> <?php echo $question; ?></p>
                </div>
                <div class="dateForum">
                    <p><?php echo $dateF; ?></p>
                </div>
            </div>
        </div>


        <div class="chat">
            <div class="lesMessages">
                <div class="blockMessageAutre">
                    <div class="contenneurMessage">
                    <span class="contennueMessageAutre">
                        <span class="pseudo">Pseudo</span>
                        <span class="leMessage">Ce texte est très longggggg mais ça marcheeee</span>
                        <span class="date">04/04/2021</span>
                        <span class="heure">10:00</span>
                    </span>
                    </div>
                </div>
                <div class="blockMessageVous">
                    <div class="contenneurMessage">
                    <span class="contennueMessageVous">
                        <span class="pseudo">Vous</span>
                        <span class="leMessage">Ce texte est très longggggg mais ça marcheeee il est encore plus long c'est abusé comment il est long on fait comment maintenant?</span>
                        <span class="date">04/04/2021</span>
                        <span class="heureV2">10:02</span>
                    </span>
                    </div>
                </div>
                <div class="blockMessageVous">
                    <div class="contenneurMessage">
                    <span class="contennueMessageVous">
                        <span class="pseudo">Vous</span>
                        <span class="leMessage">Coucou</span>
                        <span class="date">04/04/2021</span>
                        <span class="heureV2">10:04</span>
                    </span>
                    </div>
                </div>
                <div class="blockMessageAutre">
                    <div class="contenneurMessage">
                    <span class="contennueMessageAutre">
                        <span class="pseudo">Pseudo</span>
                        <span class="leMessage">Hey</span>
                        <span class="date">04/04/2021</span>
                        <span class="heure">10:06</span>
                    </span>
                    </div>
                </div>
                <div class="blockMessageVous">
                    <div class="contenneurMessage">
                    <span class="contennueMessageVous">
                        <span class="pseudo">Vous</span>
                        <span class="leMessage">ça va?</span>
                        <span class="date">04/04/2021</span>
                        <span class="heureV2">10:36</span>
                    </span>
                    </div>
                </div>
                <div class="blockMessageAutre">
                    <div class="contenneurMessage">
                    <span class="contennueMessageAutre" id="contennueMessageAutre">
                        <span class="pseudo">Pseudo</span>
                        <span class="leMessage">Heysdfdkhnhdsbdfhsbdf dfygsdhdbfhsdh dsfghdshdbhsd dfsfsdksfd  iddsjddfs dsdjs sdfsdf sdssfddjdsygfhdsbdfhsdh dsfs</span>
                        <span class="date">04/04/2021</span>
                        <span class="heure">10:38</span>
                    </span>
                    </div>
                </div>
            </div>

            <div class="trait"></div>

            <div class="blockReponse">
                <form>
                    <div class="contenneurForm">
                        <div class="contennueMessage">
                            <textarea name="reponse" class="reponse" placeholder="Votre message" rows="5" ></textarea>
                        </div>
                        <div class="contennueBtEnvoyer">
                            <input type="button" value="Envoyer 🔥" class="btEnvoyer" id="btEnvoyer"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br />
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/chatForum.js"></script>
</body>
<?php
}else{
    echo "Erreur de récupération des données";
}
?>
</html>