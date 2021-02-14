<?php

require_once 'connection.php';

$db = new Database();

if(isset($_POST['action']) && $_POST['action'] == 'view'){

    $output = '';

    $data = $db->read();

    if($db->totalRowCount() > 0){

        $output .= '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>';

        foreach($data as $row){

            $output .= '
                <tr class="text-center text-secundary">
                <td>'.$row['id'].'</td>
                <td>'.$row['nome'].'</td>
                <td>'.$row['sobrenome'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['telefone'].'</td>
                <td>
                    <a href="#" title="Ver Detalhes" class="text-success infoBtn" id="'.$row['id'].'"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;
                    <a href="#" title="Editar" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="'.$row['id'].'"><i class="fas fa-edit fa-lg"></i></a>&nbsp;
                    <a href="#" title="Excluir" class="text-danger delBtn" id="'.$row['id'].'"><i class="fas fa-trash-alt fa-lg" ></i></a>&nbsp;
                </td>
                </tr>
            ';

        }

        $output .= '</tbody></table>';

        echo $output;

    }else{ 

        echo '<h3 class="text-center text-secundary mt-5"> :( A tabela esta vazia!</h3>';

    }

}

if(isset($_POST['action']) && $_POST['action'] == 'insert'){

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $db->insert($nome, $sobrenome, $email, $telefone);

}

if(isset($_POST['action']) && $_POST['action'] == 'update'){

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $db->update($id, $nome, $sobrenome, $email, $telefone);

}

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $row = $db->getUserById($id);
    echo json_encode($row);

}

if(isset($_POST['del_id'])){

    $id = $_POST['del_id'];

    $db->delete($id);

}

if(isset($_POST['info_id'])){

    $id =$_POST['info_id'];
    $row = $db->getUserById($id);
    echo json_encode($row);
    
}

if(isset($_GET['export']) && $_GET['export'] == 'excel'){

    header('Content-Type: application/xls');
    header('Content-Disposition: attachament; filename=usuarios.xls');
    header('Pragma: no-cache');
    header('Expires: 0');

    $data = $db->read();
    echo '<table border="1">';
    echo '<tr><th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Telefone</th>
        </tr>';
    foreach($data as $row){
        echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['nome'].'</td>
            <td>'.$row['sobrenome'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['telefone'].'</td>
        </tr>';
    }
    
    echo '</table>';

}