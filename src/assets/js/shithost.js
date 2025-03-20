document.addEventListener("DOMContentLoaded", function () {
    const uploadButton = document.getElementById("upload-button");
    const fileInput = document.getElementById("file-input");
    const responseDiv = document.getElementById("response");
    const uploadForm = document.getElementById("upload-form");

    uploadButton.addEventListener("click", function () {
        fileInput.click();
    });

    fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
            uploadFile(fileInput.files[0]);
        }
    });


    document.addEventListener("paste", function (event) {
        const items = event.clipboardData.items;

        for (let i = 0; i < items.length; i++) {
            if (items[i].kind === "file") {
                const file = items[i].getAsFile();
                uploadFile(file);
            }
        }
    });


    function uploadFile(file) {
        let formData = new FormData(uploadForm);
        formData.append("file", file);

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
