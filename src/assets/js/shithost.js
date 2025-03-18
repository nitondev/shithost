document.addEventListener("DOMContentLoaded", function () {
    const uploadButton = document.getElementById("upload-button");
    const fileInput = document.getElementById("file-input");
    const responseDiv = document.getElementById("response");
    const uploadForm = document.getElementById("upload-form");

    // Öppna filväljaren när man klickar på knappen
    uploadButton.addEventListener("click", function () {
        fileInput.click();
    });

    // När en fil väljs, skicka den via formuläret
    fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
            uploadFile(fileInput.files[0]);
        }
    });

    function uploadFile(file) {
        let formData = new FormData(uploadForm);
        
        fetch("upload.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            responseDiv.innerHTML = `${data}`;
        })
        .catch(error => {
            responseDiv.innerHTML = `Upload failed.`;
        });
    }
});
