<?php
session_start();
include '../../private/conn.php';
require_once('../classes/login.class.php');

$email = $_POST['email'];
$password = $_POST['password'];

$login = new loginaccount($conn, $email,$password);
$login->login($conn, $email,$password);

header('location: ../index.php?page=carrieroverview');
?>