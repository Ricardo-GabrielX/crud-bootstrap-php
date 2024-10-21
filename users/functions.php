<?php
    // Esse é o functions.php
    include('../config.php');
    include(DBAPI);

    $usuario = null;
    $usuarios = null;

    // Listagem de Usuários
    function index() {
        global $usuarios;

        if (!empty($_POST['users'])) {
            $usuarios = filter("usuarios", "nome LIKE '%" . $_POST['users'] . "%'");
        } else {
            $usuarios = find_all("usuarios");
        }
    }


    // Função para upload de imagens
    function upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
        // Upload de arquivos no PHP
        // https://www.w3schools.com/php/php_file_upload.asp

        try {
            $nomearquivo = basename($arquivo_destino); // Nome do arquivo
            $uploadOk = 1; // Variável de controle

            // Verificando se o arquivo é uma imagem
            if (isset($_POST["submit"])) {
                $check = getimagesize($nome_temp);
                if ($check !== false) {
                    $_SESSION['message'] = "O arquivo é uma imagem: " . $check["mime"] . ".";
                    $_SESSION['type'] = "info";
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                    throw new Exception("O arquivo não é uma imagem!");
                }
            }

            // Verificando se o arquivo já existe
            if (file_exists($arquivo_destino)) {
                $uploadOk = 0;
                throw new Exception("Desculpe, o arquivo já existe!");
            }

            // Verificando o tamanho do arquivo
            if ($tamanho_arquivo > 5000000) {
                $uploadOk = 0;
                throw new Exception("Desculpe, o arquivo é muito grande!");
            }

            // Verificando o formato do arquivo
            if ($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg" && $tipo_arquivo != "gif") {
                $uploadOk = 0;
                throw new Exception("Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos!");
            }

            // Verificando se ocorreu algum erro
            if ($uploadOk == 1) {
                throw new Exception("Desculpe, o arquivo não pode ser enviado.");
            } else {
                // Tentando fazer o upload do arquivo
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {
                    $_SESSION['message'] = "O arquivo " . htmlspecialchars($nomearquivo) . " foi armazenado com sucesso.";
                    $_SESSION['type'] = "success";
                } else {
                    throw new Exception("Desculpe, ocorreu um erro ao enviar o arquivo.");
                }
            }
        } catch (Exception $e) {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
        
    }
    // ----------------------------------------------------------------

    // Cadastro de Usuários

    function add() {
        if (!empty($_POST['usuario'])) {
            try {
                $usuario = $_POST['usuario'];

                if (!empty($_FILES["foto"]["name"])) {
                    // Upload da foto
                    $pasta_destino = "fotos/";
                    $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                    $nomearquivo = basename($_FILES["foto"]["name"]);
                    $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                    $tamanho_arquivo = $_FILES["foto"]["size"];
                    $nome_temp = $_FILES["foto"]["tmp_name"];
                    $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

                    // Chamada da função upload para gravar imagem
                    upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);
                    $usuario['foto'] = $nomearquivo;
                }

                // Criptografando senha
                if (!empty($usuario['password'])) {
                    $senha = criptografia($usuario['password']);
                    $usuario['password'] = $senha;
                }
                
                $usuario['foto'] = $nomearquivo;

                save('usuarios', $usuario);
                header('Location: index.php');
            } catch (Exception $e) {
                $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
                $_SESSION['type'] = "danger";
            }
        }
    }

    // Atualização/Edicao de Usuários
    function edit() {
        $now = new DateTime("now");

        try {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                if (isset($_POST['usuario'])) {
                    $usuario = $_POST['usuario'];

                    // Criptografando senha
                    if (!empty($usuario['password'])) {
                        $senha = criptografia($usuario['password']);
                        $usuario['password'] = $senha;
                    }

                    // Verificando se há upload de foto
                    if (!empty($_FILES["foto"]["name"])) {
                        // Upload da foto
                        $pasta_destino = "fotos/";
                        $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                        $nomearquivo = basename($_FILES["foto"]["name"]);
                        $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                        $tamanho_arquivo = $_FILES["foto"]["size"];
                        $nome_temp = $_FILES["foto"]["tmp_name"];
                        $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

                        upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);
                        $usuario['foto'] = $nomearquivo;
                    }

                    update('usuarios', $id, $usuario);
                    header('Location: index.php');
                } else {
                    global $usuario;
                    $usuario = find("usuarios", $id);
                }
            
            } else{
                header('Location: index.php');
            }
        } catch (Exception $e) {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
    }

    // Visualização de um Usuário
    function view($id = null) {
        global $usuario;
        $usuario = find("usuarios", $id);
    }

    // Exclusão de Usuários
    function delete($id = null) {
        global $usuarios;
        $usuarios = remove("usuarios", $id);
        header("Location: index.php");
    }

?>


