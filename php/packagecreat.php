<?php
include '../../private/conn.php';
$senderadres = $_POST['senderadres'];
$weight = $_POST['weight'];
$receiveradres = $_POST['receiveradres'];
$contactinformation = $_POST['contactinformation'];
$lengte = $_POST['lengte'];
$breedte = $_POST['breedte'];
$hoogte = $_POST['hoogte'];
$insuranced = $_POST['insuranced'];
$rushdelivery = $_POST['rushdelivery'];
$userid = $_POST['userid'];
$measurements = $lengte * $breedte * $hoogte;



//$stmt = $conn->prepare("INSERT INTO package (senderadres,weight,receiveradres,measurements,contactinformation,userid)
//                        VALUES(:senderadres,:weight,:receiveradres,:measurements,:contactinformation,:userid)");
//$stmt->bindParam(':senderadres', $senderadres);
//$stmt->bindParam(':weight', $weight);
//$stmt->bindParam(':receiveradres', $receiveradres);
//$stmt->bindParam(':measurements', $measurements);
//$stmt->bindParam(':contactinformation', $contactinformation);
//$stmt->bindParam(':userid', $userid);
//$stmt->execute();

$packageid = $conn->lastInsertId();

if($insuranced == true OR $rushdelivery == true){
    var_dump($insuranced,$rushdelivery);

}