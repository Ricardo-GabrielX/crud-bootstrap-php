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
  edit();
  include(HEADER_TEMPLATE);
?>
  <section class="custom-shadow bg-dark">
    <div class="row">
        <div class="col-sm-6">
          <h2>Atualizar Cliente</h2>
        </div> 
        <div class="col-sm-6 text-right h2">
          <a class="btn btn-outline-primary text-light" href="index.php?id=<?php echo $customer['id']; ?>"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </div>
    </div>

    <form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
      <!-- area de campos do form -->
      <hr class="border border-light  border-2 opacity-75">
      <div class="row">
        <div class="form-group col-md-7">
          <label for="name">Nome / Razão Social</label>
          <input type="text" class="form-control" name="customer['name']"maxlength="50" value="<?php echo $customer['name']; ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="campo2">CNPJ / CPF</label>
          <input type="text" class="form-control" name="customer['cpf_cnpj']" 
            min="1000000000" 
            max="99999999999" 
            oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);"
            value="<?php echo $customer['cpf_cnpj']; ?>"
          >
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Data de Nascimento</label>
          <input type="date" class="form-control" name="customer['birthdate']" value="<?php echo formatadata($customer['birthdate'],"Y-m-d"); ?>">
        </div>
      </div>
      
      <div class="row">
        <div class="form-group col-md-5">
          <label for="campo1">Endereço</label>
          <input type="text" class="form-control" name="customer['address']" value="<?php echo $customer['address']; ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="campo2">Bairro</label>
          <input type="text" class="form-control" name="customer['hood']" value="<?php echo $customer['hood']; ?>">
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo3">CEP</label>
          <input type="text" class="form-control" name="customer['zip_code']"  
            maxlength="8"    
            value="<?php echo $customer['zip_code']; ?>"
          >
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo3">Data de Cadastro</label>
          <input type="text" class="form-control" name="customer['created']" disabled  value="<?php echo formatadata($customer['created'],"d/m/y"); ?>">
        </div>
      </div>
      
      <div class="row">
        <div class="form-group col-md-5">
          <label for="campo1">Município</label>
          <input type="text" class="form-control" name="customer['city']"  value="<?php echo $customer['city']; ?>">
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo2">Telefone</label>
          <input type="tel" class="form-control" name="customer['phone']" maxlength="11"  value="<?php echo $customer['phone']; ?>">
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo3">Celular</label>
          <input type="tel" class="form-control" name="customer['mobile']" maxlength="11"  value="<?php echo $customer['mobile']; ?>">
        </div>
        
        <div class="form-group col-md-1">
          <label for="campo3">UF</label>
          <input type="text" class="form-control" name="customer['state']"  maxlength="2"  value="<?php echo $customer['state']; ?>">
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo3">Inscrição Estadual</label>
          <input type="text" class="form-control" name="customer['ie']"  value="<?php echo $customer['ie']; ?>">
        </div>
        
        
      </div>
      
      <div id="actions" class="row mt-2">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
          <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
        </div>
      </div>
    </form>
    <?php include(FOOTER_TEMPLATE); ?>
  </section>

