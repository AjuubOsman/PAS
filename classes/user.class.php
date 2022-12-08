<?php

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

    public function __construct($firstname, $middlename, $lastname, $dob, $postalcode, $city, $housenumber, $phonenumber, $email, $password, $userid)
    {
        $this->firstname = $firstname;
        $this->middlename = $middlename;
        $this->lastname = $lastname;
        $this->dob = $dob;
        $this->postalcode = $postalcode;
        $this->city = $city;
        $this->housenumber = $housenumber;
        $this->phonenumber = $phonenumber;
        $this->email = $email;
        $this->password = $password;
        $this->userid = $userid;

    }

    function register($conn, $firstname, $middlename, $lastname, $dob, $postalcode, $city, $housenumber, $phonenumber, $email, $password)
    {
        $stmt = $conn->prepare("INSERT INTO user (firstname,middlename,lastname,dob,postalcode,city,housenumber,phonenumber,email,password)
                        VALUES(:firstname,:middlename,:lastname,:dob,:postalcode,:city,:housenumber,:phonenumber,:email,:password)");
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
        $stmt->execute();
    }
}

?>