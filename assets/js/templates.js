document.addEventListener("DOMContentLoaded", function () {
  // Fonction pour charger et insérer le contenu du template
  function loadTemplate(templateId, targetElement) {
    fetch(templateId + ".html")
      .then((response) => response.text())
      .then((data) => {
        const template = document.createElement("template");
        template.innerHTML = data;
        const content = template.content;
        const target = document.querySelector(targetElement);
        if (target) {
          target.appendChild(content);
        } else {
          console.error("Élément cible non trouvé :", targetElement);
        }
      });
  }
  // Charger et insérer le header
  loadTemplate("/www/_header", "header");
  // Charger et insérer le aside droit
  loadTemplate("/www/_right_aside", "aside.right");
  // Charger et insérer le footer
  loadTemplate("/www/_footer", "footer");
});
