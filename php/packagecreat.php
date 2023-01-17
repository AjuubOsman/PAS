<?php
include '../../private/conn.php';
session_start();

$weight = $_POST['weight'];

$senderadres = $_POST['senderadres'];
$weight = $_POST['weight'];
$receiveradres = $_POST['receiveradres'];
$contactinformation = $_POST['contactinformation'];
$length = $_POST['length'];
$width = $_POST['width'];
$height = $_POST['height'];
$userid = $_POST['userid'];
$insuranced = isset($_POST['insured']) ? 1 : 0;
$rushdelivery = isset($_POST['rushdelivery']) ? 1 : 0;


if ($length >=  177  || $width >=  79 || $height >=  59 || $weight >=  31 ){

    echo 'Het pakket is te lang/ te breed/ te hoog .';
    $_SESSION['notification'] = 'Het pakket is te lang/ te breed/ te hoog .';
    //header('location: ../index.php?page=registerpackage');

}
elseif ($length > 38 && $length <176 || $width >  26.5 && $width <78.5 || $height >  3.2 && $height <58 || $weight >  10 && $weight <=30) {

    $price = '11.44';
    echo '<pre>'; print_r($_POST); echo '</pre>';
    echo $price;

//    $stmt = $conn->prepare("INSERT INTO package (senderadres,weight,receiveradres,length,width,height,price,contactinformation,userid, rushdelivery, insuranced)
//                        VALUES(:senderadres,:weight,:receiveradres,:height,:width,:height,:price,:contactinformation,:userid, :rushdelivery, :insuranced)");
//    $stmt->bindParam(':senderadres', $senderadres);
//    $stmt->bindParam(':weight', $weight);
//    $stmt->bindParam(':receiveradres', $receiveradres);
//    $stmt->bindParam(':length', $length);
//    $stmt->bindParam(':width', $width);
//    $stmt->bindParam(':height', $height);
//    $stmt->bindParam(':contactinformation', $contactinformation);
//    $stmt->bindParam(':userid', $userid);
//    $stmt->bindParam(':rushdelivery', $rushdelivery);
//    $stmt->bindParam(':insuranced', $insuranced);
//    $stmt->bindParam(':price', $price);
//    $stmt->execute();

    //header('location: ../index.php?page=mypackages');
    }elseif ($length <= 38 && $width <=  26.5 && $height <=  3.2 && $weight <= 10){


    $price = '5.85';
    echo '<pre>'; print_r($_POST); echo '</pre>';
echo $price;
//    $stmt = $conn->prepare("INSERT INTO package (senderadres,weight,receiveradres,length,width,height,price,contactinformation,userid, rushdelivery, insuranced)
//                        VALUES(:senderadres,:weight,:receiveradres,:height,:width,:height,:price,:contactinformation,:userid, :rushdelivery, :insuranced)");
//    $stmt->bindParam(':senderadres', $senderadres);
//    $stmt->bindParam(':weight', $weight);
//    $stmt->bindParam(':receiveradres', $receiveradres);
//    $stmt->bindParam(':length', $length);
//    $stmt->bindParam(':width', $width);
//    $stmt->bindParam(':height', $height);
//    $stmt->bindParam(':contactinformation', $contactinformation);
//    $stmt->bindParam(':userid', $userid);
//    $stmt->bindParam(':rushdelivery', $rushdelivery);
//    $stmt->bindParam(':insuranced', $insuranced);
//    $stmt->bindParam(':price', $price);
//    $stmt->execute();


}
