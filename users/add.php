<?php 
  include("functions.php"); 
  add();
  include(HEADER_TEMPLATE);
?>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="../icons8-livros-32.ico" type="image/x-icon">

        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/global.css">
    </head>

<section class="bg-dark custom-shadow p-4 ">
  <h2 class="mt-2" >Novo Cliente</h2>

  <form action="add.php" method="post" >
    <!-- area de campos do form -->
    <hr class="border border-light  border-2 opacity-75">
    <div class="row">
      <div class="form-group col-md-7">
        <label for="name">Nome / Razão Social</label>
        <input type="text" class="form-control" name="customer['name']"maxlength="50">
      </div>

      <div class="form-group col-md-3">
        <label for="campo2">CNPJ / CPF</label>
        <input type="number" class="form-control" name="customer['cpf_cnpj']">
      </div>

      <div class="form-group col-md-2">
        <label for="campo3">Data de Nascimento</label>
        <input type="date" class="form-control" name="customer['birthdate']">
      </div>
    </div>
    
    <div class="row">
      <div class="form-group col-md-5">
        <label for="campo1">Endereço</label>
        <input type="text" class="form-control" name="customer['address']">
      </div>

      <div class="form-group col-md-3">
        <label for="campo2">Bairro</label>
        <input type="text" class="form-control" name="customer['hood']">
      </div>
      
      <div class="form-group col-md-2">
        <label for="campo3">CEP</label>
        <input type="text" class="form-control" name="customer['zip_code']">
      </div>
      
      <div class="form-group col-md-2">
        <label for="campo3">Data de Cadastro</label>
        <input type="text" class="form-control" name="customer['created']" disabled>
      </div>
    </div>
    
    <div class="row">
      <div class="form-group col-md-5">
        <label for="campo1">Município</label>
        <input type="text" class="form-control" name="customer['city']">
      </div>
      
      <div class="form-group col-md-2">
        <label for="campo2">Telefone</label>
        <input type="tel" class="form-control" name="customer['phone']" maxlength="11">
      </div>
      
      <div class="form-group col-md-2">
        <label for="campo3">Celular</label>
        <input type="tel" class="form-control" name="customer['mobile']" maxlength="11">
      </div>
      
      <div class="form-group col-md-1">
        <label for="campo3">UF</label>
        <input type="text" class="form-control" name="customer['state']"  maxlength="2">
      </div>
      
      <div class="form-group col-md-2">
        <label for="campo3">Inscrição Estadual</label>
        <input type="text" class="form-control" name="customer['ie']">
      </div>
      
      
    </div>
    
    <div id="actions" class="row mt-2">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
        <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
      </div>
    </div>
  </form>
</section>

<?php
  include(FOOTER_TEMPLATE);
?>