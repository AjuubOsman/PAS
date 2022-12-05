<?php
session_start();
include '../../private/conn.php';
require_once('../classes/user.class.php');

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


$register = new user($conn,$firstname,$middlename,$lastname,$dob,$postalcode,$city,$housenumber,$phonenumber,$email,$password);
$register->register($conn,$firstname,$middlename,$lastname,$dob,$postalcode,$city,$housenumber,$phonenumber,$email,$password);

?>