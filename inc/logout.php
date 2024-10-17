<?php
    // Esse é o logout.php
    include ("../config.php");

    try {
        session_start(); // Inicia a sessão ou acessa a sessão existente
        session_destroy(); // Destrói a sessão limpando todos os valores salvos
        
        // Direciona para o index do site (correção no uso de BASEURL)
        header("Location: " . BASEURL . "index.php");
        exit(); // Adicionado para garantir que o redirecionamento ocorra
    } catch (Exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage(); // Correção do operador de concatenação
        $_SESSION['type'] = "danger";
    }
?>
