<?php
//session_start();
class user
{
    public
        $firstname,
        $middlename,
        $lastname,
        $dob,
        $postalcode,
        $city,
        $housenumber,
        $phonenumber,
        $email,
        $password;




    function registercustomer($conn,$firstname,$middlename,$lastname,$dob,$postalcode,$city,$housenumber,$phonenumber,$email,$password,$role)
    {
        $sql = "SELECT email FROM user WHERE email = :email";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'user');

        $sql = "SELECT email FROM carrier WHERE email = :email";
        $query1 = $conn->prepare($sql);
        $query1->bindParam(':email', $email);
        $query1->execute();
        $query1->setFetchMode(PDO::FETCH_CLASS, 'user');


        if ($query->rowCount() == 0 AND $query1->rowCount() == 0) {


            $stmt = $conn->prepare("INSERT INTO user (firstname,middlename,lastname,dob,postalcode,city,housenumber,phonenumber,email,password,role)
                        VALUES(:firstname,:middlename,:lastname,:dob,:postalcode,:city,:housenumber,:phonenumber,:email,:password,:role)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':middlename', $middlename);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':postalcode', $postalcode);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':housenumber', $housenumber);
            $stmt->bindParam(':phonenumber', $phonenumber);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $_SESSION['role'] = 'customer';
            $_SESSION['userid'] = $conn->lastInsertId();
            header('location: ../index.php?page=homepage ');
        }
        else{
            $_SESSION['notification'] = 'This email is not available.';
            header('location: ../index.php?page=register&role='. $role);

        }
    }


    function registercarrier($conn,$name,$company,$capacity, $email, $password,$role,$status)
    {

        $sql = "SELECT email FROM user WHERE email = :email";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'user');

        $sql = "SELECT email FROM user WHERE email = :email";
        $query1 = $conn->prepare($sql);
        $query1->bindParam(':email', $email);
        $query1->execute();
        $query1->setFetchMode(PDO::FETCH_CLASS, 'user');

        if ($query->rowCount() == 0 AND $query1->rowCount() == 0) {


            $stmt = $conn->prepare("INSERT INTO carrier (name,company,capacity,email,password,role,status)
                        VALUES(:name,:company,:capacity,:email,:password,:role,:status)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':capacity', $capacity);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            $_SESSION['role'] = 'carrier';
            $_SESSION['carrierid'] = $conn->lastInsertId();
            header('location: ../index.php?page=packageoverview ');


        }else{
            $_SESSION['notification'] = 'This email is not available.';
            header('location: ../index.php?page=register&role='. $role);

        }

    }



    function login($conn, $email, $password)
    {

        $sql = "SELECT role, userid FROM user WHERE email = :email AND password = :password";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'user');





        $sql = "SELECT carrierid, role FROM carrier WHERE email = :email AND password = :password";
        $query1 = $conn->prepare($sql);
        $query1->bindParam(':email', $email);
        $query1->bindParam(':password', $password);
        $query1->setFetchMode(PDO::FETCH_CLASS, 'user');
        $query1->execute();


        if ($query['role'] == 'customer'){

            header('location: ../index.php?page=homepage ');
        }
        elseif ($query1['role'] == 'carrier'){
            header('location: ../index.php?page=packageoveriew ');
        }elseif($query['role'] == 'worker'){

            header('location: ../index.php?page=carrieroverview ');

        } elseif($query['role'] == 'admin'){

            header('location: ../index.php?page=workeroverview ');

        }


    }
}



?>