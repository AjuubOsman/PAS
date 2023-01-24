<?php
class user
{
    public

    function registercustomer($conn, $firstname, $middlename, $lastname, $dob, $postalcode, $city, $housenumber, $phonenumber, $email, $password, $role)
    {
        $sql = "SELECT email FROM user WHERE email = :email";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'user');
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        if ($query->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO user (email,password,role)
                        VALUES(:email,:password,:role)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedpassword);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $_SESSION['role'] = 'customer';
            $_SESSION['userid'] = $conn->lastInsertId();

            $stmt1 = $conn->prepare("INSERT INTO customer (userid,firstname,middlename,lastname,dob,postalcode,city,housenumber,phonenumber)
                        VALUES(:userid,:firstname,:middlename,:lastname,:dob,:postalcode,:city,:housenumber,:phonenumber)");
            $stmt1->bindParam(':userid', $_SESSION['userid']);
            $stmt1->bindParam(':firstname', $firstname);
            $stmt1->bindParam(':middlename', $middlename);
            $stmt1->bindParam(':lastname', $lastname);
            $stmt1->bindParam(':dob', $dob);
            $stmt1->bindParam(':postalcode', $postalcode);
            $stmt1->bindParam(':city', $city);
            $stmt1->bindParam(':housenumber', $housenumber);
            $stmt1->bindParam(':phonenumber', $phonenumber);
            $stmt1->execute();

            header('location: ../index.php?page=homepage ');
        } else {
            $_SESSION['notification'] = 'Deze email is niet beschikbaar.';
            header('location: ../index.php?page=register&role=' . $role);
        }
    }
    function registercarrier($conn, $name, $company, $capacity, $email, $password, $role, $status)
    {
        $sql = "SELECT email FROM user WHERE email = :email";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS, 'user');
        $hashedpassword1 = password_hash($password, PASSWORD_DEFAULT);

        if ($query->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO user (email,password,role)
                        VALUES(:email,:password,:role)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedpassword1);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
            $_SESSION['role'] = 'carrier';
            $_SESSION['userid'] = $conn->lastInsertId();

            $stmt1 = $conn->prepare("INSERT INTO carrier (userid,name,company,capacity,status)
                        VALUES(:userid,:name,:company,:capacity,:status)");
            $stmt1->bindParam(':userid', $_SESSION['userid']);
            $stmt1->bindParam(':name', $name);
            $stmt1->bindParam(':company', $company);
            $stmt1->bindParam(':capacity', $capacity);
            $stmt1->bindParam(':status', $status);
            $stmt1->execute();

            header('location: ../index.php?page=packageoverview ');
        } else {
            $_SESSION['notification'] = 'Deze email is niet beschikbaar.';
            header('location: ../index.php?page=register&role=' . $role);
        }
    }
}?>