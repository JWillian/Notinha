<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notinha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  
    <!-- Importar o Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div id="app">
     
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="{{URL::asset('img/logo2.jpeg')}}" alt="profile Pic" height="75" width="75" id="logo">  
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        @auth
                        <li class="nav-item active">
                            <a class="nav-link fontNavbar" href="/home">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fontNavbar" href="{{ url('professores') }}">Professores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fontNavbar" href="{{ url('/home') }}">Alunos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fontNavbar" href="{{ url('cursos') }}">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fontNavbar" href="{{ url('graficos') }}">Gráficos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fontNavbar" href="/dashboard">Configurações</a>
                        </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0"  action="/logout" method="POST">
                            @csrf
                        <button href="/logout" class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="fa-solid fa-right-from-bracket"></i>    
                        Sair</button>
                        </form>
                        @endauth
                        @guest
                            <li class="nav-item">
                            <a class="nav-link" href="/login">Logar</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="/register">Deslogar</a>
                            </li>
                        @endguest
                    
                    </div>
        </nav>


        <main class="">
            @yield('content')
        </main>

    </div>
  
    @extends('layouts.footer')

</body>
</html>