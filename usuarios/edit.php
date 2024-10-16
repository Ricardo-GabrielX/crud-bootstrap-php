<?php
    // esse é o edit.php
    include('functions.php');
    edit();
    include(HEADER_TEMPLATE);
?>

  <header>
      <h2>Atualizar Usuário</h2>
  </header>

  <form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data">
      <!-- Área de campos do form -->
      <hr> 
      <div class="row">
          <div class="form-group col-md-8">
              <label for="name">Nome</label>
              <input type="text" class="form-control" name="usuario[nome]" value="<?php echo $usuario['nome']; ?>">
          </div>

          <div class="form-group col-md-4">
              <label for="campo2">Usuário (Login)</label>
              <input type="text" class="form-control" name="usuario[user]" value="<?php echo $usuario['user']; ?>">
          </div>

          <div class="form-group col-md-4">
              <label for="campo3">Senha</label>
              <input type="password" class="form-control" name="usuario[password]" value="">
          </div>
      </div>

      <div class="row">
          <?php
            $foto = "";
            if (empty($usuario['foto'])) {
                $foto = "semimagem.jpg";
                
            } else {
                $foto = $usuario['foto'];
            }
          ?>
          
          <div class="form-group col-md-4">
              <label for="foto">Foto</label>
              <input type="file" class="form-control" id="foto" name="foto" value="fotos/<?php echo $foto; ?>">
          </div>

          <div class="form-group col-md-2">
              <label for="pre">Pré-visualização:</label>
              <img class="form-control shadow p-2 mb-2 bg-body rounded" id="imgPreview" src="fotos/<?php echo $foto; ?>" alt="Foto do usuário">
          </div>
      </div>

      <div id="actions" class="row">
          <div class="col-md-12">
              <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
              <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
          </div>
      </div>
  </form>

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
