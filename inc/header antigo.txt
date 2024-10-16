<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset="utf-8">
        <title>CRUD com Bootstrap</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/global.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/header.css">
        
    </head>
   
    <body>
        <!-- Incio do Menu -->
    <nav class="navbar navbar-expand-xl bg-dark fixed-top" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASEURL; ?>index.php">CRUD</a>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Adicionando ms-auto para empurrar os itens do menu para a direita -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle register" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registro de Clientes</button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/index.php">Todos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php">Adicionar novo livro</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle register" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Registro de Livros</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>livros/index.php">Todos</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo BASEURL; ?>livros/add.php">Adicionar novo livro</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        
       
            <!-- Fim do Menu -->
            
            
           
        <main class="container mt-5">
    </body>
<html>    