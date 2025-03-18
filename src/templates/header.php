<?php include("config/config.php"); ?>
<?php include("config/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site_name; ?> - <?= $siteTitle; ?></title>
    <meta name="generator" content="shithost 0.1.1">
    <meta name="title" content="<?= $site_name; ?> - <?= $description; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- Bootstrap Icons --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body data-bs-theme="dark"> 
  <div style="padding: 45px"></div> 
  <h1 class="display-2 fw-bold"><?= $site_name; ?></h1> 
  <p><?= $description; ?></p>
