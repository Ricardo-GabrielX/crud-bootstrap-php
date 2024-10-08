<?php
    include('functions.php');
    index();
    include(HEADER_TEMPLATE);
?>

    <head>
        <meta charset="utf-8">
        <title>CRUD com Bootstrap</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../icons8-livros-32.ico" type="image/x-icon">

        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/global.css">
        
        
    </head>
    <section class="bg-dark custom-shadow">
        <header>
            <div class="row">
                <div class="col-sm-6">
                    <h2>Clientes</h2>
                </div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-outline-primary text-light" href="add.php"><i class="fa fa-plus"></i> Novo Cliente</a>
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
        
        <table class="table table-hover table-light table-striped table-bordered ">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th width="30%">Nome</th>
                <th>CPF/CNPJ</th>
                <th>Telefone</th>
                <th>Atualizado em</th>
                <th>Opções</th>
            </tr>
        </thead>
        </section>
        <tbody  >
        
        <?php if ($customers) : ?>
        <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['id']; ?></td>
                <td><?php echo $customer['name']; ?></td>
                <td><?php echo $customer['cpf_cnpj']; ?></td>
                <td>00 0000-0000</td>
                <td><?php echo $customer['modified']; ?></td>
                <td class="actions text-right">
                    <a href="view.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Visualizar</a>
                    <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
                        <i class="fa fa-trash"></i> Excluir
                    </a>
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
   
    

<?php 
    include("modal.php"); 
    include(FOOTER_TEMPLATE);
 ?>