<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Diogo Franco') }}</title>

        @laravelPWA

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/site.css', 'resources/js/site.js'])
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-EW0YW4567T"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-EW0YW4567T');
        </script>
    </head>
    <body id="page-top">
        @component('components.site.navbar')

        @endcomponent
        <main class="container">
                @yield('content')
        </main>
        <div class="container">
            <footer class="py-5 ">
              <div class="row ">
                <div class="col-4 col-md-2 mb-3">
                  <h5><b>Páginas</b></h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">PHP</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">LINUX</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">ARDUINO</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">CSS</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">JS</a></li>
                  </ul>
                </div>

                <div class="col-4 col-md-2 mb-3">
                  <h5><b>Projetos</b></h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">MAP</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">CATRACA</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">VENDAS</a></li>
                  </ul>
                </div>

                <div class="col-4 col-md-2 mb-3">
                  <h5><b>Útil</b></h5>
                  <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('/login') }}" class="nav-link p-0 text-body-secondary">Admin</a></li>
                    <li class="nav-item mb-2"><a href="https://github.com/diogofrancodev" target="_blank" class="nav-link p-0 text-body-secondary">GitHub</a></li>
                  </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                  <form>
                    <h5>Notícias DF</h5>
                    <p>Inscreva-se no DF Newsletter e nunca perca nenhuma notícia do diogofranco.com.br</p>
                    <div class="d-flex flex-column  w-100 gap-2">
                      <label for="newsletter1" class="visually-hidden">Email address</label>
                      <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                      <button type="button" class="btn btn-dark">Junte-se</button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>© 2024 diogofranco.com.br</p>
                <ul class="list-unstyled d-flex">
                  <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
                  <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
                  <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
                </ul>
              </div>
            </footer>
          </div>
    </body>
</html>
