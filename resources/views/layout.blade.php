<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Notas Fiscais</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d440843c99.js" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
        <div class="container-fluid">
          <a class="navbar-brand" href=" {{ route('home_index') }} "> Home </a> 
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                    <a class='nav-link active' aria-current="page" href=" {{ route('listar_empresas') }} ">Empresas</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link active' aria-current="page" href=" {{ route ('listar_secretarias') }} ">Secretarias</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link active' aria-current="page" href=" {{ route('listar_contratos') }} ">Contratos</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link active' aria-current="page" href=" {{ route('listar_empenhos') }} ">Empenhos</a>
                </li>
                <li class="nav-item">
                    <a class='nav-link active' aria-current="page" href=" {{ route('listar_notas') }}">Notas Fiscais</a>
                </li>
                <li class="nav-item">
                    
                </li>
              </ul>

          </div>
            
          <div class="nav-item">
              <a class='nav-link active me-5' aria-current="page" href=" {{ route('listar_melhorias') }}">Melhorias</a>
          </div>

          <div>
            <a class="navbar-brand" href="{{ route('login_index') }}">Sair</a>
          </div>
              
        </div> 
    </nav>

    <div class="container">
        <div>
            <h1 align="center">@yield('cabecalho')</h1>
        </div>

        @yield('conteudo')
    </div>
</body>

</html>