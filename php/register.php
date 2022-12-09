<?php
session_start();
include '../../private/conn.php';
require_once('../classes/user.class.php');








$roles = $_POST['role'];


if ($roles == 'customer') {
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $dob = $_POST['dob'];
    $postalcode = $_POST['postalcode'];
    $city = $_POST['city'];
    $housenumber = $_POST['housenumber'];
    $phonenumber = $_POST['phonenumber'];
    $role = 'customer';
    $register = new user($conn, $firstname, $middlename, $lastname, $dob, $postalcode, $city, $housenumber, $phonenumber, $email, $password,$role);
    $register->registercustomer($conn, $firstname, $middlename, $lastname, $dob, $postalcode, $city, $housenumber, $phonenumber, $email, $password, $role);
}else{
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $name = $_POST['name'];
    $capacity = $_POST['capacity'];
    $company = $_POST['company'];
    $role = 'carrier';
    $status = 'pending';
    $registercarrier = new user($conn, $name ,$company,$capacity, $email, $password,$role,$status);
    $registercarrier->registercarrier($conn,$name,$company,$capacity, $email, $password,$role,$status);
}
?>