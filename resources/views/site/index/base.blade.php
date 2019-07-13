<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <style>
    html
    {
        height: 100%;
        min-height: 100%;
    }

    body 
    {
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

    footer 
    {
        margin-top: auto;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @yield('head')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>JuLab</title>
</head>
<body>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-NavBar-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
          <a class="py-2" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mx-auto"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
          </a>
          <a class="py-2 d-none d-md-inline-block" href="#">Cliente</a>
          <a class="py-2 d-none d-md-inline-block" href="/admin">Sou Prestador</a>
          <a class="py-2 d-none d-md-inline-block" href="#">Sobre</a>
      
        </div>
      </nav>
<!-- -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-NavBar-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- -->

@yield('central')


      <footer class="container py-5 rodape">
        <div class="row">
          <div class="col-12 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="d-block mb-2"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>
            <small class="d-block mb-3 text-muted">&copy; 2019</small>
          </div>
          <div class="col-6 col-md">
            <h5>Suporte</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="https://www.facebook.com/denis.dosreissantos">Facebook</a></li>
              <li><a class="text-muted" href="https://www.linkedin.com/in/denis-dos-reis-santos-1287b7113/">Linkedin</a></li>
              <li><a class="text-muted" href="#">denis380@gmail.com</a></li>
              <li><a class="text-muted" href="#">(31) 97303-7490</a></li>

            </ul>
          </div>
          
          <div class="col-6 col-md">
            <h5>Parceiros</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Apoiador 1</a></li>
              <li><a class="text-muted" href="#">Apoiador 2</a></li>
              <li><a class="text-muted" href="#">Apoiador 3</a></li>
              <li><a class="text-muted" href="#">Apoiador 4</a></li>
            </ul>
          </div>
        </div>
      </footer>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  @yield('js')
</body>
</html>