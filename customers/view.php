    <?php
        session_start();
        include("functions.php");
        view($_GET["id"]);
        include(HEADER_TEMPLATE);
    ?>
                <section class="custom-shadow bg-dark">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Cliente <?php echo $customer["id"]; ?></h2>
                        </div>
                        <div class="col-sm-6 text-right h2">
                            <a class="btn btn-outline-primary text-light" href="edit.php?id=<?php echo $customer['id']; ?>"><i class="fa-solid fa-pencil"></i> Editar</a>
                            <a class="btn btn-outline-primary text-light" href="index.php?id=<?php echo $customer['id']; ?>"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                        </div>
                    </div>
                    <hr class="border border-light  border-2 opacity-75">

                    <?php if (!empty($_SESSION['message'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
                    <?php endif; ?>

                    <dl class="dl-horizontal">
                        <dt>Nome / Razão Social:</dt>
                        <dd><?php echo $customer['name']; ?></dd>

                        <dt>CPF / CNPJ:</dt>
                        <dd><?php echo formatar_cpf_cnpj($customer['cpf_cnpj']); ?></dd>

                        <dt>Data de Nascimento:</dt>
                        <dd><?php echo formatadata($customer['birthdate'], "d/m/Y"); ?></dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Endereço:</dt>
                        <dd><?php echo $customer['address']; ?></dd>

                        <dt>Bairro:</dt>
                        <dd><?php echo $customer['hood']; ?></dd>

                        <dt>CEP:</dt>
                        <dd><?php echo cep($customer['zip_code']); ?></dd>

                        <dt>Data de Cadastro:</dt>
                        <dd><?php echo formatadata($customer['created'], "d/m/Y"); ?></dd>

                        <dt>Data da ultima atualização:</dt>
                        <dd><?php echo formatadata($customer['modified'], "d/m/Y"); ?></dd>
                    </dl>

                    <dl class="dl-horizontal">
                        <dt>Cidade:</dt>
                        <dd><?php echo $customer['city']; ?></dd>

                        <dt>Telefone:</dt>
                        <dd><?php echo celPhone($customer['phone']); ?></dd>

                        <dt>Celular:</dt>
                        <dd><?php echo telefone($customer['mobile']); ?></dd>

                        <dt>UF:</dt>
                        <dd><?php echo $customer['state']; ?></dd>

                        <dt>Inscrição Estadual:</dt>
                        <dd><?php echo $customer['ie']; ?></dd>
                    </dl>

                    <div id="actions" class="row">
                        <div class="col-md-12">
                            <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Editar</a>
                            <a href="index.php" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
                        </div>
                    </div>
                    
                    <?php include(FOOTER_TEMPLATE); ?>
                </section>
