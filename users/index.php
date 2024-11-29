<?php 
  session_start();
  include("functions.php");
  
  // Verifica se o usuário está logado
  if (!isset($_SESSION['user'])) {
      echo "<div class='alert alert-warning text-center'>
                <h1>Você precisa estar logado para acessar esta página.</h1>
                <p>Redirecionando você...</p>
            </div>";
      header("Refresh: 3; url=../inc/login.php");
      exit();
  }

  // Verifica se o usuário é administrador
  if ($_SESSION['user'] !== "admin") {
      echo "<div class='alert alert-danger text-center'>
                <h1>Acesso negado!</h1>
                <p>Você precisa ser administrador para acessar este recurso.</p>
            </div>";
      header("Refresh: 3; url=../inc/login.php");
      exit();
  }
    index(); 
    include(HEADER_TEMPLATE);
?>
    
    <section class="bg-dark custom-shadow">
        <header style="margin-top:10px;">
            <div class="row">
                <div class="col-sm-6">
                    <h2 class="text-white">Usuários</h2>
                </div>
                <div class="col-sm-6 text-end h2">
                    <a class="btn btn-outline-primary text-light" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
                    <a class="btn  btn-outline-primary text-light " href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
                </div>
            </div>
        </header>

        <form name="filtro" action="index.php" method="post">
            <div class="row">
                <div class="form-group col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" maxlength="80" name="users" required>
                        <button type="submit" class="btn btn-secondary"><i class="fas fa-search"></i> Consultar</button>
                    </div>
                </div>
            </div>
        </form>

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                <?php echo $_SESSION['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php clear_messages(); ?>
        <?php endif; ?>
            
        <hr class="border border-light  border-2 opacity-75">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Usuário</th>
                    <th>Foto</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($usuarios): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td class="text-center"><?php echo $usuario['id']; ?></td>
                            <td><?php echo $usuario['nome']; ?></td>
                            <td><?php echo $usuario['user']; ?></td>
                            <td class="text-center">
                                <img 
                                    src="<?php echo !empty($usuario['foto']) ? $usuario['foto'] : '../assets/img/sem-foto.png'; ?>" 
                                    width="220" height="200px"
                                />
                                </td>
                            <td>
                                <a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-eye"></i> Visualizar</a>
                                <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <?php if ($_SESSION['user'] == "admin") : ?>
                                        <a class="btn btn-sm btn-danger" data-bs-toggle="modal" href="#" data-bs-target="#delete-modal-user" data-usuario="<?php echo $usuario['id']; ?>">
                                            <i class="fa-solid fa-trash-can"></i> Excluir
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
<?php 
    include("modal.php"); 
    include(FOOTER_TEMPLATE); 
?>

