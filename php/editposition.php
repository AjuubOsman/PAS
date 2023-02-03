<?php
session_start();
include '../../private/conn.php';


$positionid = $_POST['positionid'];
$userid = $_POST['userid'];



$stmt = $conn->prepare("UPDATE carrier SET positionid = :positionid WHERE userid = :userid ");
$stmt->bindParam(':positionid', $positionid);
$stmt->bindParam(':userid', $userid);
$stmt->execute();


header('location: ../index.php?page=carrieroverview');