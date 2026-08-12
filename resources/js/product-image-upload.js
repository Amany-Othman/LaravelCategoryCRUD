const dropZone = document.getElementById('image-drop-zone');
const imageInput = document.getElementById('image-input');
const imagePreview = document.getElementById('image-preview');

if (dropZone && imageInput && imagePreview) {

    // Click on drop zone
    dropZone.addEventListener('click', () => {
        imageInput.click();
    });


    // Select image
    imageInput.addEventListener('change', () => {
        showPreview(imageInput.files[0]);
    });


    // Drag over
    dropZone.addEventListener('dragover', (event) => {
        event.preventDefault();

        dropZone.classList.add('dragover');
    });


    // Drag leave
    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });


    // Drop image
    dropZone.addEventListener('drop', (event) => {
        event.preventDefault();

        dropZone.classList.remove('dragover');

        const files = event.dataTransfer.files;

        if (files.length > 0) {
            imageInput.files = files;
            showPreview(files[0]);
        }
    });


    // Show image preview
    function showPreview(file) {

        if (!file) {
            return;
        }

        if (!file.type.startsWith('image/')) {
            imagePreview.innerHTML =
                '<small class="text-danger">Please select an image file.</small>';

            return;
        }

        const reader = new FileReader();

        reader.onload = (event) => {

            imagePreview.innerHTML = `
                <img
                    src="${event.target.result}"
                    alt="Image Preview"
                    class="img-thumbnail"
                >
            `;

        };

        reader.readAsDataURL(file);
    }
}