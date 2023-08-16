<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  // Include the database connection
  include_once "./controllers/conncet.php";
  if (empty($_GET['page']) || !ctype_alnum(str_replace(['-', '_'], '', $_GET['page'])) || !file_exists("pages/{$_GET['page']}.php")) {
        die(header('Location: ?page=login'));
    }
  require_once "pages/{$_GET['page']}.php";
    

  ?>
  
</body>
</html>
