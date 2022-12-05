<?php
include '../../private/conn.php';
require_once('../classes/worker.class.php');


$userid = $_GET['userid'];

//$deleteWorker = new worker();
//$deleteWorker->deleteWorker($conn,$userid);

worker::deleteWorker($conn,$userid);

header('location: ../index.php?page=workeroverview');
