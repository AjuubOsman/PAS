<?php
session_start();
include '../../private/conn.php';
require_once('../classes/user.class.php');






$password = $_POST['psw'];
$passwordrepeat = $_POST['pswrepeat'];


$roles = $_POST['role'];
if ($password == $passwordrepeat) {

    if ($roles == 'customer') {
        $email = $_POST['email'];

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $middlename = $_POST['middlename'];
        $dob = $_POST['dob'];
        $postalcode = $_POST['postalcode'];
        $city = $_POST['city'];
        $housenumber = $_POST['housenumber'];
        $phonenumber = $_POST['phonenumber'];
        $role = 'customer';
        $register = new user();
        $register->registercustomer($conn, $firstname, $middlename, $lastname, $dob, $postalcode, $city, $housenumber, $phonenumber, $email, $password, $role);
    } else {
        $email = $_POST['email'];

        $name = $_POST['name'];
        $capacity = $_POST['capacity'];
        $company = $_POST['company'];
        $role = 'carrier';
        $status = 'pending';
        $registercarrier = new user();
        $registercarrier->registercarrier($conn, $name, $company, $capacity, $email, $password, $role, $status);
    }
}else{

    $_SESSION['notification'] = 'De wachtwoorden komen niet overeen.';
    header('location: ../index.php?page=register&role='. $roles);
}

?>