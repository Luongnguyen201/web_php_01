<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/bootstrap/css/bootstrap.css">
    <link href="./public/css/style.css" rel="stylesheet" media="all and (max-width: 1024px)">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php require_once './mvc/Views/block/manage_header_View.php';?>
    <?php require_once './mvc/Views/block/manage_left_function_View.php'; ?>
    <?php require_once './mvc/Views/page/'.$data["page"].'.php'; ?>
    <?php require_once "./mvc/Views/block/manage_footer_View.php"; ?>
    <script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>