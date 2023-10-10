<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Índice</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/indexof.css">
    <link rel="shortcut icon" href="https://i.imgur.com/yByguWH.png" type="image/x-icon">
</head>
<body>
    <div id="container">
        <h1>Index Of</h1>
        <?php
        $dir = './img';

        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != '.' && $file != '..') {
                        echo '<div class="file-item"><a class="file-link" href="/Others/upload/img/' . $file . '" target="_blank">' . $file . '</a><a class="download-button" href="/Others/upload/img/' . $file . '" download>Download</a></div>';
                    }
                }

                closedir($dh);
            }
        }
        ?>
    </div>
    <script src="/Others/upload/script.js"></script>
</body>
</html>
