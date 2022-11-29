<?php
session_start();
include '../../private/conn.php';


$password = $_POST['psw'];
$passwordrepeat = $_POST['pswrepeat'];
$email = $_POST['email'];
$role = $_POST['role'];


if ($role == 'customer') {

        if ($password == $passwordrepeat) {

            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $dob = $_POST['dob'];
            $postalcode = $_POST['postalcode'];
            $city = $_POST['city'];
            $housenumber = $_POST['housenumber'];
            $phonenumber = $_POST['phonenumber'];



            $stmtregister = $conn->prepare("insert into users (firstname, middlename,lastname,dob,postalcode,city,housenumber,phonenumber,email,password,role)
                                                       values(:firstname, :middlename, :lastname,:dob,:postalcode,:city,:housenumber,:phonenumber,:email,:password,:role)");
            $stmtregister->bindParam(':firstname', $firstname);
            $stmtregister->bindParam(':middlename', $middlename);
            $stmtregister->bindParam(':lastname', $lastname);
            $stmtregister->bindParam(':dob', $dob);
            $stmtregister->bindParam(':postalcode', $postalcode);
            $stmtregister->bindParam(':city', $city);
            $stmtregister->bindParam(':housenumber', $housenumber);
            $stmtregister->bindParam(':phonenumber', $phonenumber);
            $stmtregister->bindParam(':email', $email);
            $stmtregister->bindParam(':password', $password);
            $stmtregister->execute();


            $_SESSION['userid'] = $conn->lastInsertId();

            header('location: ../index.php?page=registerpackage');
        } else {

            $_SESSION['melding2'] = 'Wachtwoorden komen niet overeen, probeer het opnieuw.';
            header('location: ../index.php?page=register&role='. $role);
        }

    }else{
        if ($password == $passwordrepeat) {

        $name = $_POST['name'];
        $company = $_POST['company'];
        $capacity = $_POST['capacity'];

        $stmtcarrier = $conn->prepare("insert into carrier (name, company,capacity,email,password)
                                                       values(:name, :company, :capacity, :email, :password)");
        $stmtcarrier->bindParam(':name', $name);
        $stmtcarrier->bindParam(':company', $company);
        $stmtcarrier->bindParam(':capacity', $capacity);
        $stmtcarrier->bindParam(':email', $email);
        $stmtcarrier->bindParam(':password', $password);
        $stmtcarrier->execute();


        $_SESSION['userid'] = $conn->lastInsertId();

        header('location: ../index.php?page=packageoverview');
        } else {

            $_SESSION['melding2'] = 'Wachtwoorden komen niet overeen, probeer het opnieuw.';
            header('location: ../index.php?page=register&role='. $role);
        }
}


