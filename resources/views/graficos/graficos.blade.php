@extends('layouts.header')


@section('content')

  <!-- The sidebar -->
  <div class="sidebar">
    <a href="/home">Home</a>
    <a href="{{ url('professores') }}">Professores</a>
    <a href="{{ url('cursos') }}">Cursos</a>
    <a href="{{ url('graficos') }}"  class="active">Gráficos</a>
    <a href="#about">Usuários</a>
  </div>
<!-- Page content -->
<div class="content">

  <label for="mensagem" id="mensagem"></label>    
  <br><br>

    <h2 class="text-center mb-5">Gráficos</h2>
    <hr>

      <div class="row">
          <div class="col-sm-5 offset-md-1">
          <h4 class="text-center mt-2 mb-2"> Alunos por curso </h4><br>
          <canvas id="myChart"></canvas>
          </div>

          <div class="col-sm-5">
          <h4 class="text-center mt-2 mb-2"> Sexo dos alunos </h4><br>
          <canvas class="divGrafico" id="sexo"></canvas>
          </div>  
      </div>

</div>

<footer class="footer">
    <div class="text-right">
        <span class="corTextoFooter">&copy; {{ date('Y') }} Notinha - 
        <a class="corTextoFooter" href="https://www.linkedin.com/in/jonatas-willian-059923b7/" target="Isaac"> 
            <i class="fab fa-linkedin"></i>
            LinkedIn: Isaac
        </a>
        </span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script src="{{ asset('js/graficos/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  


@endsection



