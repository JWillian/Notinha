@extends('layouts.header')

<!-- Page content -->
@section('content') 

<div class="content">
<br><br>
<div class="container" id="divFormulario">
        <div class="text-center mt-5">
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
        <button type="submit" class="btn btn-success float-right btnCadastrar">Cadastrar</button>
        <br>  
      </form>

    </div>
</div>

<div class="container mt-5" id="divLista">
  <h2 class="my-4">Professores</h2>
  <hr class="linhaForm">
  <div id="exibir" class="divCards">
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

@endsection
