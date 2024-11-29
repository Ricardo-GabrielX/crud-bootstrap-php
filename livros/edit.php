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

  edit();
  include(HEADER_TEMPLATE);
?>
  <section class="custom-shadow bg-dark">
        <div class="row">
            <div class="col-sm-6">
                <h2>Atualizar livro</h2>
            </div> 
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-outline-primary text-light" href="index.php?id=<?php echo $livro['id']; ?>"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
            </div>
        </div>

    <form action="edit.php?id=<?php echo $livro['id']; ?>" method="post" enctype="multipart/form-data">
      <!-- area de campos do form -->
      <hr class="border border-light  border-2 opacity-75">
      <div class="row">
        <div class="form-group col-md-7">
          <label for="name">Nome do livro</label>
          <input type="text" class="form-control" name="livro['titulo_livro']"maxlength="50" value="<?php echo $livro['titulo_livro']; ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="campo2">Autor</label>
          <input type="text" class="form-control" name="livro['autor']" value="<?php echo $livro['autor']; ?>">
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Editora</label>
          <input type="text" class="form-control" name="livro['editora']" value="<?php echo $livro['editora']; ?>">
        </div>
      </div>
      
      <div class="row">
        <div class="form-group col-md-5">
          <label for="campo1">Descrição</label>
          <input type="text" class="form-control" name="livro['descricao']" value="<?php echo $livro['descricao']; ?>">
        </div>

        <div class="form-group col-md-3">
          <label for="capa">capa</label>
          <input type="file" class="form-control" id="capa" name="capa" accept="image/*" onchange="previewImage(event)">
          <!-- Mostrar a imagem existente -->
          <?php if (!empty($livro['capa'])): ?>
              <img id="image-preview" src="<?php echo $livro['capa']; ?>" alt="Capa do Livro" style="margin-top:10px; max-width:100%; height:auto;">
          <?php else: ?>
            <img id="image-preview" src="../assets/img/sem-foto.png" alt="Livro sem foto" style="margin-top:10px; max-width:100%; height:auto;">
          <?php endif; ?>
        </div>

        <div class="form-group col-md-2">
          <label for="campo3">Preço</label>
          <input type="text" class="form-control" name="livro['preco']"  value="<?php echo $livro['preco']; ?>">
        </div>
        
        <div class="form-group col-md-2">
          <label for="campo3">Genero do livro</label>
          <input type="text" class="form-control" name="livro['genero_livro']" disabled  value="<?php echo $livro['genero_livro']; ?>">
        </div>
      </div>
      
    
      
      <div id="actions" class="row mt-2">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
          <a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-left"></i> Cancelar</a>
        </div>
      </div>
    </form>
    <?php include(FOOTER_TEMPLATE); ?>
  </section>
  <script src="../js/preview.js"></script>
