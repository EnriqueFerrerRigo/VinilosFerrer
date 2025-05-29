document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.agregar-al-carrito').forEach(boton => {
        boton.addEventListener('click', async (e) => {
            e.preventDefault();

            const albumId = boton.dataset.id;
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
                    actualizarContadorCarrito(); // ✅ Solo si fue exitoso
                    alert(data.message);
                } else {
                    alert('Error al añadir al carrito');
                }

            } catch (error) {
                alert('Error de conexión');
                console.error(error);
            }
        });
    });

    function mostrarToast(mensaje, esError = false) {
        const toastElement = document.getElementById('toastCarrito');
        const toastBody = toastElement.querySelector('.toast-body');

        // Cambia estilo si es error
        toastElement.classList.remove('bg-success', 'bg-danger');
        toastElement.classList.add(esError ? 'bg-danger' : 'bg-success');

        toastBody.textContent = mensaje;

        const toast = new bootstrap.Toast(toastElement);
        toast.show();
        actualizarContadorCarrito();

    }

    async function actualizarContadorCarrito() {
        try {
            const respuesta = await fetch('/carrito/contador');
            const data = await respuesta.json();
            const contador = document.getElementById('contador-carrito');
            contador.textContent = data.total || 0;
        } catch (error) {
            console.error('Error al obtener el contador del carrito:', error);
        }
    }

});
