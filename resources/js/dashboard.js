document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.agregar-al-carrito');

    botones.forEach(boton => {
        boton.addEventListener('click', async () => {
            const albumId = boton.getAttribute('data-id');

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const respuesta = await fetch('/carrito/agregar-ajax', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ album_id: albumId })
                });

                const data = await respuesta.json();

                if (data.success) {
                    alert(data.message); // Puedes mejorar esto con un modal de Bootstrap
                } else {
                    alert('Error al añadir al carrito');
                }

            } catch (error) {
                alert('Error de conexión');
                console.error(error);
            }
        });
    });
});
