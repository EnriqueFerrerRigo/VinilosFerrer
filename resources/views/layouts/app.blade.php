<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vinilos Ferrer - @yield('title')</title>
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
          <li class="nav-item"><a href="{{ url('/carrito') }}" class="nav-link">Carrito</a></li>
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

  <main class="container">
    @yield('content')
  </main>

  <footer class="bg-light py-3 mt-5 text-center">
    <small>&copy; 2025 Vinilos Ferrer. Todos los derechos reservados.</small>
  </footer>

  @yield('scripts')
</body>
</html>
