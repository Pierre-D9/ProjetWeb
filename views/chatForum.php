<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page chat forum</title>
    <link rel="stylesheet" href="../assets/css/chatForum.css"/>
</head>
<body>
    <h1>Forum</h1>

    <div class="contennue">
        <div class="enteteChat">
            <h2>Nom forum</h2>
            <p><span class="pseudoVous">pseudo </span>La question</p>
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
                            <input type="submit" value="Envoyer 🔥" class="btEnvoyer" id="btEnvoyer"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/chatForum.js"></script>
</body>
</html>