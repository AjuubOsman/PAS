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
$role = $_POST['role'];


if ($role == 'customer') {

    if ($password == $passwordrepeat) {


        $stmtregister = $conn->prepare("insert into users (firstname, middlename,lastname,dob,postalcode,city,housenumber,phonenumber,email,password,role)
                                                   values(:firstname, :middlename, :lastname,:dob,:postalcode,:city,:housenumber,:phonenumber,:email,:password,:role)");
        $stmtregister->bindParam(':firstname', $firstname);
        $stmtregister->bindParam(':middlename', $middlename);
        $stmtregister->bindParam(':lastname', $lastname);
        $stmtregister->bindParam(':dob', $dob);
        $stmtregister->bindParam(':postalcode', $postalcode);
        $stmtregister->bindParam(':city', $city);
        $stmtregister->bindParam(':housenumber', $housenumber);
        $stmtregister->bindParam(':phonenumber', $phonenumber);
        $stmtregister->bindParam(':email', $email);
        $stmtregister->bindParam(':password', $password);
        $stmtregister->execute();


        $_SESSION['userid'] = $conn->lastInsertId();

        header('location: ../index.php?page=registerpackage');
    } else {

        $_SESSION['melding2'] = 'Wachtwoorden komen niet overeen, probeer het opnieuw.';
        header('location: ../index.php?page=register');
    }

}else{

    $name = $_POST['name'];
    $company = $_POST['company'];
    $capacity= $_POST['capacity'];

    $stmtcarrier = $conn->prepare("insert into users (name, company,capacity)
                                                   values(:name, :company, :capacity)");
    $stmtcarrier->bindParam(':name', $name);
    $stmtcarrier->bindParam(':company', $company);
    $stmtcarrier->bindParam(':capacity', $capacity);
    $stmtcarrier->execute();


    $_SESSION['userid'] = $conn->lastInsertId();

    header('location: ../index.php?page=packageoverview');

}


