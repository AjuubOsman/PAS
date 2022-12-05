<?php

class worker
{

//    public
//        $firstname,
//        $lastname,
//        $email,
//        $password,
//        $role,
//        $userid;


//    public function __construct($firstname, $lastname, $email,$password,$role,$userid)
//    {
//
//        $this->firstname = $firstname;
//        $this->lastname = $lastname;
//        $this->email = $email;
//        $this->password = $password;
//        $this->role = $role;
//        $this->userid = $userid;
//
//    }

    function addWorker($conn,$firstname,$lastname,$email,$password,$role) {
        $stmt = $conn->prepare("INSERT INTO user (firstname,lastname, email,password,role)
                        VALUES(:firstname, :lastname, :email,:password,:role)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
    }


    function checkEmail($conn,$firstname,$lastname,$email,$password,$role)
    {
        $sql = 'SELECT userid, email FROM user where email = :email ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_CLASS, 'worker');
        if ($stmt->rowCount() == 0){

            $this->addWorker($conn,$firstname,$lastname,$email,$password,$role);
            header('location: ../index.php?page=workeroverview ');

        }else{
            $_SESSION['notification'] = 'This email is not available.';
            header('location: ../index.php?page=addworker ');

        }
    }


    function updateWorker($conn,$firstname,$lastname,$email,$password,$userid){

        $stmt = $conn->prepare("UPDATE user  SET firstname = :firstname,lastname = :lastname, email = :email, password = :password WHERE userid = :userid ");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password',$password);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
        header('location: ../index.php?page=workeroverview');
    }



    function  deleteWorker ($conn,$userid) {
        $stmt = $conn->prepare("DELETE FROM user WHERE userid = :userid");
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
    }



}



