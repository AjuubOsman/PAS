<?php
session_start();

include 'classes/worker.class.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}else{
    $page='homepage';
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Package Pick-up Service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">



</head>
<body>
<?php include 'includes/navbar.inc.php'; ?>
<?php include 'includes/'.$page.'.inc.php'; ?>


</body>
</html>
