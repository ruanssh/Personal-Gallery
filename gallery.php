<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>View</title>
    <link rel="stylesheet" href="style/gallery.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://i.imgur.com/yByguWH.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <h1>Gallery</h1>
        <div class="cont">
            <a href="index.php">Upload a file</a>
        </div>
        <div class="gallery">
        <?php include 'load.php'; ?>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>
