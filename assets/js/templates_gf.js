document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour charger et insérer le contenu du template
    function loadTemplate(templateId, targetElement) {
        fetch(templateId + '.html')
            .then(response => response.text())
            .then(data => {
                const template = document.createElement('template');
                template.innerHTML = data;
                const content = template.content;
                document.querySelector(targetElement).appendChild(content);
            });
    }
    // Charger et insérer le header
    loadTemplate('/_header', 'header');
    // Charger et insérer le aside droit
    loadTemplate('/_right_aside', 'aside.right');
    // Charger et insérer le aside droit
    loadTemplate('/gf/_gf_left_aside', 'aside.left');
    // Charger et insérer le footer
    loadTemplate('/_footer', 'footer');
});