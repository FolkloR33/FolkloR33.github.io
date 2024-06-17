// C_COLLECTION.INI


const headers4 = generateHeaders(10, ''); // Générer les en-têtes en commençant à 0
const data4 = [
    ['<strong>C_COLLECTION</strong>(mall)<strong> </strong>(9 pipes)', 'id', 'description?','switcher si catégorie','catégorie (parent)','catégorie (enfant)','N°case','points archives','obtention','useless?',],
    ['[targeted_file]', 'archives', '', '', '', '', '', '', '', '', '',],
]; 

createTable(2, 10, headers4, data4, 'tablesContainer');