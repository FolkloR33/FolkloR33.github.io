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