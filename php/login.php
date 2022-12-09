<?php
session_start();
include '../../private/conn.php';
require_once('../classes/login.class.php');

$email = $_POST['email'];
$password = $_POST['psw'];


    $login = new loginaccount();
    $login->login($conn, $email,$password);

?>