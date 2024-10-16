<?php
    //esse é o view.php
    include('functions.php');
    view($_GET['id']);
    include(HEADER_TEMPLATE);
?>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert" id="actions">
            <?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php else : ?>
        <header>
            <h2>Cliente <?php echo $usuario['id']; ?></h2>
        </header>

        <hr>

        <dl class="dl-horizontal">
            <dt>Nome:</dt>
            <dd><?php echo $usuario['nome']; ?></dd>

            <dt>Login:</dt>
            <dd><?php echo $usuario['user']; ?></dd>

            <dt>Senha:</dt>
            <dd><?php echo $usuario['password']; ?></dd>

            <dt>Foto:</dt>
            <dd>
                <?php
                if (!empty($usuario['foto'])) {
                    echo "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
                } else {
                    echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-1 mb-1 bg-body rounded\" width=\"300px\">";
                }
                ?>
            </dd>
        </dl>
    <?php endif; ?>

    <div id="actions" class="row">
        <div class="col-md-12">
            <?php if (empty($_SESSION['message'])) : ?>
                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
            <?php endif; ?>
            <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        </div>
    </div>

<?php 
    clear_messages();
    include(FOOTER_TEMPLATE);
?>
