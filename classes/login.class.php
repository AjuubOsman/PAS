<?php

class loginaccount
{

    public
        $email,
        $password;


//    public function __construct($email, $password)
//    {
//        $this->email = $email;
//        $this->password = $password;
//    }

    function login($conn, $email, $password)
    {
        $sql = "SELECT role, userid FROM user WHERE email = :email AND password = :password";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);


        $sql = "SELECT carrierid, role FROM carrier WHERE email = :email AND password = :password";
        $query1 = $conn->prepare($sql);
        $query1->bindParam(':email', $email);
        $query1->bindParam(':password', $password);
        $query1->execute();
        $result1 = $query1->fetch(PDO::FETCH_ASSOC);

        if ($query->rowCount() == 1 || $query1->rowCount() == 1) {
            if ($result['role'] == 'customer') {
                $_SESSION['role'] = 'customer';
                $_SESSION['userid'] = $result['userid'];
                header('location: ../index.php?page=homepage ');
            } elseif ($result1['role'] == 'carrier') {
                $_SESSION['role'] = 'carrier';
                $_SESSION['carrierid'] = $result1['carrierid'];
                header('location: ../index.php?page=packageoverview ');
            } elseif ($result['role'] == 'worker') {
                $_SESSION['role'] = 'worker';
                $_SESSION['userid'] = $result['userid'];
                header('location: ../index.php?page=carrieroverview ');

            } elseif ($result['role'] == 'admin') {
                $_SESSION['role'] = 'admin';
                $_SESSION['userid'] = $result['userid'];
                header('location: ../index.php?page=workeroverview ');

            }
        } else {

            $_SESSION['notification'] = 'Email of wachtwoord incorrect, probeer het nogmaals.';
            header('location: ../index.php?page=login ');
        }
    }}

    ?>