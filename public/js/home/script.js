$(document).ready(function() {
        
    // Função pra Mostar o Aluno pelo id
    $(document).on('click', '#ver', function() {
        var data = $(this).data();
        var aluno_id = data.id;

        $.ajax({
            url: '/Aluno',
            type: 'GET',
            success: function(response) {
            var aluno  = response;

            aluno.forEach(function(elemento, i) {

            if(elemento.id == aluno_id){
                
            var nomealuno              = elemento.nome;
            var endereco               = elemento.endereco;
            var email                  = elemento.email;
            var telefone               = elemento.telefone;
            var idade                  = elemento.idade;
            var sexo                   = elemento.sexo;
            var professor              = elemento.professor_nome;
            var curso                  = elemento.curso_nome;

            if(sexo == 'M'){
                sexo = 'MASCULINO';
            }if(sexo == 'F'){
                sexo = 'FEMININO';
            }

            let El_nome         = document.getElementById("nomeAluno");
            let El_endereco     = document.getElementById("enderecoAluno");
            let El_email        = document.getElementById("emailAluno");
            let El_telefone     = document.getElementById("telefoneAluno");
            let El_idade        = document.getElementById("idadeAluno");
            let El_sexo         = document.getElementById("sexoAluno");
            let El_professor    = document.getElementById("professorAluno");
            let El_curso        = document.getElementById("cursoAluno");

            El_nome.innerHTML           =`Aluno(a) - ${nomealuno}`;
            El_endereco.innerHTML       =`<b>Endereco:</b> ${endereco}`;
            El_email.innerHTML          =`Email: ${email}`;
            El_telefone.innerHTML       =`Telefone: ${telefone}`;
            El_idade.innerHTML          =`Idade: ${idade}`;
            El_sexo.innerHTML           =`Sexo: ${sexo}`;
            El_professor.innerHTML      =`Professor(a): ${professor}`;
            El_curso.innerHTML          =`Curso: ${curso}`;
            

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

    // Carregar Alunos
    $.ajax({
        url: '/Aluno',
        type: 'GET',
        success: function(response) {
        $aluno = response;
        console.log(response);

        const exibir = document.querySelector("#exibir");

        $aluno.forEach(function(cartao) {

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
                        <p class="card-text">   ${cartao.email} </p>
                        <p class="card-text">   <strong>Curso:</strong>  ${cartao.curso_nome} </p>
                        <p class="card-text">   <strong>Professor:</strong>  ${cartao.professor_nome} </p>
                        </div> 
                        <div class="d-flex justify-content-center align-items-center h-100">
                        <button type="button" class="btn btn-primary mb-3" id="ver" data-id="${cartao.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                        </button>
                        <button type="button" class="btn btn-warning mb-3" style="margin-left: 4px;" id="editar"  data-id="${cartao.id}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <button type="button" class="btn btn-danger mb-3" style="margin-left: 4px;" id="deletar"  data-id="${cartao.id}">
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

    // Cadastrar Alunos
    $('#cadastro').submit(function(e) {
        e.preventDefault();
        
        var dadosFormulario = $('#cadastro').serialize();
        console.log(dadosFormulario);
        $.ajax({
            url: '/Aluno',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
            
                // Manipular a resposta, por exemplo, exibir uma mensagem de sucesso
                toastr.success('Aluno salvo com sucesso!', 'Sucesso');
                setTimeout(function () {
                    location.reload();
                }, 2000); // Recarregar após 2 segundos (ajuste conforme necessário)
            },
            error: function (response) {
                console.log('Erro:', response);
                $('#mensagem').html('<div class="alert alert-danger">Erro ao salvar os dados!</div>');
                toastr.error('Erro ao salvar o Aluno!', 'Erro');
            },
        });
    });


    // Função pra Editar o Aluno
    $(document).on('click', '#editar', function() {
        var data = $(this).data();
        var id   = data.id;

        $.ajax({
            url: 'Aluno/edit/'+id,
            type: 'GET',
            success: function(response) {
            console.log(response);
            
            var aluno = response;

            let nomeAluno            = document.getElementById("nomeAlunoUpdate");

            nomeAluno.innerHTML      =`${aluno.nome} - Aluno(a)`;
            $("#btnUpdate").val(aluno.id);
            $("#nomeAlunoEditar").val(aluno.nome);
            $("#emailAlunoEditar").val(aluno.email);
            $("#idadeAlunoEditar").val(aluno.idade);
            $("#enderecoAlunoEditar").val(aluno.endereco);
            $("#telefoneAlunoEditar").val(aluno.telefone);
            $("#sexoAlunoEditar").val(aluno.sexo);
            $("#cursoAlunoEditar").val(aluno.curso_id);
            
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

    // Função pra atualizar o Aluno
    $('#update').submit(function(e){
    e.preventDefault();
    var id = $('#btnUpdate').val();

    data ={
        'nome':       $("#nomeAlunoEditar").val(),
        'email':      $("#emailAlunoEditar").val(),
        'endereco':   $("#enderecoAlunoEditar").val(),
        'idade':      $("#idadeAlunoEditar").val(),
        'telefone':   $("#telefoneAlunoEditar").val(),
        'sexo':       $("#sexoAlunoEditar").val(),
        'curso_id':   $("#cursoAlunoEditar").val()
    }

    $.ajax({
        url: '/Aluno/update/'+id,
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

    // Função pra deletar o Aluno
    $(document).on('click', '#deletar', function() {
        var data = $(this).data();
        var id = data.id;
    
        if (confirm('Tem certeza que deseja excluir o Aluno?')) {
            $.ajax({
                url: '/Aluno/'+id,
                type: 'DELETE',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                console.log('SUCCESS')
                toastr.success('Aluno deletado com sucesso!', 'Sucesso');
                setTimeout(function () {
                    location.reload();
                }, 2000); // Recarregar após 2 segundos (ajuste conforme necessário)
            },
            error: function (response) {
                console.log('Erro:', response);
                toastr.error('Erro ao deletar o Aluno!', 'Erro');
            },
                
            });
            }
    });
        

  });