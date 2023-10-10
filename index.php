<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/index.css">
  <link rel="shortcut icon" href="https://i.imgur.com/yByguWH.png" type="image/x-icon">
  <title>Send</title>
</head>
<body>
  <form enctype="multipart/form-data" method="POST">
      <h1>Enviar arquivo</h1>
      <input type="file" name="pic" required>    
      <br>
      <input type="submit">
      <br>
      <div class="links">
          <a href="gallery.php">Gallery</a> | <a href="indexof.php">Index of</a>
      </div>
  </form>
  <script src="script.js"></script>
</body>
</html>
<?php
if(isset($_FILES['pic']))
{
    $dir = 'img/';
    $new_name = $_FILES['pic']['name'];
    $i = 1;

    // Verifica se o arquivo já existe no diretório de destino
    while(file_exists($dir . $new_name)) {
        $new_name = pathinfo($_FILES['pic']['name'], PATHINFO_FILENAME) . '(' . $i . ').' . pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
        $i++;
    }
    
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir . $new_name);
    ?>
    <script type='text/javascript'>
        alert('Arquivo enviado!');
    </script>
    <?php
    header('Refresh:0; URL=index.php');
} 
?>