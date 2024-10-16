
<?php
  include("functions.php");

  if (isset($_GET['id'])) {
      try {
          // Consultando o usuário para obter o nome do arquivo da foto
          $usuario = find("usuarios", $_GET['id']);

          // Chamando a função delete para apagar o usuário do banco de dados
          delete($_GET['id']);   

          unlink("fotos/" . $usuario['foto']);

      } catch (Exception $e) {
          $_SESSION['message'] = "Ocorreu um erro ao excluir o usuário: " . $e->getMessage();
          $_SESSION['type'] = "danger";
      }
  } else {
      die("ERRO: ID não definido.");
  }

?>