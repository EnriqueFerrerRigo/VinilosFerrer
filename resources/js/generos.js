document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.genero-card .btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const genero = btn.closest('.genero-card').querySelector('h2').textContent.trim();
            alert('Explorar género: ' + genero);
        });
    });
});
