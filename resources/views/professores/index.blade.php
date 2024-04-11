

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notinha</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">
  <img src="img/logo2.jpeg" alt="profile Pic" height="75" width="75" id="logo">  
 Notinha</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Configurações</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ajuda</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

<!-- The sidebar -->
<div class="sidebar">
  <a  href="{{ url('/home') }}">Home</a>
  <a class="active" href="{{ url('professores') }}">Professores</a>
  <a href="{{ url('/home') }}">Alunos</a>
  <a href="{{ url('cursos') }}">Cursos</a>
  <a href="{{ url('graficos') }}">Gráficos</a>
  <a href="#about">Usuários</a>
</div>

<!-- Page content -->
<div class="content">
@yield('content')

<label for="mensagem" id="mensagem"></label>    

<br><br>

<div class="container">
        <div class="text-center">
        <img src="img/logo2.jpeg" alt="profile Pic" height="200" width="200" id="logo">
        </div>
        <h1 class="my-4 text-center">Adicione um novo Professor</h1>
        <form method="POST" id="cadastro" class="mb-5">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control">
                @if ($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control">
                @if ($errors->has('endereco'))
                    <span class="text-danger">{{ $errors->first('endereco') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control">
                @if ($errors->has('telefone'))
                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" name="idade" id="idade" class="form-control">
                @if ($errors->has('idade'))
                    <span class="text-danger">{{ $errors->first('idade') }}</span>
                @endif
            </div>

            <div class="form-group">
              <label for="sexo">Sexo</label>
              <select name="sexo" id="sexo" class="form-control">
              <option value="F">Feminino</option>
              <option value="M">Masculino</option>
              <option value="INDEFINIDO">Indefinido</option>
              @if ($errors->has('sexo'))
                    <span class="text-danger">{{ $errors->first('sexo') }}</span>
                @endif
              </select>
            </div>
            
            <br>
            
        <button type="submit" class="btn btn-success float-right mb-5">Cadastrar</button>
        </form>

        <h5>Professores</h5>
        <hr class="linhaForm">
        
        <div id="exibir" class="divCards">
        </div>

    </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 id="nomeProfessor"></h2>
    <hr class="linha-cinza">
    <p class="cardProfessor letraModal" id="emailProfessor"></p>
    <p class="cardProfessor letraModal" id="sexoProfessor"></p>
    <p class="cardProfessor letraModal" id="idadeProfessor"></p>
    <p class="cardProfessor letraModal" id="telefoneProfessor"></p><br>
    <p class="cardProfessor letraModal" style=" text-align: right;" id="enderecoProfessor"></p>
    <hr class="linha-cinza">
    <button id="closeModalBtn">Fechar</button>
  </div>
</div>

<div id="modalUpdate" class="modal">
  <div class="modal-content">
    <span class="closeUpdate">&times;</span>
    <h2 id="nomeProfessorUpdate"></h2>
    <hr class="linha-cinza">
    <form method="POST" id="update" class="mb-5">
    @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomeProfessorEditar">Nome</label>
                <input type="text" class="form-control" name="nomeProfessorEditar" id="nomeProfessorEditar"  placeholder="Julius" >
              </div>
              <div class="form-group col-md-6">
                <label for="emailProfessorEditar">Email</label>
                <input type="email" class="form-control" name="emailProfessorEditar" id="emailProfessorEditar" placeholder="Julius@gmail.com">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group  col-md-6">
                <label for="enderecoProfessorEditar">Endereço</label>
                <input type="text" class="form-control" name="enderecoProfessorEditar" id="enderecoProfessorEditar" value="" placeholder="1234 rua alvez">
              </div>
              <div class="form-group col-md-6">
                  <label for="idadeProfessorEditar">Idade</label>
                  <input type="number" class="form-control" name="idadeProfessorEditar" id="idadeProfessorEditar" placeholder="Idade 18">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="telefoneProfessorEditar">Telefone</label>
                <input type="text" class="form-control" name="telefoneProfessorEditar" id="telefoneProfessorEditar" placeholder="12 99999-9999">
              </div>
              <div class="form-group col-md-6">
                <label for="inputState">Sexo</label>
                <select id="sexoProfessorEditar" name="sexoProfessorEditar" class="form-control">
                  <option value="F">Feminino</option>
                  <option value="M">Masculino</option>
                  <option value="INDEFINIDO">Indefinido</option>
                </select>
              </div>  
            </div>
          
            <button type="submit" id="btnUpdate" class="btn btn-success float-right mt-3">Salvar</button>
    </form>
    <hr class="linha-cinza">
    <button id="closeModalBtnUpdate">Fechar</button>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script src="js/professores/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

</div>  
</body>
</html>
