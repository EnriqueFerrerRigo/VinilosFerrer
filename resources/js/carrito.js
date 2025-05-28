
document.addEventListener('DOMContentLoaded', () => {
    let productos = [
        { id: 1, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 2, imagen: 'velvet-dreams-vinyl.png' },
        { id: 2, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 1, imagen: 'velvet-dreams-vinyl.png' },
        { id: 3, artista: 'Nova Rivers', album: 'Velvet Dreams', precio: 15.00, cantidad: 3, imagen: 'velvet-dreams-vinyl.png' },
    ];

    const renderCarrito = () => {
        const contenedor = document.getElementById('cart-list');
        contenedor.innerHTML = '';
        let total = 0;
        let totalArticulos = 0;

        productos.forEach((producto, index) => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;
            totalArticulos += producto.cantidad;

            const fila = document.createElement('div');
            fila.className = 'row py-4 align-items-center border-bottom';
            fila.innerHTML = `
                <div class="col-md-2 text-center">
                    <img src="/images/albums/${producto.imagen}" alt="${producto.album}" class="img-fluid" style="max-height: 100px;">
                    <a href="#" class="d-block mt-2 text-danger small eliminar" data-id="${producto.id}">Eliminar</a>
                </div>
                <div class="col-md-7">
                    <h5 class="fw-bold mb-1">${producto.artista}</h5>
                    <p class="text-muted mb-2">${producto.album}</p>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-outline-dark btn-sm restar" data-id="${producto.id}">-</button>
                        <span class="px-2">${producto.cantidad}</span>
                        <button class="btn btn-outline-dark btn-sm sumar" data-id="${producto.id}">+</button>
                        <span class="ms-3"><i class="bi bi-trash"></i> ${producto.precio.toFixed(2)}€</span>
                    </div>
                </div>
                <div class="col-md-3 text-end">
                    <span class="fs-5 fw-bold">${subtotal.toFixed(2)}€</span>
                </div>
            `;
            contenedor.appendChild(fila);
        });

        document.getElementById('carrito-total-precio').textContent = total.toFixed(2) + '€';
        document.getElementById('carrito-total-articulos').textContent = totalArticulos;

        // Botones dinámicos
        document.querySelectorAll('.sumar').forEach(btn =>
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const producto = productos.find(p => p.id === id);
                if (producto) producto.cantidad++;
                renderCarrito();
            })
        );

        document.querySelectorAll('.restar').forEach(btn =>
            btn.addEventListener('click', () => {
                const id = parseInt(btn.getAttribute('data-id'));
                const producto = productos.find(p => p.id === id);
                if (producto && producto.cantidad > 1) {
                    producto.cantidad--;
                    renderCarrito();
                }
            })
        );

        document.querySelectorAll('.eliminar').forEach(btn =>
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const id = parseInt(btn.getAttribute('data-id'));
                productos = productos.filter(p => p.id !== id);
                renderCarrito();
            })
        );
    };

    renderCarrito();
});
