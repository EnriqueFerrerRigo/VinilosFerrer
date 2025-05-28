document.addEventListener('DOMContentLoaded', () => {
    const selects = document.querySelectorAll('.form-select');
    const searchInput = document.querySelector('input[type=search]');

    selects.forEach(select => {
        select.addEventListener('change', () => {
            console.log(`Filtro cambiado: ${select.value}`);
        });
    });

    searchInput?.addEventListener('input', () => {
        console.log(`Buscando: ${searchInput.value}`);
    });
});
