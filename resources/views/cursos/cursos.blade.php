
@extends('layouts.header')

<!-- Page content -->
@section('content') 

<div class="content">

<label for="mensagem" id="mensagem"></label>    

<br><br>

<div class="container">
  <div id="divFormulario">
        <div class="logoFormulario">
        <img src="img/logo2.jpeg" alt="profile Pic" height="200" width="200" id="logo">
        </div>
        <h1 class="my-4 text-center">Adicione um novo Curso</h1>
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
                <label for="periodo">Periodo</label>
                <input type="text" name="periodo" id="periodo" class="form-control" value="{{ old('periodo') }}">
                @if ($errors->has('periodo'))
                    <span class="text-danger">{{ $errors->first('periodo') }}</span>
                @endif
            </div>

            <div class="form-group">
              <label for="professor_id">Professor</label>
              <select name="professor_id" id="professor_id" class="form-control">
              @foreach($dadosProfessor as $professor => $descricao)
                    <option value="{{ $descricao }}">{{ $professor }}</option>
                @endforeach
              @if ($errors->has('professor_id'))
                    <span class="text-danger">{{ $errors->first('professor_id') }}</span>
                @endif
              </select>
            </div>
            
           
            <button type="submit" class="btn btn-success float-right mt-5">Cadastrar</button>
            <br><br><br>
            
        </form>
        </div>

        <div id="divLista">

        <h2 class="my-4"> 
          Cursos
          <div class="float-right mr-4">
            <div class="form-inline my-2 my-lg-0"> 
              <input  class="form-control mr-sm-2 " type="text" id="termo_pesquisa" placeholder="Digite o nome do curso">
              <button class="btn btn-outline-success my-2 my-sm-0" id="btnPesquisar">Pesquisar</button>
            </div>
        </div>
        </h2>

        <hr class="linhaForm">
        
        <div id="exibir" class="divCards">
        </div>

        </div>

    </div>
</div>


<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 id="nomeCurso"></h2>
    <hr class="linha-cinza">
    <p class="cardProfessor letraModal" id="emailCurso"></p>
    <p class="cardProfessor letraModal" id="nomeProfessor"></p>
    <hr class="linha-cinza">
    <button id="closeModalBtn">Fechar</button>
  </div>
</div>

<div id="modalUpdate" class="modal">
  <div class="modal-content">
    <span class="closeUpdate">&times;</span>
    <h2 id="nomeCursoUpdate"></h2>
    <hr class="linha-cinza">
    <form method="POST" id="update" class="mb-5">
    @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomeCursoEditar">Nome</label>
                <input type="text" class="form-control" name="nomeCursoEditar" id="nomeCursoEditar"  placeholder="ADS" >
              </div>
              <div class="form-group col-md-6">
                <label for="periodoCursoEditar">Periodo</label>
                <input type="text" class="form-control" name="periodoCursoEditar" id="periodoCursoEditar" placeholder="NOITE">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="professorCursoEditar">Professor</label>
                <select id="professorCursoEditar"  name="professorCursoEditar"  class="form-control"  >
                @foreach($dadosProfessor as $professor => $nomeProfessor)
                    <option value="{{ $nomeProfessor }}">{{ $professor }}</option>
                @endforeach
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
<script src="js/cursos/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

@endsection