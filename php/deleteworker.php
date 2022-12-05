<?php
include '../../private/conn.php';
require_once('../classes/worker.class.php');


$userid = $_GET['userid'];
$firstname = null;
$lastname = null;
$email = null;
$password = null;
$role = null;


$addWorker = new worker($firstname,$lastname,$email,$password,$role,$userid);
$addWorker->deleteWorker($conn,$userid);

header('location: ../index.php?page=workeroverview');
