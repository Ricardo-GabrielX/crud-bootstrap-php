<?php 
	include "config.php"; 
	include DBAPI; 
	if (!isset($_SESSION)) session_start();
	include(HEADER_TEMPLATE); 
	$db = open_database(); 
?>
			<div class="home">
				<div class="base"> 
					<p class="top">Olá, seja bem vindo!</p>
					<h1>Conheça a nossa biblioteca</h1>
					<p id="spacing">Um lugar onde você pode ver livros, adicionar, editar e exluir. Aproveite e explore, descruba sobre novos livros, quem sabe você encontra um livro que chame sua atenção!</p>
					<a href="<?php echo BASEURL; ?>template.php" class="bottone1"><strong>Saiba mais</strong></a>
					
				</div>
				<div>
					<img src="assets/img/cenoura.png" alt="">
				</div>
			</div>
			<?php if ($db) : ?>
					<h1 class="mt-5">O que deseja fazer?</h1>
					<!-- <hr class="mt-5 border border-light  border-2 opacity-75"> -->

					



						
			<div class="row">
				<div class="col-xs-6 col-sm-3 col-md-2 d-flex justify-content-center">
					<a href="customers/add.php" class="btn btn-primary w-100">
						<div class="text-center">
							<i class="fa fa-user-plus fa-5x"></i>
							<p>Novo Cliente</p>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-3 col-md-2 d-flex justify-content-center">
					<a href="customers" class="btn btn-secondary w-100">
						<div class="text-center">
							<i class="fa fa-user fa-5x"></i>
							<p>Clientes</p>
						</div>
					</a>
				</div>
			</div>


			<hr class="mt-5 border border-light  border-2 opacity-75">
			<!-- Livros -->
			<div class="row mt-5">
				<div class="col-xs-6 col-sm-3 col-md-2 d-flex justify-content-center">
					<a href="livros/add.php" class="btn btn-primary w-100">
						<div class="text-center">
							<i class="fa-solid fa-book-medical fa-5x"></i>
							<p>Novo Livro</p>
						</div>
					</a>
				</div>

				<div class="col-xs-6 col-sm-3 col-md-2 d-flex justify-content-center">
					<a href="livros" class="btn btn-secondary w-100">
						<div class="text-center">
						<i class="fa-solid fa-book fa-5x"></i>
							<p>Livros</p>
						</div>
					</a>
				</div>
			</div>
	<?php if (isset($_SESSION['user'])) : ?>
		<?php if ($_SESSION['user'] == "admin") : ?>
			<div class="row mt-5" id="actions">
			
				<div class="col-xs-6 col-sm-3 col-md-2 d-flex justify-content-center">
					<a href="<?php echo BASEURL; ?>users/add.php" class="btn btn-primary w-100">
						<div class="row">
							<div class="col-xl-12 text-center">
								<i class="fa-solid fa-user-tie fa-5x"></i>
							</div>
							<div class="col-xl-12 text-center">
								<p>Novo Usuário</p>
							</div>
						</div>
					</a>
				</div>
        
				<div class="col-xs-6 col-sm-3 col-md-2 d-flex justify-content-center">
					<a href="<?php echo BASEURL; ?>users" class="btn btn-secondary w-100">
						<div class="row">
							<div class="col-xl-12 text-center">
								<i class="fa-solid fa-user-lock fa-5x"></i>
							</div>
							<div class="col-xl-12 text-center">
								<p>Usuários</p>
							</div>
						</div>
					</a>
				</div>
			</div>
    	<?php endif; ?>
	<?php endif; ?>
	<?php else : ?>
		<div class="alert alert-danger" role="alert">
			<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
		</div>

	<?php endif; ?>

	<?php if (!empty($_SESSION['message'])) : ?>
		<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
			<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
    <?php clear_messages(); ?>
	<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>