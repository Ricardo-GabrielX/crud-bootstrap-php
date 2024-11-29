<?php
    // Esse é o valida.php
    include ('../config.php');
    include(DBAPI);
    include(HEADER_TEMPLATE);

    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['login']) OR empty($_POST['senha']))) {
        header("Location: ". BASEURL . "index.php");
        exit;
    }

    // Tenta se conectar a um banco de dados MySQL
    $bd = open_database();
    try {
    // Selecionando o Banco de dados que está ajustado na constante DB_NAME
    // Caso ele não consiga.
        $bd -> select_db(DB_NAME);
    // Pegando o login e senha digitado no form
        $usuario = $_POST['login'];
        $senha = $_POST['senha'];
    // testando para ver so o login e senha digitado no form não estão vazios
        if (!empty($usuario) && !empty($senha)) {
            // Pega a senha digitada no form e criptografa ela para poder comparar
            // A mesma função de criptografia FOI MOVIDA para o arquivo database.php (DBAPI)
            $senha = criptografia($_POST['senha']);

            // Validando usuário/senha digitados
            $sql = "SELECT id, nome, user, password FROM usuarios WHERE (user = '". $usuario ."') AND (password = '". $senha ."') LIMIT 1";
            $query = $bd->query($sql);
            if ($query->num_rows > 0) {
                $dados = $query->fetch_assoc();
                // var_dump($dados);

                $id = $dados['id'];
                $nome = $dados['nome'];
                $user = $dados['user'];
                $password = $dados['password'];

                // var_dump($user);
            
                // Verifica se user não está vazio
                if (!empty($user)) {
                    if (!isset($_SESSION)) session_start();
                    $_SESSION['message'] = "Bem vindo " . $nome . "!";
                    $_SESSION['type'] = "info";
                    $_SESSION['id'] = $id;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['user'] = $user;
                    echo "<br>";
                    // var_dump($user);
                    echo "<br>";
                    
                } else {
                    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
                    throw new Exception("Não foi possível se conectar:<br>Verifique seu usuário e senha.");
                }
                // Direciona para o index do site
                header("Location: " . BASEURL . "index.php");
            } else {
                // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
                throw new Exception("Não foi possível se conectar:<br>Verifique seu usuário e senha.");
            }
        } else {
            // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
            throw new Exception("Não foi possível se conectar:<br>Verifique seu usuário e senha.");
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Ocorreu um erro: " . $e->GetMessage();
        $_SESSION['type'] = "danger";
    }

?>
<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php
    clear_messages(); 
    include(FOOTER_TEMPLATE);
?>
