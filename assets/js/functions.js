function createTable(rows, cols, headers, data, containerId) {
    const container = document.getElementById(containerId);
    let tableContent = '<table border="1"><thead><tr>';

    for (let col = 0; col < cols; col++) {
        tableContent += `<th>${headers[col] || 'Col ' + (col + 1)}</th>`;
    }
    tableContent += '</tr></thead><tbody>';

    for (let row = 1; row <= rows; row++) {
        tableContent += '<tr>';
        for (let col = 0; col < cols; col++) {
            const cellData = data[row - 1][col] || ''; // Obtenir les données de la matrice
            tableContent += `<td>${cellData}</td>`;
        }
        tableContent += '</tr>';
    }
    tableContent += '</tbody></table>';
    container.innerHTML += tableContent;
}

// Fonction pour générer les en-têtes
function generateHeaders(colCount, prefix) {
    const headers = [];
    for (let i = 0; i < colCount; i++) { // Commencer le décompte à partir de 0
        headers.push(prefix + ' ' + i);
    }
    return headers;
}