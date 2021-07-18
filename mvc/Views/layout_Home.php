<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body style="background-color: #EEEEEE">
    <?php  
        require_once "./mvc/Views/block/header.php";
    ?>
    <?php
        require_once "./mvc/Views/page/".$data["page"].".php";
    ?>
    <br>
    <?php
        require_once "./mvc/Views/block/footer.php";
    ?>
</body>
</html>
