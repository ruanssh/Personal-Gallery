<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/index.css">
  <title>Send</title>
</head>
<body>
  <form enctype="multipart/form-data" method="POST">
      <h1>Enviar arquivo</h1>
      <input type="file" name="pic" required>    
      <br><br>
      <input type="submit">
      <br>
      <div class="links">
      <a href="gallery.php">Gallery</a> | <a href="img/" target="_blank">Index of</a>
      </div>
  </form>
</body>
</html>
<?php
if(isset($_FILES['pic']))
{
  $new_name = $_FILES['pic']['name']; //Definindo um novo nome para o arquivo
  $dir = 'img/'; //Diretório para uploads 
  move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
  ?>
  <script type='text/javascript'>
    alert('Arquivo enviado!');
  </script>
  <meta http-equiv="refresh" content="0; URL='index.php'"/>
<?php
} 
?>