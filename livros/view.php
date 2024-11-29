<?php
    session_start();
    include("functions.php");
    view($_GET["id"]);
    include(HEADER_TEMPLATE);
?>

    <section class="custom-shadow bg-dark">
        <div class="row">
            <div class="col-sm-6">
                <h2>Livro: <?php echo $livro["id"]; ?></h2>
            </div>
            
            <div class="col-sm-6 text-right h2">
            <a class="btn btn-outline-primary text-light" href="edit.php?id=<?php echo $livro['id']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>
                <a class="btn btn-outline-primary text-light" href="index.php?id=<?php echo $livro['id']; ?>"><i class="fa-solid fa-arrow-left"></i></i> Voltar</a>
            </div>
        </div>
        <hr class="border border-light  border-2 opacity-75">

        <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
        <?php endif; ?>

        <dl class="dl-horizontal">
            <dt class="text-center">capa:</dt>
            <dd class="text-center mt-3">
                <img 
                    src="<?php echo !empty($livro['capa']) ? $livro['capa'] : '../assets/img/sem-foto.png'; ?>" 
                    width="300px" height="350px" />
            </dd>

            <dt>Nome:</dt>
            <dd><?php echo $livro['titulo_livro']; ?></dd>

            <dt>Autor:</dt>
            <dd><?php echo $livro['autor']; ?></dd>

            <dt>Editora:</dt>
            <dd><?php echo $livro['editora']; ?></dd>
        </dl>

        <dl class="dl-horizontal">
            <dt>Descrição:</dt>
            <dd><?php echo $livro['descricao']; ?></dd>

            <dt>Preço:</dt>
            <dd><?php echo preco($livro['preco']); ?></dd>

            <dt>genero:</dt>
            <dd><?php echo ($livro['genero_livro']); ?></dd>

            <dt>Data da ultima atualização:</dt>
            <dd><?php echo formatadata($livro['modified'], "d/m/Y"); ?></dd>
        </dl>

        
        <div id="actions" class="row">
            <div class="col-md-12">
                <a href="edit.php?id=<?php echo $livro['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Editar</a>
                <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
        <?php include(FOOTER_TEMPLATE); ?>
    </section>

    