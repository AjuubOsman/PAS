<?php
include '../../private/conn.php';

session_start();
$userid = $_SESSION['userid'];
$packageid = $_GET['packageid'];
echo $packageid;


$stmt = $conn->prepare("UPDATE package  SET claimedby = :claimedby WHERE packageid = :packageid");
$stmt->bindParam(':claimedby', $userid);
$stmt->bindParam(':packageid', $packageid);
$stmt->execute();

$stmt2 = $conn->prepare("UPDATE package  SET statusid = 2 WHERE packageid = :packageid");
$stmt2->bindParam(':packageid', $packageid);
$stmt2->execute();

header('location: ../index.php?page=claimedpackages');
