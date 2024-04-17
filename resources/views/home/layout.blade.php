@extends('layouts.header')

<!-- Page content -->
@section('content')


<div class="content">
<br><br>
<div class="container" id="divFormulario">
        <div class="text-center mt-5">
        <img src="{{URL::asset('/img/logo2.jpeg')}}" alt="profile Pic" height="200" width="200" id="logo">
        </div>
        <h1 class="my-4 text-center">Adicione um novo Aluno</h1>
        <form method="POST" id="cadastro" class="mb-5">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control"  required>
                @if ($errors->has('nome'))
                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control"  required>
                @if ($errors->has('endereco'))
                    <span class="text-danger">{{ $errors->first('endereco') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control"  required>
                @if ($errors->has('telefone'))
                    <span class="text-danger">{{ $errors->first('telefone') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" name="idade" id="idade" class="form-control"  required>
                @if ($errors->has('idade'))
                    <span class="text-danger">{{ $errors->first('idade') }}</span>
                @endif
            </div>

            <div class="form-group">
              <label for="sexo">Sexo</label>
              <select name="sexo" id="sexo" class="form-control" required>
              <option value="F">Feminino</option>
              <option value="M">Masculino</option>
              <option value="INDEFINIDO">INDEFINIDO</option>
              @if ($errors->has('sexo'))
                    <span class="text-danger">{{ $errors->first('sexo') }}</span>
                @endif
              </select>
            </div>
            
            <div class="form-group">
              <label for="curso_id">Curso</label>
              <select name="curso_id" id="curso_id" class="form-control" required>
              @foreach($dadosCurso as $curso => $descricao)
                    <option value="{{ $descricao }}">{{ $curso }}</option>
                @endforeach
              @if ($errors->has('curso_id'))
                    <span class="text-danger">{{ $errors->first('curso_id') }}</span>
                @endif
              </select>
            </div>
            <br>

            <div class="form-group" style="display: none;">
                <input type="number" name="user_id" id="user_id" value="{{$user_id}}" class="form-control"  required>
                @if ($errors->has('user_id'))
                    <span class="text-danger">{{ $errors->first('user_id') }}</span>
                @endif
            </div>
            
        <button type="submit" class="btn btn-success float-right">Cadastrar</button>
        <br>
        </form>

    </div>

    <div class="container mt-5" id="divLista">
    <h2 class="my-4">Alunos</h2>
        <hr class="linhaForm">
        <div id="exibir" class="divCards">
        </div>
    </div>    
      

    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="nomeAluno"></h2>
        <hr class="linha-cinza">
        <p class="cardProfessor letraModal" id="emailAluno"></p>
        <p class="cardProfessor letraModal" id="sexoAluno"></p>
        <p class="cardProfessor letraModal" id="idadeAluno"></p>
        <p class="cardProfessor letraModal" id="telefoneAluno"></p>
        <p class="cardProfessor letraModal" id="professorAluno"></p>
        <p class="cardProfessor letraModal" id="cursoAluno"></p><br>
        <p class="cardProfessor letraModal" style=" text-align: right;" id="enderecoAluno"></p>
        <hr class="linha-cinza">
        <button id="closeModalBtn">Fechar</button>
      </div>
    </div>

    <div id="modalUpdate" class="modal">
  <div class="modal-content">
    <span class="closeUpdate">&times;</span>
    <h2 id="nomeAlunoUpdate"></h2>
    <hr class="linha-cinza">
    <form method="POST" id="update" class="mb-5">
    @csrf
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nomeAlunoEditar">Nome</label>
                <input type="text" class="form-control" name="nomeAlunoEditar" id="nomeAlunoEditar"  placeholder="Julius" >
              </div>
              <div class="form-group col-md-6">
                <label for="emailAlunoEditar">Email</label>
                <input type="email" class="form-control" name="emailAlunoEditar" id="emailAlunoEditar" placeholder="Julius@gmail.com">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group  col-md-6">
                <label for="enderecoAlunoEditar">Endereço</label>
                <input type="text" class="form-control" name="enderecoAlunoEditar" id="enderecoAlunoEditar" value="" placeholder="1234 rua alvez">
              </div>
              <div class="form-group col-md-6">
                  <label for="idadeAlunoEditar">Idade</label>
                  <input type="number" class="form-control" name="idadeAlunoEditar" id="idadeAlunoEditar" placeholder="18">
              </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputState">Curso</label>
                <select id="cursoAlunoEditar" name="cursoAlunoEditar" class="form-control">
                @foreach($dadosCurso as $curso => $descricao)
                    <option value="{{ $descricao }}">{{ $curso }}</option>
                @endforeach
                </select>
              </div>  
              <div class="form-group col-md-6">
                <label for="inputState">Sexo</label>
                <select id="sexoAlunoEditar" name="sexoAlunoEditar" class="form-control">
                  <option value="F">Feminino</option>
                  <option value="M">Masculino</option>
                  <option value="INDEFINIDO">Indefinido</option>
                </select>
              </div>  
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="telefoneAlunoEditar">Telefone</label>
                <input type="text" class="form-control" name="telefoneAlunoEditar" id="telefoneAlunoEditar" placeholder="12 99999-9999">
              </div>
            </div>
          
            <button type="submit" id="btnUpdate" class="btn btn-success float-right mt-3">Salvar</button>
    </form>
    <hr class="linha-cinza">
    <button id="closeModalBtnUpdate">Fechar</button>
  </div>
</div>

  </div>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script src="{{ asset('js/home/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

@endsection


