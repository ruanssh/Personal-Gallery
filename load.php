<?php
$dir = 'img/';
$files = scandir($dir);
foreach ($files as $file) 
{
    if (in_array($file, array('.', '..'))) continue;

    // Verificar se o arquivo é uma imagem, gif ou vídeo
    $file_type = mime_content_type($dir . $file);
    if (!preg_match('/^image\/|^video\/|^application\/(svg\+xml)/', $file_type)) continue;

    echo "<div class='image-container'><a href='$dir/$file' target='_blank'><img src='$dir/$file'></a><form method='POST'><input type='hidden' name='filename' value='$file'><button type='submit' name='delete' class='delete-btn'>Excluir</button></form></div>";
}

if (isset($_POST['delete'])) 
{
    $filename = $_POST['filename'];
    if (file_exists($dir . $filename)) 
    {
        unlink($dir . $filename);
        echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>
