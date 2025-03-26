<?php 

$siteTitle = "Browse files";

include("templates/header.php");
include("config/timeformat.php");
include("config/sizeformat.php");

$query = "SELECT original_filename, file_size, upload_time, short_url, uploader FROM uploaded_files ORDER BY upload_time DESC";
$result = $conn->query($query);

?>

<div class="container"> 
    <div class="card" style="max-width: 800px; margin: 0 auto;"> 
    <div class="card-body"> 
        <?php
            if ($result->num_rows === 0) {
                echo "<p>No files found on this server, yet!<br>Try upload something.</p>";
            } else {
                echo "<table class=\"table\" style='text-align: left;'>";
                echo "<thead><tr><th>Filename:</th><th>Size</th><th>Age</th><th>Uploader</th></tr></thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><a href='share.php?s=" . htmlspecialchars($row['short_url']) . "'>" . htmlspecialchars($row['original_filename']) . "</a></td>";
                    echo "<td>" . formatFileSize($row['file_size']) . "</td>";
                    echo "<td>" . timeAgo($row['upload_time']) . "</td>";
                    echo "<td><i class=\"bi bi-person-fill\"></i> " . htmlspecialchars($row['uploader']) . "</td>"; 
                    echo "</tr>";
                }

                echo "</tbody></table>";
            }

            $conn->close();
        ?>
    </div>
</div>

<?php include("templates/footer.php"); ?>