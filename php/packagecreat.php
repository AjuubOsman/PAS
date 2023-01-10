<?php
include '../../private/conn.php';
session_start();

$weight = $_POST['weight'];
if ($weight <= 10) {
    $_SESSION['price'] = 5.85;
}else{
    $_SESSION['price'] = 11.44;
}
$senderadres = $_POST['senderadres'];
$weight = $_POST['weight'];
$receiveradres = $_POST['receiveradres'];
$contactinformation = $_POST['contactinformation'];
$lengte = $_POST['lengte'];
$breedte = $_POST['breedte'];
$hoogte = $_POST['hoogte'];
$userid = $_POST['userid'];
$insuranced = isset($_POST['insured']) ? 1 : 0;
$rushdelivery = isset($_POST['rushdelivery']) ? 1 : 0;
$measurements = $lengte * $breedte * $hoogte;
$price = $_SESSION['price'];


    $stmt = $conn->prepare("INSERT INTO package (senderadres,weight,receiveradres,measurements,price,contactinformation,userid, rushdelivery, insuranced)
                        VALUES(:senderadres,:weight,:receiveradres,:measurements,:price,:contactinformation,:userid, :rushdelivery, :insuranced)");
    $stmt->bindParam(':senderadres', $senderadres);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':receiveradres', $receiveradres);
    $stmt->bindParam(':measurements', $measurements);
    $stmt->bindParam(':contactinformation', $contactinformation);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':rushdelivery', $rushdelivery);
    $stmt->bindParam(':insuranced', $insuranced);
    $stmt->bindParam(':price', $price);
    $stmt->execute();

    $packageid = $conn->lastInsertId();

header('location: ../index.php?page=mypackages');
