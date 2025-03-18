<?php 

$siteTitle = "Home";

include("templates/header.php");

?>

<div class="container"> 
   <div class="card" id="upload-card" style="max-width: 800px; margin: 0 auto;"> 
    <div class="card-body"> 
     <h5 class="card-title">Upload files</h5> 
     <h6 class="card-subtitle mb-2 text-body-secondary">Up to <?= $max_upload_size; ?>MB, stored for <?= $max_upload_hours; ?>h.</h6> 
     <p class="card-text"> <button id="upload-button" class="btn btn-primary">One-click upload</button> </p> 
    </div> 
    <div class="drop-overlay">
      Drop file here. 
    </div> 
   </div> 
   <form id="upload-form" enctype="multipart/form-data">
      <input type="file" id="file-input" name="file" style="display: none;">
   </form>
   <div class="pt-2" id="response"></div>
</div>

<?php include("templates/footer.php"); ?>