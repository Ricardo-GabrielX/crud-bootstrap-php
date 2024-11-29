<?php 
  session_start();
  include("functions.php");

  // Verifica se o usuário está logado
  if (!isset($_SESSION['user'])) {
      echo "<div class='alert alert-danger text-center'><h1>Você precisa estar logado para acessar esta página.</h1><br><h2>Redirecionando você...</div>";
      // Redireciona para a página de login após 3 segundos
      header("Refresh: 3; url=../inc/login.php");
      exit(); // Finaliza a execução para evitar carregar o restante da página
  }

  add();
  include(HEADER_TEMPLATE);
?>

    <section class="bg-dark custom-shadow p-4 ">
      <div class="row">
          <div class="col-sm-6">
            <h2>Novo cliente</h2>
          </div> 
          <div class="col-sm-6 text-right h2">
            <a class="btn btn-outline-primary text-light" href="index.php"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
          </div>
      </div>

      <form action="add.php" method="post" >
        <!-- area de campos do form -->
        <hr class="border border-light  border-2 opacity-75">
        <div class="row">
          <div class="form-group col-md-7">
            <label for="name">Nome / Razão Social</label>
            <input type="text" class="form-control" name="customer['name']" maxlength="50" required>
          </div>

          <div class="form-group col-md-3">
            <label for="campo2">CNPJ / CPF</label>
            <input type="text" class="form-control" name="customer['cpf_cnpj']" maxlength="14" required>
          </div>

          <div class="form-group col-md-2">
            <label for="campo3">Data de Nascimento</label>
            <input type="date" class="form-control" name="customer['birthdate']" required>
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
            <input type="text" class="form-control" name="customer['zip_code']" maxlength="8">
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
            <input type="text" class="form-control" name="customer['ie']" maxlength="20">
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