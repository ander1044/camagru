<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body
    {
        margin: 0;
        padding: 0;
        background: #ccc;
    }
    .thumbnails
    {
        width: 30%;
        float: left;
        margin: 10px;
        background: black;
        padding: 20%;
        boxsizing: border_box;
    }
    .thumbnails img
    {
        width: 100%;
        height: auto;
    }
    </style>
</head>
<body>
    <main>
    <?php
    $dir = glob('uploads/{*.jpeg, *jpg}', GLOB_BRACE);
    foreach ($dir as $value)
    {
        ?>
        <div class="thumbnails">
        <img src="<?php echo $value;?>" alt="<?php?>">
        <div>
    <?php
    }
    ?>
    </main>
</body>
</html>