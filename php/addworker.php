<?php
session_start();
include '../../private/conn.php';
require_once('../classes/signup.class.php');


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 'worker';

$addWorker = new addWorker($firstname,$lastname,$email,$password,$role);

 $addWorker->checkEmail($conn);

?>
