x<?php
include '../../private/conn.php';

$userid = $_POST['userid'];

$status = $_POST['action'];


$date = date("Y-m-d", strtotime("+2 months"));
$dateapproved = null;

if ($status == 'disapprove') {

    $stmt = $conn->prepare("UPDATE carrier SET status = :status , cd = :cd  where userid = :userid");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':cd', $date);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();

}else{

    $stmt = $conn->prepare("UPDATE carrier SET status = :status , cd = :cd, positionid = 1  where userid = :userid");
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':cd', $dateapproved);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();

}






header('location: ../index.php?page=carrierrequest  ');