// C_ITEM.INI


const headers1 = generateHeaders(94, ''); // Générer les en-têtes en commençant à 0
const data1 = [
    ['<strong>C_ITEM</strong>(mall)<strong> </strong>(93 pipes)', 'id', 'icon','','coffre','','','','','','name','type','','attribut','','','','lvl','','','','','','','class','color','','','','','+pv','+pm','+fce','+vit','+int','+vol','+agi','','','','atq_speed (x10)','atq_phys','','déf_phys','atq_mag','déf_mag','toucher','esq','tcc_phys','dcc_phys','tcc_mag','dcc_mag','pén_phys','pén_mag','réd_pén_phys','réd_pén_mag','','','','','','','','','','','','','','proc','','','','','','','','','','','','dura','','','prix_vente','','+parade','','','','','','étoiles_rouge','description'],
    ['[targeted_file]', 'objets', 'root/ui/itemicon/[icon].dds', '', 'root/item/model/[G000XX.nif]', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'root/data/db/c_enchant.ini', '', '', '', '', '', '', '', '','','','','','','','','','','','','','','','root/data/db/C_GodAreaCombine.ini',''],
]; 

createTable(2, 94, headers1, data1, 'tablesContainer');