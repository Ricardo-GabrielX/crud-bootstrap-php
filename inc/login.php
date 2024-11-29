<?php 
// Esse é o login.php
include ("../config.php"); 
include(HEADER_TEMPLATE); 
?>


<div class="sectionLogin" id="actions">
    <div class="heading">Sign In</div>
    <form action="valida.php" class="form" method="post">
      <input required="" class="input" type="text" name="login" id="log" placeholder="Usuário">
      <input required="" class="input" type="password" name="senha" id="pass" placeholder="Senha">
     
      <input class="login-button" type="submit">
      
    </form>
  </div>

<?php include(FOOTER_TEMPLATE); ?>
