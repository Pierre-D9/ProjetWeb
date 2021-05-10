<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <title>Login & Signup Form</title> -->
    <link rel="stylesheet" href="../assets/css/connexion.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <div class="wrapper">
      <div class="title-text">
          <div class="title login">
              Connexion</div>
          <div class="title signup">
              Inscription</div>
      </div>
      <div class="form-container">
          <div class="slide-controls">
              <input type="radio" name="slide" id="login" checked>
              <input type="radio" name="slide" id="signup">
              <label for="login" class="slide login">Connexion</label>
              <label for="signup" class="slide signup">Inscription</label>
              <div class="slider-tab">
              </div>
          </div>
          <div class="form-inner">
              <form action="#" class="login">
                  <div class="field">
                      <input type="text" placeholder="Pseudo" name="pseudoUtil" required>
                  </div>
                  <div class="field">
                      <input type="password" placeholder="Mot-de-passe" name="passwordUtil" required>
                  </div>
                  <div class="pass-link">
                      <a href="#">Mot de passe oublié?</a></div>
                  <div class="field btn">
                      <div class="btn-layer">
                      </div>
                      <input type="submit" value="Connexion">
                  </div>
                  <div class="signup-link">
                      Pas encore inscrit? <a href=""> Inscription</a></div>
              </form>
              <form action="#" class="signup">
                  <div class="field">
                      <input type="text" placeholder="Prénom" required>
                  </div>
                  <div class="field">
                      <input type="text" placeholder="Nom" required>
                  </div>
                  <div class="field">
                      <input type="text" placeholder="Pseudo" required>
                  </div>
                  <div class="field">
                      <input type="email" placeholder="Adresse-mail" required>
                  </div>
                  <div class="field">
                      <input type="password" placeholder="Mot-de-passe" required>
                  </div>

                  <div class="field btn">
                      <div class="btn-layer">
                      </div>
                      <input type="submit" value="Inscription">
                  </div>
              </form>
          </div>
      </div>
  </div>
  <script src="../assets/js/connexion.js"></script>
  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  </body>
</html>
