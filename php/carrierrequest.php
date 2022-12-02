<?php
include '../../private/conn.php';

$carrierid = $_POST['carrierid'];

$status = $_POST['action'];


$date = date("Y-m-d", strtotime("+2 months"));
$dateapproved = null;

if ($status == 'disapprove') {

    $stmt = $conn->prepare("UPDATE carrier SET status = :status , cd = :cd  where carrierid = :carrierid");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':cd', $date);
    $stmt->bindParam(':carrierid', $carrierid);
    $stmt->execute();

}else{

    $stmt = $conn->prepare("UPDATE carrier SET status = :status , cd = :cd  where carrierid = :carrierid");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':cd', $dateapproved);
    $stmt->bindParam(':carrierid', $carrierid);
    $stmt->execute();
}






header('location: ../index.php?page=carrierrequest  ');