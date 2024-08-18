<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OptiGF - Connexion</title>
    <script src="/www/assets/js/templates.js" defer></script>
    <link rel="stylesheet" href="/www/assets/css/styles.css" />
    <link rel="icon" href="/www/assets/img/logo.png" />
  </head>

  <body>
    <header></header>

    <div class="grid-container">
      <aside class="left"></aside>

      <main>
        <article>
          <section>
            <div class="title">
              <h2>Connexion</h2>
              <p>Tu peux te connecter à ton compte ici.</p>
            </div>
            <br>
            <br>
          </section>
            
            <form method="POST" action="">
                <label for="login"><p>Pseudo <a style="color: #ff0000">*</a></p></label>
                <input type="text" name="login" id="login" placeholder="Entrez une valeur..." required>
                <label for="password"><p>Mot de passe <a style="color: #ff0000">*</a></p></label>
                <input type="password" name="password" id="password" placeholder="Entrez une valeur..." required>
                <br>
                <br>
                <input type="submit" value="Se connecter" name="OK">
            </form>
            <br>
            <br>
            <p>
                <?php
                  $servername = "localhost";
                  $usernameDb = "root";
                  $passwordDb = "OMV!Gribouille33*";
                  try {
                    $dsn = "mysql:host=$servername;dbname=OptiGF";
                    $bdd = new PDO($dsn, $usernameDb, $passwordDb);
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    die("Erreur : " . $e->getMessage());
                  }
                  
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      $login = $_POST['login'];
                      $password = $_POST['password'];
                  
                      if (!empty($login) && !empty($password)) {
                          $token = bin2hex(random_bytes(32));
                  
                          $req = $bdd->prepare("SELECT * FROM users WHERE login = :login");
                          $req->execute(['login' => $login]);
                          $user = $req->fetch();
                  
                          if ($user && password_verify($password, $user['password'])) {
                              $update = $bdd->prepare("UPDATE users SET token = :token WHERE login = :login");
                              $update->execute([
                                  'login' => $login,
                                  'token' => $token
                              ]);
                  
                              setcookie("token", $token, time() + 1800, "/", "", true, true); // Secure cookie options
                              setcookie("login", $login, time() + 1800, "/", "", true, true);
                  
                              header("Location:/www/myAccount.php");
                              exit;
                          } else {
                              echo "Authentification échouée !";
                          }
                      } else {
                          echo "Veuillez remplir tous les champs.";
                      }
                  }
                
                ?>
            </p>

        </article>


        


      </main>

      <aside class="right"></aside>
    </div>

    <footer></footer>
  </body>
</html>