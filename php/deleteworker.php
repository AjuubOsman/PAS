<?php
include '../../private/conn.php';
require_once('../classes/worker.class.php');

$userid = $_GET['userid'];

$addWorker = new worker();
$addWorker->setUserid($userid);
$addWorker->deleteWorker($conn);

header('location: ../index.php?page=workeroverview');



