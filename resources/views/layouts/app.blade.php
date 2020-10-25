<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>



    {{-- start of menu --}}


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @auth
          
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('admin/stores')) active @endif ">
              <a class="nav-link" href={{ route('admin.stores.index') }}>Lojas <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item @if(request()->is('admin/products')) active @endif ">
              <a class="nav-link" href="{{ route('admin.products.index') }}">Produtos</a>
            </li>

            <li class="nav-item @if(request()->is('admin/categories')) active @endif ">
              <a class="nav-link" href="{{ route('admin.categories.index') }}">Categorias</a>
            </li>
        
        
          </ul>
          <div class="my-2 my-lg-0">
            
            <ul class="navbar-nav mr-auto">

            
              <li class="nav-item">
                <a class="nav-link" href="#" onclick=" event.preventDefault(); document.querySelector('form.logout').submit(); ">Sair</a>
                <form action="{{ route('logout') }}" class="logout" method="POST">
                  @csrf

                </form>
              </li>

              <li class="nav-item">
                <span class="nav-link">Seja bem vindo(a) {{ auth()->user()->name }}</span>
              </li>
            </ul>

          </div>
        </div>

      @endauth
      
    </nav>


    {{-- end of menu  --}}



    <div class="container mt-4">

        {{-- content of app --}}
        @yield('content')




    </div>

  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>