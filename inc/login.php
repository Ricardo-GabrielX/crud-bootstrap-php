<?php 
// Esse é o login.php
include ("../config.php"); 
include(HEADER_TEMPLATE); 
?>

<div id="actions" class="mt-5 mb-5">
    <form action="valida.php" method="post">
        <div class="row">
            <!-- User input -->
            <div class="form-floating col-12 mb-2">
                <input type="text" class="form-control" id="log" placeholder="Usuário" name="login">
                <label for="log">Usuário</label>
            </div>

            <!-- Password input -->
            <div class="form-floating col-12 mb-2">
                <input type="password" class="form-control" id="pass" placeholder="Senha" name="senha">
                <label for="pass">Senha</label>
            </div>

            <!-- Submit button -->
            <div class="col-12 mb-2">
                <button type="submit" class="btn btn-secondary btn-block mb-4">
                    <i class="fa-solid fa-user-check"></i> Conectar
                </button>
                <a href="<?php echo BASEURL; ?>" class="btn btn-light btn-block mb-4">
                    <i class="fa-solid fa-rotate-left"></i> Cancelar
                </a>
            </div>
        </div>
    </form>
</div>

<?php include(FOOTER_TEMPLATE); ?>
