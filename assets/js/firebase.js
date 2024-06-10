var firebaseConfig = {
    
    apiKey: "AIzaSyC8xmYTu9BJerJS6n_bAAPnLZWa6wv7Ew4",
    authDomain: "optigf.firebaseapp.com",
    projectId: "optigf-d466f",
    storageBucket: "optigf-d466f.appspot.com"
  };
  
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  
  // Fonction d'inscription utilisateur
  function signUp() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Créer un compte utilisateur avec email et mot de passe
    firebase
      .auth()
      .createUserWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // Utilisateur inscrit avec succès
        const user = userCredential.user;
        alert("Inscription réussie !");
      })
      .catch((error) => {
        // Gérer les erreurs d'inscription
        const errorMessage = error.message;
        alert("Erreur lors de l'inscription : " + errorMessage);
      });
  }

  // Fonction de connexion utilisateur
  function signIn() {
    const email = document.getElementById("login-email").value;
    const password = document.getElementById("login-password").value;

    // Connexion de l'utilisateur avec email et mot de passe
    firebase
      .auth()
      .signInWithEmailAndPassword(email, password)
      .then((userCredential) => {
        // Utilisateur connecté avec succès
        const user = userCredential.user;
        alert("Connexion réussie !");

        // Afficher le bouton de téléchargement
        document.getElementById("download-button").style.display = "block";
      })
      .catch((error) => {
        // Gérer les erreurs de connexion
        const errorMessage = error.message;
        alert("Erreur lors de la connexion : " + errorMessage);
      });
  }

  // Fonction de téléchargement du fichier
  function downloadFile() {
    // Obtenez une référence à votre fichier ZIP dans Firebase Storage
    var storageRef = firebase.storage().ref("1jecTrapGang.zip");

    // Générer un lien de téléchargement sécurisé
    storageRef
      .getDownloadURL()
      .then(function (url) {
        // Le lien de téléchargement sécurisé a été généré avec succès
        // Redirigez l'utilisateur vers ce lien pour télécharger le fichier ZIP
        window.location.href = url;
      })
      .catch(function (error) {
        // Gérer les erreurs de génération du lien de téléchargement
        console.error("Erreur lors de la génération du lien de téléchargement:", error);
        alert("Erreur lors de la génération du lien de téléchargement.");
      });
  }

  // Attendre que la page soit chargée pour appeler signUp() et signIn()
  document.addEventListener("DOMContentLoaded", () => {
    const signUpButton = document.getElementById("sign-up-button");
    signUpButton.addEventListener("click", signUp);

    const loginButton = document.getElementById("login-button");
    loginButton.addEventListener("click", signIn);

    // Ajouter un gestionnaire d'événements pour le bouton de téléchargement
    const downloadButton = document.getElementById("download-button");
    downloadButton.addEventListener("click", downloadFile);
  });