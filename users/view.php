<?php
    session_start();
    include('functions.php');

    if (!isset($_SESSION)) session_start();
    if (isset($_SESSION['user'])) { // Verifica se tem um usuário logado
        if ($_SESSION['user'] != "admin") { // Verifica se o usuário é admin
            $_SESSION['message'] = "Você precisa ser administrador para acessar esse recurso!";
            $_SESSION['type'] = "danger";
            header("Location:" . BASEURL . "index.php");
        }
    } else {
        $_SESSION['message'] = "Você precisa estar logado e ser administrador para acessar esse recurso!";
        $_SESSION['type'] = "danger";
        header("Location:" . BASEURL . "index.php");
    }
    view($_GET['id']);
    include(HEADER_TEMPLATE);
?>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php else : ?>
        <section class="custom-shadow bg-dark">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Usuário: <?php echo $usuario["id"]; ?></h2>
                </div>
                
                <div class="col-sm-6 text-right h2">
                <a class="btn btn-outline-primary text-light" href="edit.php?id=<?php echo $usuario['id']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>
                    <a class="btn btn-outline-primary text-light" href="index.php?id=<?php echo $usuario['id']; ?>"><i class="fa-solid fa-arrow-left"></i></i> Voltar</a>
                </div>
            </div>
            <hr>

            <dl class="dl-horizontal">
                <dt>Nome:</dt>
                <dd><?php echo $usuario['nome']; ?></dd>

                <dt>Login:</dt>
                <dd><?php echo $usuario['user']; ?></dd>

                <dt>Senha:</dt>
                <dd><?php echo $usuario['password']; ?></dd>

                <dt>Foto:</dt>
                <img 
                    src="<?php echo !empty($usuario['foto']) ? $usuario['foto'] : '../assets/img/sem-foto.png'; ?>" 
                    width="220" height="200px"
                />
                
                
            </dl>
            <?php endif; ?>
        

            <div id="actions" class="row">
                <div class="col-md-12">
                    <?php if (empty($_SESSION['message'])) : ?>
                        <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    <?php endif; ?>
                    <a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
        </section>

    <?php clear_messages(); ?>
    <?php include(FOOTER_TEMPLATE); ?>

    <script>
    $(document).ready( () => {
        $('#foto').change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $('#imgPreview').attr('src', event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>