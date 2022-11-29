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

if ($query->rowCount() == 1) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
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
        header('location: ../index.php?page=registerpackage');
    }
    elseif ($result['role'] == "carrier") {
        $_SESSION['role'] = "carrier";
        $_SESSION['userid'] = $result['userid'];
        header('location: ../index.php?page=registerpackage');
    }

} else {
    $_SESSION['notification'] = 'Combination username and password incorrect.';
    header('location: ../index.php?page=login'
    );
}
