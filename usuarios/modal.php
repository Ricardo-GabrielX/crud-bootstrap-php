<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Modal</title>
    <style>
        .modal-content {
            background-color: #ffffff; 
            color: #000000; 
        }

        
    </style>
</head>     
        
        <!-- Modal -->
        <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Excluir Cliente
            </div>
            <div class="modal-footer">
                <a href="#" id="confirm" type="button" class="btn btn-secondary"><i class="fa-regular fa-circle-check"></i>Sim</a>
                <button type="button" class="btn btn-primary"  data-bs-dismiss="modal"><i class="fa-regular fa-circle-xmark"></i>Não</button>
            </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
