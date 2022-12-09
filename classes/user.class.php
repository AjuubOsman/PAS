<?php
session_start();
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


    function registercarrier($conn,$name,$company,$capacity, $email, $password,$role,$status)
    {
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




    }



    function login($conn, $email, $password)
    {

        $sql = "SELECT role, userid FROM user WHERE email = :email AND password = :password";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $_SESSION['userid'] = $query['userid'];



        $sql = "SELECT carrierid, role FROM carrier WHERE email = :email AND password = :password";
        $query1 = $conn->prepare($sql);
        $query1->bindParam(':email', $email);
        $query1->bindParam(':password', $password);
        $query1->setFetchMode(PDO::FETCH_CLASS, 'user');
        $query1->execute();
        return $_SESSION['carrierid'] = $query1['carrierid'];
    }
}

class loginaccount extends user
{
    public function __construct($conn, $email, $password)
    {
        parent::login($conn, $email,$password);
        $this->email = $email;
        $this->password = $password;
    }
}

?>