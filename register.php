

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OptiGF - Inscription</title>
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
              <h2>Inscription</h2>
              <p>Tu peux créer un compte ici.</p>
            </div>
            <br>
            <br>
          </section>


            
            <form method="POST" action="">
                <label for="login"><p>Pseudo <a style="color: #ff0000">*</a></p></label>
                <input type="text" name="login" id="login" placeholder="Entrez une valeur..." required>
                <br>
                <label for="password"><p>Mot de passe <a style="color: #ff0000">*</a></p></label>
                <input type="text" name="password" id="password" placeholder="Entrez une valeur..." required>
                <br>
                <input type="submit" name="OK" value="M'inscrire">
            </form>
            <br>
            <br>
            <p>
            <?php
              $servername = "localhost";
              $usernameDb = getenv('DB_USERNAME');
              $passwordDb = getenv('DB_PASSWORD');

              try {
                $dsn = "mysql:host=$servername;dbname=OptiGF";
                $bdd = new PDO($dsn, $usernameDb, $passwordDb);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur : " . $e->getMessage());
            }
            
            if (isset($_POST['OK'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
            
                // Hashage sécurisé du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
                try {
                    $request = $bdd->prepare("INSERT INTO users (login, password, token) VALUES (:login, :password, '')");
                    $success = $request->execute([
                        'login' => $login,
                        'password' => $hashedPassword
                    ]);
            
                    if ($success) {
                        header("Location:/www/login.php");
                        exit;
                    } else {
                        echo "L'inscription n'a pas été prise en compte.";
                    }
                } catch (PDOException $e) {
                    echo "Une erreur est survenue : " . $e->getMessage();
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