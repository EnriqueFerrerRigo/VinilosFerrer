<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Vinilos Ferrer - @yield('title')</title>
  <!-- Bootstrap 5 CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
  <header class="bg-light py-3 mb-4">
    <nav class="container d-flex justify-content-between align-items-center">
      <a href="{{ url('/') }}" class="text-decoration-none text-dark fs-4 fw-bold">Vinilos Ferrer</a>
      <ul class="nav">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="{{ url('/generos') }}" class="nav-link">Géneros</a></li>
        <li class="nav-item"><a href="{{ url('/albumes') }}" class="nav-link">Álbumes</a></li>
        @guest
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a></li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Registrarse</a></li>
        @else
          <li class="nav-item">
            <a href="{{ url('/carrito') }}" class="nav-link position-relative">
              Carrito
              <span id="contador-carrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0
              </span>
            </a>
          </li>

          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-link nav-link">Cerrar sesión</button>
            </form>
          </li>
        @endguest
      </ul>
    </nav>
  </header>

  <main class="flex-grow-1">
    @yield('content')
  </main>

  <footer class="bg-light py-3 mt-5 text-center">
    <small>&copy; 2025 Vinilos Ferrer. Todos los derechos reservados.</small>
  </footer>

  @yield('scripts')
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="toastCarrito" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Álbum añadido al carrito correctamente.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
    </div>
  </div>
</div>

</body>
</html>
