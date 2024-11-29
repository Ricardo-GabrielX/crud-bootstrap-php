<?php 
  session_start();
  include("functions.php");

  // Verifica se o usuário está logado
  if (!isset($_SESSION['user'])) {
      echo "<div class='alert alert-danger text-center'>
      <h1>Você precisa estar logado para acessar esta página.</h1>
      <br>
      <h2>Redirecionando você...</div>";
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
            <h2>Novo livro</h2>
          </div> 
          <div class="col-sm-6 text-right h2">
            <a class="btn btn-outline-primary text-light" href="index.php"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
          </div>
        </div>

        <form action="add.php" method="post" enctype="multipart/form-data">
          <!-- area de campos do form -->
          <hr class="border border-light  border-2 opacity-75">
          <div class="row">
            <div class="form-group col-md-7">
              <label for="name">Nome do livro </label>
              <input type="text" class="form-control" name="livro[titulo_livro]"maxlength="50" required>
            </div>

            <div class="form-group col-md-3">
              <label for="campo2">Autor</label>
              <input type="text" class="form-control" name="livro[autor]" required>
            </div>

            <div class="form-group col-md-2">
              <label for="campo3">Editora</label>
              <input type="text" class="form-control" name="livro[editora]" required>
            </div>
          </div>
          
          <div class="row">
            <div class="form-group col-md-5">
              <label for="campo1">Descrição</label>
              <input type="text" class="form-control" name="livro[descricao]" required>
            </div>

            <div class="form-group col-md-3">
              <label for="capa">Capa do Livro</label>
              <input type="file" name="capa" id="capa" class="form-control" accept="image/*" onchange="previewImage(event)">
              <img id="image-preview" src="#" alt="Pré-visualização da Capa" style="display:none; margin-top:10px; max-width:100%; height:auto;">
            </div>
            
            <div class="form-group col-md-2">
              <label for="campo3">Preço</label>
              <input type="number" class="form-control" name="livro[preco]" required>
            </div>
            
            <div class="form-group col-md-2">
              <label for="campo3">Genero do Livro</label>
              <input type="text" class="form-control" name="livro[genero_livro]" required>
            </div>
            <div class="form-group col-md-2">
              <label for="campo4">Data de Cadastro</label>
              <input type="text" class="form-control" name="livro[created]" disabled>
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