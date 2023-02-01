<?php
include '../../private/conn.php';

session_start();

$userid = $_SESSION['userid'];
$packageid = $_GET['packageid'];

$sql = "SELECT positionid FROM
             carrier where userid = :userid";
$queryid = $conn->prepare($sql);
$queryid->bindParam(':userid', $userid);
$queryid->execute();
$rowid = $queryid->fetch(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("UPDATE package  SET claimedby = :claimedby, positionid = :positionid WHERE packageid = :packageid");
$stmt->bindParam(':claimedby', $userid);
$stmt->bindParam(':positionid', $rowid['positionid']);
$stmt->bindParam(':packageid', $packageid);
$stmt->execute();

$stmt2 = $conn->prepare("UPDATE package  SET statusid = 2 WHERE packageid = :packageid");
$stmt2->bindParam(':packageid', $packageid);
$stmt2->execute();


header('location: ../index.php?page=packageoverview');
