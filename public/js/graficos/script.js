$(document).ready(function() {

var cursoADS       = 0;
var cursoADM       = 0;
var cursoLOGISTICA = 0;
var sexoM          = 0;
var sexoF          = 0;
var sexoI          = 0;


 // Carregar Alunos e Montar os Gráficos
 $.ajax({
    url: '/Aluno',
    type: 'GET',
    success: function(response) {
    $aluno = response;
    console.log(response);

    var faixaEtaria    = [];
    var nomesAlunos    = [];
    
    $.each(response, function(chave, valor) {
        faixaEtaria.push(valor.idade);
        nomesAlunos.push(valor.nome);
    });

    
    $aluno.forEach(function(aluno) {

        if(aluno.curso_nome == "ADS"){
            cursoADS+=1;
        }
        if(aluno.curso_nome == "ADM"){
            cursoADM+=1;
        }
        if(aluno.curso_nome == "LOGISTICA"){
            cursoLOGISTICA+=1;
        }

        if(aluno.sexo == "F"){
            sexoF+=1;
        }
        if(aluno.sexo == "M"){
            sexoM+=1;
        }
        if(aluno.sexo == "INDEFINIDO"){
            sexoI+=1;
        }

       
    });

    console.log(faixaEtaria);
    
    // Alunos por Curso
    var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['ADS', 'ADM', 'LOGISTICA'],
                datasets: [{
                    label: 'Alunos',
                    data: [cursoADS, cursoADM, cursoLOGISTICA],
                    backgroundColor: [
                        'rgba(54, 162, 235, 1)',                    
                        'rgba(153, 102, 255, 1)',
                        'rgb(255, 205, 86)'
                        
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',                    
                        'rgba(153, 102, 255, 1)',
                        'rgb(255, 205, 86)'
                    ],
                    borderWidth: 1
                }]
            },
    });

    // Alunos por Sexo
    var ctxChart = document.getElementById('sexo').getContext('2d');
        var sexo    = new Chart(ctxChart, {
            type: 'doughnut',
            data: {
                labels: ['MASCULINO', 'FEMININO', 'INDEFINIDO'],
                datasets: [{
                label: 'Sexo',
                data: [sexoM, sexoF, sexoI],
                backgroundColor: [
                'rgb(54, 162, 235)',
                'rgb(255, 99, 132)',
                'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
      }]
            }
    });

    var array = [3,6,9];

     // Faixa Etária dos Alunos 
     var faixaChart = document.getElementById('faixaEtaria').getContext('2d');
     var faixaEtaria    = new Chart(faixaChart, {
         type: 'line',
         data: {
             labels: nomesAlunos,
             datasets: [{
                label: 'Idade dos Aluno',
                data: faixaEtaria,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
              }]
         }
     });
        
  }

});


});


   
  
