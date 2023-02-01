<?php
session_start();
include '../../private/conn.php';

$packageid = $_POST['packageid'];
$statusid = $_POST['statusid'];
$userid = $_SESSION['userid'];


//if ($statusid = 6) {
//    $stmt = $conn->prepare("UPDATE package SET claimedby = NULL WHERE packageid = :packageid ");
//    $stmt->bindParam(':packageid', $packageid);
//    $stmt->execute();
//
//}

$stmt = $conn->prepare("UPDATE package SET statusid = :statusid WHERE packageid = :packageid ");
$stmt->bindParam(':statusid', $statusid);
$stmt->bindParam(':packageid', $packageid);
$stmt->execute();


header('location: ../index.php?page=claimedpackages');