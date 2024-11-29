function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById('image-preview');

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';  // Mostrar a imagem
        }

        reader.readAsDataURL(input.files[0]); // Ler o arquivo de imagem e converter para uma URL
    }
}
