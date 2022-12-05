<?php
session_start();
include '../../private/conn.php';
require_once('../classes/worker.class.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 'worker';
$userid = null;

$addWorker = new worker($firstname,$lastname,$email,$password,$role,$userid);
$addWorker->checkEmail($conn);

?>
