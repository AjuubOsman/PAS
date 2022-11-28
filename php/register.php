<?php
session_start();
include '../../private/conn.php';

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$postalcode = $_POST['postalcode'];
$city = $_POST['city'];
$housenumber = $_POST['housenumber'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$password = $_POST['psw'];
$passwordrepeat = $_POST['pswrepeat'];


if ($password == $passwordrepeat) {


    $stmtregister = $conn->prepare("insert into users (firstname, middlename,lastname,email,password, role)
                                                   values(:firstname, :middlename, :lastname,:email,:password,:role)");
    $stmtregister->bindParam(':firstname', $firstname);
    $stmtregister->bindParam(':middlename', $middlename);
    $stmtregister->bindParam(':lastname', $lastname);
    $stmtregister->bindParam(':email', $email);
    $stmtregister->bindParam(':password', $password);
    $stmtregister->execute();


    $_SESSION['userid'] = $conn->lastInsertId();

    header('location: ../index.php?page=groups');
} else {

    $_SESSION['melding2'] = 'Wachtwoorden komen niet overeen, probeer het opnieuw.';
    header('location: ../index.php?page=register');
}


?>

