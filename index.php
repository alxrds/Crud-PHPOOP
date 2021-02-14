<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Play Sistemas</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sobre</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contato</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center text-danger font-weight-normal my-3">CRUD Usando PHP OOP, Bootstrap, Ajax, DataTable e SweetAlert</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4 class="mt-2 text-primary"> Usuários do banco!</h4>
        </div>
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i class="fas fa-user-plus fa-lg"></i> &nbsp; Adicionar Usuário</button>
            <a href="actions.php?export=excel" class="btn btn-success m-1 float-right"><i class="fas fa-table fa-lg"></i> &nbsp; Exportar para Excel </a>
        </div>
    </div>
    <hr class="my-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="ShowUser">
                <h3 class="text-center text-success" style="margin-top: 150px">
                    Carregando...
                </h3>
            </div>
        </div>
    </div>
</div>

<!-- Novo Usuário -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Adicionar novo Usuário</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body px-4">
            <form action="" method="post" id="form-data">
                <div class="form-group">
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <input type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Sobrenome" required>
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="insert" id="insert" class="btn btn-success btn-block" value="Adicionar Usuário">
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!-- Fim Novo Usuário -->

<!-- Editar Usuário -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Usuário</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body px-4">
            <form action="" method="post" id="edit-form-data">
                <input type="hidden" name="id" id="uid">
                <div class="form-group">
                    <input type="text" name="nome" id="unome" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="sobrenome" id="usobrenome" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="email" id="uemail" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="telefone" id="utelefone" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="update" id="update" class="btn btn-primary btn-block" value="Editar Usuário">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
<!-- Fim Editar Usuário -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>

    $(document).ready(function(){

        showAllUsers();

        function showAllUsers(){

            $.ajax({
                url: 'actions.php',
                type: 'POST',
                data:{
                    action:'view'
                },
                success: function(response){

                    $('#ShowUser').html(response);
                    $('table').dataTable({
                        order: [0, 'desc']
                    });
                }

            });

        }

        $('#insert').click(function(e){

            if( $('#form-data')[0].checkValidity() ){

                e.preventDefault();

                $.ajax({
                    url: 'actions.php',
                    type: 'POST',
                    data: $('#form-data').serialize() + '&action=insert',
                    success:function(response){
                        Swal.fire({
                            title: 'Usuário adicionado com sucesso!',
                            type: 'success'
                        });
                        $('#addModal').modal('hide');
                        $('#form-data')[0].reset();
                        showAllUsers();
                    }
                });

            }

        });

        $('#update').click(function(e){

            if( $('#edit-form-data')[0].checkValidity() ){

                e.preventDefault();

                $.ajax({
                    url: 'actions.php',
                    type: 'POST',
                    data: $('#edit-form-data').serialize() + '&action=update',
                    success:function(response){
                        Swal.fire({
                            title: 'Usuário Alterado com sucesso!',
                            type: 'success'
                        });
                        $('#editModal').modal('hide');
                        $('#edit-form-data')[0].reset();
                        showAllUsers();
                    }
                });

            }

        });

        $('body').on('click', '.infoBtn', function(e){
            
            e.preventDefault();
            info_id = $(this).attr('id');

            $.ajax({
                url: 'actions.php',
                type: 'POST',
                data: {
                    info_id: info_id
                },
                success: function(response){
                    data = JSON.parse(response);
                    Swal.fire({
                        title: '<strong> Usuário ID('+ data.id +') </strong>',
                        type: 'info',
                        html: '<b>Nome: </b>'+ data.nome +' '+ data.sobrenome +'<br><b> Email: </b>'+ data.email +'<br><b>Telefone: </b>'+ data.telefone
                    });
                }
            });

        });

        $('body').on('click', '.editBtn', function(e){
            
            e.preventDefault();
            id = $(this).attr('id');

            $.ajax({
                url: 'actions.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response){
                    data = JSON.parse(response);
                    $('#uid').val(data.id);
                    $('#unome').val(data.nome);
                    $('#usobrenome').val(data.sobrenome);
                    $('#uemail').val(data.email);
                    $('#utelefone').val(data.telefone);
                }
            });

        });

        $('body').on('click', '.delBtn', function(e){
            
            e.preventDefault();
            tr = $(this).closest('tr');
            del_id = $(this).attr('id');

            Swal.fire({
                title: 'Tem certeza?',
                text: "Essa operação não poderá ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, quero excluir!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if(result.isConfirmed){
                    $.ajax({
                        url: 'actions.php',
                        type: 'POST',
                        data: {del_id},
                        success: function(response){
                            tr.css('background-color','#ff6666');
                            Swal.fire(
                                'Excluído',
                                'Usuário Excluído com sucesso!',
                                'success'
                            );
                            showAllUsers();
                        }
                    });
                }
            });

        });


    });

    

   

</script>

</body>
</html>