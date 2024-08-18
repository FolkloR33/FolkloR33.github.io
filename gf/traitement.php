<?php

$servername = "localhost";
$username = "root";
$password = "OMV!Gribouille33*";
try {
    $dsn = "mysql:host=$servername;dbname=utilisateurs";
    $bdd = new PDO($dsn, $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage()); // Utilisez die() pour arrêter l'exécution en cas d'erreur de connexion
}

if (isset($_POST['OK'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    try {
        // Préparez et exécutez la requête d'insertion
        $request = $bdd->prepare("INSERT INTO users (id, login, password) VALUES (0, :login, MD5(:password))");
        
        // Exécutez la requête
        $success = $request->execute([
            "login" => $login,
            "password" => $password,
        ]);

        // Vérifiez le résultat de l'exécution
        if ($success) {
            echo "User successfully registered.";
        } else {
            echo "Failed to register the user.";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
    }
}
?>