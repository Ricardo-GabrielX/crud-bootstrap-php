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

// ----------------------------------------------------------------

// Cadastro de Usuários
function add() {
    if (!empty($_POST['usuario'])) {
        try {
            // Obter os dados do usuario do formulário
            $usuario = $_POST['usuario'];

            // Inicializar a variável que armazenará o caminho da imagem
            $usuario['foto'] = null;

            // Lidar com o upload da imagem (se houver um arquivo enviado)
            if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
                $upload_dir = 'uploads/';
                $file_extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                $new_file_name = uniqid() . '.' . $file_extension; // Gerar um nome único para a imagem
                $uploaded_file = $upload_dir . $new_file_name;

                // Verificar e mover o arquivo enviado para o diretório de uploads
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploaded_file)) {
                    $usuario['foto'] = $uploaded_file; // Salvar o caminho da imagem no banco de dados
                } else {
                    throw new Exception("Erro ao enviar a imagem.");
                }
            }

            // Criptografando senha
            if (!empty($usuario['password'])) {
                $senha = criptografia($usuario['password']);
                $usuario['password'] = $senha;
            }
            
            save('usuarios', $usuario);
            header('Location: index.php');
        } catch (Exception $e) {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
    }
}

// Atualização/Edição de Usuários
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

                // Lidar com o upload da imagem (se houver um arquivo enviado)
                if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
                    $upload_dir = 'uploads/';
                    $file_extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                    $new_file_name = uniqid() . '.' . $file_extension; // Gerar um nome único para a imagem
                    $uploaded_file = $upload_dir . $new_file_name;

                    // Verificar e mover o arquivo enviado para o diretório de uploads
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploaded_file)) {
                        $usuario['foto'] = $uploaded_file; // Salvar o caminho da imagem no banco de dados
                    } else {
                        throw new Exception("Erro ao enviar a imagem.");
                    }
                }

                update('usuarios', $id, $usuario);
                header('Location: index.php');
            } else {
                global $usuario;
                $usuario = find("usuarios", $id);
            }
        } else {
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
