<?php
session_start();
include '../../private/conn.php';
require_once('../classes/worker.class.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$userid = $_POST['userid'];
$role = null;

$updateWorker = new worker();
$updateWorker->updateWorker($conn,$firstname,$lastname,$email,$password,$userid);
?>