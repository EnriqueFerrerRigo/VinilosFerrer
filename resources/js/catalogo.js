document.addEventListener('DOMContentLoaded', () => {
    const filtros = document.querySelectorAll('.form-select');
    const buscador = document.querySelector('input[type=search]');

    filtros.forEach(filtro => {
        filtro.addEventListener('change', () => {
            console.log(`Filtro ${filtro.name || filtro.className} cambiado a ${filtro.value}`);
        });
    });

    buscador?.addEventListener('keyup', () => {
        console.log(`Buscando: ${buscador.value}`);
    });
});
