<?php
    session_start();
    include('functions.php');
    index();
    include(HEADER_TEMPLATE); 
?>
    <section class="bg-dark custom-shadow">
        <header>
            <div class="row">
                <div class="col-sm-6">
                    <h2>Livros</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-outline-primary text-light" href="add.php"><i class="fa fa-plus"></i> Novo Livro</a>
                    <a class="btn  btn-outline-primary text-light " href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
                </div>
            </div>
        </header>
        
        <?php if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php clear_messages(); ?>
        <?php endif; ?>

        <hr class="border border-light  border-2 opacity-75">
            
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Atualizado em</th>
                        <th>Capa</th>
                        <th>Opções</th>
                    </tr>
                </thead>
            
            <tbody>
            
            <?php if ($livros) : ?>
            <?php foreach ($livros as $livro) : ?>
                <tr>
                    <td><?php echo $livro['id']; ?></td>
                    <td><?php echo $livro['titulo_livro']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td><?php echo $livro['modified']; ?></td>
                    
                    <!-- Exibir a foto -->
                    <td class="text-center" >
                        <img 
                            src="<?php echo !empty($livro['capa']) ? $livro['capa'] : '../assets/img/sem-foto.png'; ?>" 
                            width="220" height="200px" 
                        />
                    </td>
                    

                    <td class="actions text-right">
                        <a href="view.php?id=<?php echo $livro['id']; ?>" class="btn btn-sm btn-light"><i class="fa fa-eye"></i> Visualizar</a>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <a href="edit.php?id=<?php echo $livro['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Editar</a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-livros" data-livro="<?php echo $livro['id']; ?>">
                                <i class="fa fa-trash"></i> Excluir
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else : ?>
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