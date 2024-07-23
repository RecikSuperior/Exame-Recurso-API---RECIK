// scripts.js

function showCategory(category) {
    const content = document.getElementById('category-content');
    let htmlContent = '';

    switch (category) {
        case 'apartamento':
            htmlContent = '<h2>Apartamentos</h2><p>Lista de apartamentos...</p>';
            break;
        case 'terreno':
            htmlContent = '<h2>Terrenos</h2><p>Lista de terrenos...</p>';
            break;
        case 'vivenda':
            htmlContent = '<h2>Vivendas</h2><p>Lista de vivendas...</p>';
            break;
    }

    content.innerHTML = htmlContent;
}
