<?php 

$siteTitle = "Shared File";

include("templates/header.php");
include("config/timeformat.php");
include("config/sizeformat.php");

?>

<div class="container"> 
   <div class="card" style="max-width: 800px; margin: 0 auto;"> 
    <div class="card-body"> 
<?php

if (!isset($_GET['s']) || empty($_GET['s'])) {
    header("HTTP/1.0 404 Not Found");
    echo "404 - File not found";
    exit();
}

$short_url = $conn->real_escape_string($_GET['s']);
$sql = "SELECT * FROM uploaded_files WHERE short_url = '$short_url'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $original_filename = $row['original_filename'];
    $new_filename = $row['new_filename'];
    $file_size = $row['file_size'];
    $upload_time = $row['upload_time'];
    $file_hash = $row['file_hash'];

    echo "<h5 class=\"card-title\">File Information</h5>\n";
    echo "<p class=\"text-start\"><strong>Filename:</strong> " . htmlspecialchars($original_filename) . "</p>\n";
    echo "<p class=\"text-start\"><strong>File Size:</strong> " . formatFileSize($row['file_size']) . "</p>\n"; 
    echo "<p class=\"text-start\"><strong>Uploaded:</strong> " . timeAgo($upload_time) . " ago</p>\n";
    echo "<p class=\"text-start\"><strong>SHA256:</strong> " . htmlspecialchars($file_hash) . "</p>\n";

    echo '<a href="/download.php?s=' . htmlspecialchars($short_url) . '" class="btn btn-sm btn-primary"><i class="bi bi-file-earmark-arrow-down"></i> Download File</a>';

    $file_info = pathinfo($original_filename);
    $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];

    if (in_array(strtolower($file_info['extension']), $image_extensions)) {
        echo ' <a href="/files/' . htmlspecialchars($new_filename) . '" target="_blank" class="btn btn-sm btn-link">View Image</a>';
    }

} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 - File not found";
}

$conn->close();
?>
    </div>
</div>

<?php include("templates/footer.php") ?>
