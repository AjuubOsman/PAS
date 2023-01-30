<?php
session_start();
include '../../private/conn.php';

$packageid = $_POST['packageid'];
$statusid = $_POST['statusid'];

$stmt = $conn->prepare("UPDATE package SET statusid = :statusid WHERE packageid = :packageid ");
$stmt->bindParam(':statusid', $statusid);
$stmt->bindParam(':packageid', $packageid);
$stmt->execute();
var_dump($_POST);
header('location: ../index.php?page=claimedpackages');