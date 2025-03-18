<?php
include 'config/connect.php';

if (!isset($_GET['s']) || empty($_GET['s'])) {
    header("HTTP/1.0 404 Not Found");
    echo "404 - File not found";
    exit();
}

$short_url = $conn->real_escape_string($_GET['s']);
$sql = "SELECT original_filename, new_filename FROM uploaded_files WHERE short_url = '$short_url'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $original_filename = $row['original_filename'];
    $new_filename = $row['new_filename'];
    $file_path = __DIR__ . '/files/' . $new_filename;

    if (file_exists($file_path)) {
        // Ställ in headers för nedladdning
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($original_filename) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        
        // Läs och skicka filen till användaren
        readfile($file_path);
        exit();
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "404 - File not found";
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 - File not found";
}

$conn->close();
?>
