<script src="/js/buscador.js"></script>
<header id="header">
  <nav class="menuHeader">
    <div class="logo">
      <div class="logoImg">
        <a href="/">
          <img src="/img/logo.png" alt="Logo">
        </a>
      </div>

      <div class="buscador">
        <form action="/search" method="get">
          <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">

            <div class="input-group">
              <input type="text" placeholder="¿Que producto buscas?" id="texto" class="form-control border-0 bg-light" name= "busqueda">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>

          <div id="resultados"></div>
        </form>
      </div>

      <a id="btn-menu" class="iconoContenedor" href="#">
        <i class="icono fas fa-bars"></i>
      </a>
    </div>


     <div class="enlaces" id="enlaces">


      <!-- <a href="#"><i class="fas fa-fire"></i> Productos</a> -->
      <!-- Example split danger button -->
      <div class="btn-group">
        <a href="/"><i class="fas fa-circle"></i> Productos</a>
        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"  aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/categorias"><i class="fas fa-shapes"></i> Categorias</a>
          <a class="dropdown-item" href="/marcas"><i class="far fa-copyright"></i> Marcas</a>
        </div>
      </div>
      <a href="/faq"><i class="far fa-question-circle"></i> F.A.Q</a>
      @guest
      <a href="/login"><i class="fas fa-user"></i> Ingresar</a>
      <a href="/register"><i class="fas fa-user-plus"></i> Registrarse</a>
      @endguest
      @if (Auth::user())
        <div class="btn-group">
          <div class="perfil">
            <img src=@if(Auth::user()->avatar) '/storage/{{Auth::user()->avatar}}' @else '/img/default.png' @endif" alt="Foto de {{Auth::user()->name}}">
          </div>
          <a href="/perfil">{{ Auth::user()->name }} {{ Auth::user()->apellido }}</a>
          <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"  aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <form class="" action="/logout" method="post">
              @csrf
              <button class="dropdown-item logout" type="submit" name="button">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
              </button>
            </form>
          </div>
        </div>
      @endif
        @if (Auth::user())
      <a class="carrito" href="/carrito"><i class="fas fa-shopping-cart"></i></a>
        @else
        <a class="carrito" href="/login"><i class="fas fa-shopping-cart"></i></a>
        @endif
    </div>
  </nav>
</header>
