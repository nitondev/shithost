<?php

include 'config/config.php';
include 'config/connect.php';

$log_file = '/var/log/shithost/deletion.log';

$current_time = new DateTime();
$current_time->setTimezone(new DateTimeZone('UTC'));

$max_upload_hours = isset($max_upload_hours) ? $max_upload_hours : 24; 
$max_time = clone $current_time;
$max_time->sub(new DateInterval("PT{$max_upload_hours}H"));

function logMessage($message) {
    global $log_file;
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($log_file, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

$sql = "SELECT * FROM uploaded_files WHERE upload_time < ?";
$stmt = $conn->prepare($sql);
$formatted_time = $max_time->format('Y-m-d H:i:s');
$stmt->bind_param("s", $formatted_time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $new_filename = $row['new_filename'];
        $file_path = '/var/www/html/files/' . $new_filename;

        
        if (file_exists($file_path)) {

            if (unlink($file_path)) {
                logMessage("File {$new_filename} was deleted successfully.");
            } else {
                logMessage("Failed to delete file {$new_filename}. Error: " . error_get_last()['message']);
            }

            $delete_sql = "DELETE FROM uploaded_files WHERE id = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("i", $row['id']);
            $delete_stmt->execute();
            logMessage("Database row with ID {$row['id']} was deleted.");
        } else {
            logMessage("File {$new_filename} not found.");
        }
    }
} else {
    logMessage("No files found to delete.");
}

$conn->close();
