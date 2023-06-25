

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Remote File Downloader</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
<div class="jumbotron mt-4 p-5 rounded">
  <h1>Current Server Info</h1>
  <p>
      <?php
      // PHP INFO CHECKER
      echo 'Current PHP version: ' . phpversion() . "<br>";
      echo "PHP Execution Time: " . ini_get('max_execution_time') . "Sec <br>"; 
      ?>
<div class="alert alert-danger">
  <strong>Warning!</strong> Minimum requirements: PHP execution time should be 99999+ if bigger files.
</div>

<form method="post">
<input class="form-control" required name="url" size="50" placeholder="Enter source URL with https://" />
<input name="submit" type="submit" class="btn btn-success mt-1 btn-outline-white"/>
</form>

<!-- Start PHP Code -->
<?php
    if (!isset($_POST['submit'])) die();

    // folder to save downloaded files to. must end with slash
    $destination_folder = '';

    $url = $_POST['url'];
    $newfname = $destination_folder . basename($url);

    $file = fopen ($url, "rb");
    if ($file) {
      $newf = fopen ($newfname, "wb");

      if ($newf)
      while(!feof($file)) {
        fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
      }
    }

    if ($file) {
      fclose($file);
    }

    if ($newf) {
      fclose($newf);
    }
?>
</body>
</html> 
