<?php
include '../../private/conn.php';
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
$measurements = $lengte * $breedte * $hoogte;



$stmt = $conn->prepare("INSERT INTO package (senderadres,weight,receiveradres,measurements,contactinformation,userid)
                        VALUES(:senderadres,:weight,:receiveradres,:measurements,:contactinformation,:userid)");
$stmt->bindParam(':senderadres', $senderadres);
$stmt->bindParam(':weight', $weight);
$stmt->bindParam(':receiveradres', $receiveradres);
$stmt->bindParam(':measurements', $measurements);
$stmt->bindParam(':contactinformation', $contactinformation);
$stmt->bindParam(':userid', $userid);
$stmt->execute();

$packageid = $conn->lastInsertId();




if(isset($_POST['packageregister'])){

    $packagechoose = $_POST['packageregister'];
echo $packagechoose;

        if( $packagechoose == 'insuranced'){

            $stmt = $conn->prepare("UPDATE package SET insuranced = 'true' WHERE packageid = :packageid ");
            $stmt->bindParam(':packageid', $packageid);
            $stmt->execute();
        }
        elseif($packagechoose == 'rushdelivery') {

            $stmt2 = $conn->prepare("UPDATE package SET rushdelivery = 'true' WHERE packageid = :packageid ");
            $stmt2->bindParam(':packageid', $packageid);
            $stmt2->execute();
        }



}
