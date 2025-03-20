<?php
include('config/connect.php');
include('config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {

    $uploadDir = __DIR__ . '/files/';
    $fileName = $_FILES['file']['name']; 
    $fileTmpName = $_FILES['file']['tmp_name']; 
    $fileSize = $_FILES['file']['size']; 
    $fileType = $_FILES['file']['type']; 


    if (in_array($fileType, $allowedTypes)) {
        $fileHash = hash_file('sha256', $fileTmpName);

        $uploadTime = time();

        $uniqueFileName = md5($fileHash . $uploadTime);

        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = $uniqueFileName . '.' . $fileExtension;

        $uploadFile = $uploadDir . $newFileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($fileTmpName, $uploadFile)) {

            $fileUrl = '/files/' . rawurlencode($newFileName); 

            $shortUrl = substr(md5(uniqid(rand(), true)), 0, 6);

            $stmt = $conn->prepare("INSERT INTO uploaded_files (original_filename, new_filename, file_size, upload_time, file_hash, ip_address, short_url) VALUES (?, ?, ?, FROM_UNIXTIME(?), ?, ?, ?)");
            $stmt->bind_param("ssissss", $fileName, $newFileName, $fileSize, $uploadTime, $fileHash, $_SERVER['REMOTE_ADDR'], $shortUrl);

            if ($stmt->execute()) {
                echo "Share link: <a href=\"share.php?s=$shortUrl\" target=\"_blank\">http://" . $_SERVER['HTTP_HOST'] . "/share.php?s=$shortUrl</a>";
            } else {
                echo "Failed to save file information in the database.";
            }

            $stmt->close();
        } else {
            echo "Failed to upload the file.";
        }
    } else {
        echo "This file type is not allowed, read the <a href=\"faq.php\">FAQ <i class=\"bi bi-box-arrow-up-right\"></i></a>"; 
    }
} else {
    echo "No file was uploaded."; 
}

?>
