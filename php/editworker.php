<?php
session_start();
include '../../private/conn.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$userid = $_POST['userid'];


$stmt = $conn->prepare("UPDATE user  SET firstname = :firstname,lastname = :lastname, email = :email, password = :password WHERE   userid = :userid ");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':userid', $userid);
$stmt->execute();
header('location: ../index.php?page=workeroverview');
?>