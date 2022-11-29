<?php
session_start();
include '../../private/conn.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT role, userid FROM user WHERE email = :email AND password = :password";
$query = $conn->prepare($sql);
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
$query->execute();

$sql = "SELECT carrierid, role FROM carrier WHERE email = :email AND password = :password";
$query1 = $conn->prepare($sql);
$query1->bindParam(':email', $email);
$query1->bindParam(':password', $password);
$query1->execute();


if ($query->rowCount() == 1 || $query1->rowCount() == 1) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $result1 = $query1->fetch(PDO::FETCH_ASSOC);

    if ($result['role'] == "worker") {
        $_SESSION['role'] = "worker";
        $_SESSION['userid'] = $result['userid'];
        header('location: ../index.php?page=homepage');
    } elseif ($result['role'] == "admin") {
        $_SESSION['role'] = "admin";
        $_SESSION['userid'] = $result['userid'];
        header('location: ../index.php?page=homepage');
    } elseif ($result['role'] == "customer") {
        $_SESSION['role'] = "customer";
        $_SESSION['userid'] = $result['userid'];
        header('location: ../index.php?page=homepage');
    } elseif ($result1['role'] == "carrier") {
        $_SESSION['role'] = "carrier";
        $_SESSION['carrierid'] = $result1['carrierid'];
        header('location: ../index.php?page=packageoverview');
    }

} else {
    $_SESSION['notification'] = 'Combinatie gebruikersnaam en Wachtwoord onjuist.';
    header('location: ../index.php?page=login');
}
