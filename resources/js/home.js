/*
document.addEventListener('DOMContentLoaded', () => {
    const exploreBtn = document.querySelector('.btn-dark');
    const novedadesBtn = document.querySelector('.btn-outline-dark');

    exploreBtn?.addEventListener('click', () => {
        console.log('Explorar tienda clicado');
    });

    novedadesBtn?.addEventListener('click', () => {
        console.log('Ver novedades clicado');
    });
});
*/

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.btn-dark')?.addEventListener('click', () => {
        alert('Ir a tienda');
    });
    document.querySelector('.btn-outline-dark')?.addEventListener('click', () => {
        alert('Ver novedades');
    });
});
