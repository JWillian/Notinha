$(document).ready(function() {
    
  
    // Função pra mostar o curso pelo id
    $(document).on('click', '#ver', function() {
      var data = $(this).data();
      var curso_id = data.id;

        $.ajax({
          url: '/cursos/show',
          type: 'GET',
          success: function(response) {
          var curso  = response;

            curso.forEach(function(elemento, i) {

            if(elemento.id == curso_id){
            
            var nomecurso              = elemento.nome;
            var periodo                = elemento.periodo;
            var professor              = elemento.professor_nome;
        
            let El_nome        = document.getElementById("nomeCurso");
            let El_periodo     = document.getElementById("emailCurso");
            let El_professor   = document.getElementById("nomeProfessor");
            
            El_nome.innerHTML          =`Curso - ${nomecurso}`;
            El_periodo.innerHTML       =`Periodo: ${periodo}`;
            El_professor.innerHTML     =`Professor(a): ${professor}`;
          

            }

        })

      
          var modal = document.getElementById('myModal');
          var spanCloseModal = document.getElementsByClassName("close")[0];
          var btnCloseModal = document.getElementById("closeModalBtn");
          $('#myModal').modal('show');

          spanCloseModal.onclick = function() {
              $('#myModal').modal('hide'); 
          }

          btnCloseModal.onclick = function() {
              $('#myModal').modal('hide'); 
          }

          // Quando o usuário clicar fora da modal, fecha a modal
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }

      }

        });

    }); 
       
     // Carregar Cursos na página
     $.ajax({
        url: '/cursos/show',
        type: 'GET',
        success: function(response) {
        $curso = response;

        const exibir = document.querySelector("#exibir");

         $curso.forEach(function(cartao) {

          const dataAtual = new Date(cartao.updated_at);
          const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit' };
          const dataPadraoBr = dataAtual.toLocaleString('pt-BR', { timeZone: 'America/Sao_Paulo', ...options });
         
          var card = `  <div>                                                                                    
                        <div class="row">                                                          
                        <div class="col">                                                                                          
                        <div id="escopoCard">                                                                                   
                        <img src="https://picsum.photos/id/${cartao.id}/400/300" class="card-img-top" alt="Card ${cartao.id}">
                        <div class="card-body">                                                                                    
                        <h5 class="card-title"> ${cartao.nome} </h5>
                        <hr class="linhaCard">
                        <p class="card-text">   ${cartao.periodo} </p>
                        <p class="card-text">   <strong>Professor:</strong>  ${cartao.professor_nome} </p>
                        </div> 
                        <div class="d-flex justify-content-center align-items-center h-100">
                        <button type="button" class="btn btn-primary mb-3" id="ver" data-id="${cartao.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        </button>
                        <button type="button" class="btn btn-warning mb-3" style="margin-left: 4px;" id="editar" data-id="${cartao.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button type="button" class="btn btn-danger mb-3" style="margin-left: 4px;" id="deletar" data-id="${cartao.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                        </svg>
                        </button>
                        </div>                                                                                              
                        <div class="card-footer">                                                                                   
                        <small class="text-muted">Ultima Atualização ${dataPadraoBr}</small>                                 
                        </div>  
                        </div>   
                        </div>   
                        </div>   
                        </div>`;

          exibir.innerHTML += `${card}`;
        });
      } 
     });
    
     // pesquisar Cursos
     $( "#btnPesquisar" ).on( "click", function(e) {
      
      var termoPesquisa = $('#termo_pesquisa').val();
      const exibir = document.querySelector("#exibir");
      exibir.innerHTML = '';

      $.ajax({     
          url: '/cursos/pesquisar',
          type: 'GET',
          data: { termo_pesquisa: termoPesquisa },
          success: function(response) {
             $curso = response;
             console.log($curso);

             $curso.forEach(function(cartao) {
    
              const dataAtual = new Date(cartao.updated_at);
              const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', second: '2-digit' };
              const dataPadraoBr = dataAtual.toLocaleString('pt-BR', { timeZone: 'America/Sao_Paulo', ...options });
            
              var card = `  <div>                                                                                    
              <div class="row">                                                          
              <div class="col">                                                                                          
              <div id="escopoCard">                                                                                   
              <img src="https://picsum.photos/id/${cartao.id}/400/300" class="card-img-top" alt="Card ${cartao.id}">
              <div class="card-body">                                                                                    
              <h5 class="card-title"> ${cartao.nome} </h5>
              <hr class="linhaCard">
              <p class="card-text">   ${cartao.periodo} </p>
              <p class="card-text">   <strong>Professor:</strong>  ${cartao.professor_nome} </p>
              </div> 
              <div class="d-flex justify-content-center align-items-center h-100">
              <button type="button" class="btn btn-primary mb-3" id="ver" data-id="${cartao.id}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
              </button>
              <button type="button" class="btn btn-warning mb-3" style="margin-left: 4px;" id="editar" data-id="${cartao.id}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
              <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
              </svg></button>
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <button type="button" class="btn btn-danger mb-3" style="margin-left: 4px;" id="deletar" data-id="${cartao.id}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
              </svg>
              </button>
              </div>                                                                                              
              <div class="card-footer">                                                                                   
              <small class="text-muted">Ultima Atualização ${dataPadraoBr}</small>                                 
              </div>  
              </div>   
              </div>   
              </div>   
              </div>`;

              exibir.innerHTML += `${card}`;
            });


          },
          error: function(error) {
              console.log(error);
          }
      });
      
     });
    
      // Cadastrar Cursos
      $('#cadastro').submit(function(e) {
          e.preventDefault();

            var nome          = $('#nome').val();
            var periodo       = $('#periodo').val();
            var Professor_id  = $('#nome').val();
        
          if(nome == ''){
            $('#nome').focus();
            toastr.warning('O campo nome é obrigatório!', 'Aviso');
            return;
          }

          if(periodo == ''){
            $('#periodo').focus();
            toastr.warning('O campo periodo é obrigatório!', 'Aviso');
            return;
          }

          if(Professor_id == ''){
            $('#Professor_id').focus();
            toastr.warning('O campo professor é obrigatório!', 'Aviso');
            return;
          }
    
          $.ajax({
              url: '/cursos',
              type: 'POST',
              data: $(this).serialize(),
              success: function(response) {
                    console.log(response)
              
                  // Manipular a resposta, por exemplo, exibir uma mensagem de sucesso
                  toastr.success('Curso salvo com sucesso!', 'Sucesso');
                  setTimeout(function () {
                      location.reload();
                  }, 2000); // Recarregar após 2 segundos (ajuste conforme necessário)
              },
              error: function (response) {
                  console.log('Erro:', response);
                  toastr.error('Erro ao salvar o Curso!', 'Erro');
              },
          });
      });
      
       // Função pra Editar o Curso
      $(document).on('click', '#editar', function() {
      var data = $(this).data();
      var id   = data.id;
   
        $.ajax({
          url: 'cursos/edit/'+id,
          type: 'GET',
          success: function(response) {
            
            
            var curso = response[0];
            var idProfessor = response[0].professor_id;
            console.log(curso);

            let nomeCurso            = document.getElementById("nomeCursoUpdate");

            nomeCurso.innerHTML      =`${curso.nome} - Professor(a)`;
            $("#btnUpdate").val(curso.id);
            $("#nomeCursoEditar").val(curso.nome);
            $("#periodoCursoEditar").val(curso.periodo);
            $("#professorCursoEditar").val(idProfessor);
            
        },
        error: function (response) {
            console.log('Erro:', response);
            toastr.error('Erro ao trazer as informações!', 'Erro');
        },
          
        });
      
        var modal = document.getElementById('modalUpdate');
        var spanCloseModal = document.getElementsByClassName("closeUpdate")[0];
        var btnCloseModal = document.getElementById("closeModalBtnUpdate");
        $('#modalUpdate').modal('show');
  
        spanCloseModal.onclick = function() {
            $('#modalUpdate').modal('hide'); 
        }
  
        btnCloseModal.onclick = function() {
            $('#modalUpdate').modal('hide'); 
        }
  
        // Quando o usuário clicar fora da modal, fecha a modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
      
      });

       // Função pra atualizar o Curso
      $('#update').submit(function(e){
        e.preventDefault();
        var id = $('#btnUpdate').val();

        data ={
            'nome':             $("#nomeCursoEditar").val(),
            'periodo':          $("#periodoCursoEditar").val(),
            'professor_id':     $("#professorCursoEditar").val()
        }

        $.ajax({
            url: '/cursos/update/'+id,
            type: 'PUT',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            success: function(response){
              console.log(response)
              toastr.success('Professor Atualizado com sucesso!', 'Sucesso');
              setTimeout(function () {
                location.reload();
            }, 1000); // Recarregar após 1 segundos (ajuste conforme necessário)
        
            },
            error: function(xhr, status, error){
                console.log('Erro:', response);
                toastr.error('Erro ao trazer as informações!', 'Erro');
            }
        });
      });

       // Função pra Deletar o Curso
      $(document).on('click', '#deletar', function() {
        var data = $(this).data();
        var id = data.id;

        if (confirm('Tem certeza que deseja excluir o Curso?')) {
          $.ajax({
            url: '/cursos/'+id,
            type: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
              console.log('SUCCESS')
              toastr.success('Curso deletado com sucesso!', 'Sucesso');
              setTimeout(function () {
                  location.reload();
              }, 2000); // Recarregar após 2 segundos (ajuste conforme necessário)
          },
          error: function (response) {
              console.log('Erro:', response);
              toastr.error('Erro ao deletar o Curso!', 'Erro');
          },
            
          });
        }
      });

  });