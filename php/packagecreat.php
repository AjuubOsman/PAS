<?php
include '../../private/conn.php';

echo "<pre>", print_r($_POST), "</pre>";
$weight = $_POST['weight'];


$senderadres = $_POST['senderadres'];
$weight = $_POST['weight'];
$receiveradres = $_POST['receiveradres'];
$contactinformation = $_POST['contactinformation'];
$lengte = $_POST['lengte'];
$breedte = $_POST['breedte'];
$hoogte = $_POST['hoogte'];
//$insuranced = $_POST['insuranced'];
//$rushdelivery = $_POST['rushdelivery'];
$userid = $_POST['userid'];
$insured = isset($_POST['insured']) ? 1 : 0;
$rushdelivery = isset($_POST['rushdelivery']) ? 1 : 0;
$measurements = $lengte * $breedte * $hoogte;




    $stmt = $conn->prepare("INSERT INTO package (senderadres,weight,receiveradres,measurements,contactinformation,userid, rushdelivery, insuranced)
                        VALUES(:senderadres,:weight,:receiveradres,:measurements,:contactinformation,:userid, :rushdelivery, :insuranced)");
    $stmt->bindParam(':senderadres', $senderadres);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':receiveradres', $receiveradres);
    $stmt->bindParam(':measurements', $measurements);
    $stmt->bindParam(':contactinformation', $contactinformation);
    $stmt->bindParam(':userid', $userid);
    $stmt->bindParam(':rushdelivery', $rushdelivery);
    $stmt->bindParam(':insuranced', $insured);
    $stmt->execute();

    $packageid = $conn->lastInsertId();


