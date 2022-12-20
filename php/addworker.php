<?php
session_start();
include '../../private/conn.php';
require_once('../classes/worker.class.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = hash('sha512', $_POST['password']);
$role = 'worker';

$addWorker = new worker();
$addWorker->addWorker($conn, $firstname, $lastname, $email, $password, $role);

?>
