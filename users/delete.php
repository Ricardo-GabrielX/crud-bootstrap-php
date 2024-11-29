<?php
    // esse é o delete.php
    include("functions.php");

    if (isset($_GET['id'])) {
        try {
            // consultando o usuário para obter o nome do arquivo da foto
            $usuario = find("usuarios", $_GET['id']);
            // Chamando a função delete para apagar o usuário do banco de dados
            delete($_GET['id']);
            // Apagando o arquivo da foto do usuário na pasta fotos
            unlink("fotos/" . $usuario['foto']);
        } catch (Exception $e) {
            $_SESSION['message'] = "Não foi possível realizar a operação: " . $e->GetMessage();
            $_SESSION['type'] = "danger";
        }
    } 

    /*
    // Como era o arquivo original
    delete($_GET['id']);
    */

?>
