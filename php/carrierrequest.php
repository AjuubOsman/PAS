<?php
include '../../private/conn.php';

$carrierid = $_POST['carrierid'];

$status = $_POST['action'];


if ($status == 'approve') {

    $stmt = $conn->prepare("UPDATE carrier SET status =  :status  where carrierid = :carrierid");
    $stmt ->bindParam(':status' , $status);
    $stmt->bindParam(':carrierid', $carrierid);
    $stmt->execute();

} else{
    $stmt = $conn->prepare("UPDATE carrier SET status =  :status  where carrierid = :carrierid");
    $stmt ->bindParam(':status' , $status);
    $stmt->bindParam(':carrierid', $carrierid);
    $stmt->execute();

}
header('location: ../index.php?page=carrierrequest  ');