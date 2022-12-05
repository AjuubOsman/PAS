<?php

class worker
{

    public
        $firstname,
        $lastname,
        $email,
        $password,
        $role,
        $userid;


    public function __construct($firstname, $lastname, $email,$password,$role,$userid)
    {

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->userid = $userid;

    }

    function addWorker($conn) {
        $stmt = $conn->prepare("INSERT INTO user (firstname,lastname, email,password,role)
                        VALUES(:firstname, :lastname, :email,:password,:role)");
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        $stmt->execute();
    }


    function checkEmail($conn)
    {
        $sql = 'SELECT userid, email FROM user where email = :email ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_CLASS, 'worker');
        if ($stmt->rowCount() == 0){

            $this->addWorker($conn);
            header('location: ../index.php?page=workeroverview ');

        }else{
            $_SESSION['notification'] = 'This email is not available.';
            header('location: ../index.php?page=addworker ');

        }
    }


    function updateWorker($conn){

        $stmt = $conn->prepare("UPDATE user  SET firstname = :firstname,lastname = :lastname, email = :email, password = :password WHERE userid = :userid ");
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':userid', $this->userid);
        $stmt->execute();
        header('location: ../index.php?page=workeroverview');
    }


    function set_id($conn){



    }

      static function deleteWorker ($conn,$userid) {
        $stmt = $conn->prepare("DELETE FROM user WHERE userid = :userid");
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
    }


}


