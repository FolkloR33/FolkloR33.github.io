<?php

include '/www/.env.php';
echo "Connection from '".$usernameDb ."@".$servername."' to '".$nameDb."' ...";echo "<br>";
try {
  $dsn = "mysql:host=$servername;port=$port;dbname=$nameDb";
  $bdd = new PDO($dsn, $usernameDb, $passwordDb);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erreur : " . $e->getMessage());
}

    if (isset($_COOKIE['login']) && isset($_COOKIE['token'])) {
        $login = $_COOKIE['login'];
        $token = $_COOKIE['token'];

        $req = $bdd->prepare("SELECT * FROM users WHERE login = :login AND token = :token");
        $req->execute([
            'login' => $login,
            'token' => $token
        ]);

        $user = $req->fetch();

        if ($user) {
            echo "Bienvenue " . htmlspecialchars($login) . " !";
        } else {
            echo "Authentification échouée !";
            // Rediriger vers la page de connexion
            header("Location:/www/login.php");
            exit;
        }
    } else {
    echo "Vous devez être connecté pour accéder à cette page.";
    header("Location:/www/login.php");
    exit;
}


    
?>