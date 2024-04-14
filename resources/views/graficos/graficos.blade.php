@extends('layouts.header')

<!-- Page content -->
@section('content') 

<div class="content">

<div class="container-fluid">

    <h2 class="text-center mb-5">Gráficos</h2>
    <hr>

      <div class="row">
          <div class="col-sm-5 offset-md-1">
          <h4 class="text-center mt-2 mb-2"> Alunos por curso </h4><br>
          <canvas id="myChart"></canvas>
          </div>

          <div class="col-sm-5">
          <h4 class="text-center mt-2 mb-2"> Alunos por Sexo </h4><br>
          <canvas class="divGrafico" id="sexo"></canvas>
          </div>  
      </div>

      <div class="row mt-5">
          <div class="col-sm-6 offset-md-3">
          <h4 class="text-center mt-2 mb-2"> Faixa Etárias dos Alunos </h4><br>
          <canvas id="faixaEtaria"></canvas>
          </div>
      </div>

</div>

</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
<script src="{{ asset('js/graficos/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  


@endsection





