<?php 
    session_start();
    include "config.php"; 
    include(HEADER_TEMPLATE);
?>
    <section class="bg-dark custom-shadow p-4 ">
        <h1>Oi, esse site é um sistema de cadastro. </h1>
        <h4 class="text-white">Para acessar os campos de clientes, livros precisa estar logado.</h4>
        <h2 class="mt-5">DADOS PARA LOGIN NORMAL:</h2>
        <p class="mt-3">USUARIO: ricardo</p>
        <p>SENHA: root</p>
        <hr>
        <p>USUARIO: ian</p>
        <p>SENHA: root</p>
        <hr>
        <h2>DADOS PARA ADMIN:</h2>

        <p class="mt-3">USUARIO: admin</p>
        <p>SENHA: root</p>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-outline-primary text-light" href="index.php"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </div>
    </section>


<?php include(FOOTER_TEMPLATE); ?>