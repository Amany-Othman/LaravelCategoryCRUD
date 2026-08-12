document.addEventListener('DOMContentLoaded', () => {

    const dropZone = document.getElementById('image-drop-zone');
    const imageInput = document.getElementById('image-input');
    const imagePreview = document.getElementById('image-preview');
    const placeholder = document.getElementById('upload-placeholder');

    if (!dropZone || !imageInput || !imagePreview) {
        return;
    }

    // Click on drop zone
    dropZone.addEventListener('click', () => {
        imageInput.click();
    });


    // Select image
    imageInput.addEventListener('change', () => {
        if (imageInput.files[0]) {
            showPreview(imageInput.files[0]);
        }
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


    // Render the preview image + change overlay, and hide the placeholder text
    function renderPreview(src) {

        imagePreview.innerHTML = `
            <img
                src="${src}"
                alt="Image Preview"
                class="img-thumbnail"
            >
            <div class="image-preview-overlay">
                <i class="fas fa-camera"></i>
                <span>Change Image</span>
            </div>
        `;

        dropZone.classList.add('has-image');

        if (placeholder) {
            placeholder.classList.add('d-none');
        }
    }


    // Show image preview from a File
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
            renderPreview(event.target.result);
        };

        reader.readAsDataURL(file);
    }

});