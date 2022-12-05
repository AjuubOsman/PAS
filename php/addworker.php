<?php
session_start();
include '../../private/conn.php';
require_once('../classes/worker.class.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 'worker';

$addWorker = new worker($firstname,$lastname,$email,$password,$role);
$addWorker->checkEmail($conn);

?>
