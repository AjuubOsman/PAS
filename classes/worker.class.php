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



    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    function addWorker($conn, $firstname, $lastname, $email, $password, $role)
    {

        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;


        $sql = 'SELECT userid, email FROM user where email = :email ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'worker');
        if ($stmt->rowCount() == 0) {

            $stmt = $conn->prepare("INSERT INTO user (firstname,lastname, email,password,role)
                        VALUES(:firstname, :lastname, :email,:password,:role)");
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':role', $this->role);
            $stmt->execute();            header('location: ../index.php?page=workeroverview ');

        } else {
            $_SESSION['notification'] = 'Deze email is niet beschkikbaar.';
            header('location: ../index.php?page=addworker ');

        }
    }



    function workerOverview($conn)
    {

        $sql = "SELECT firstname,lastname, email, userid
        FROM user
        WHERE role = 'worker'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {

            while ($row = $stmt->fetchAll(PDO::FETCH_CLASS, 'worker')) {
                return $row;
            }
        }

    }


    function updateWorker($conn, $firstname, $lastname, $email, $password, $userid)
    {

        $stmt = $conn->prepare("UPDATE user  SET firstname = :firstname,lastname = :lastname, email = :email, password = :password WHERE userid = :userid ");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
        header('location: ../index.php?page=workeroverview');
    }

    function deleteWorker($conn)
    {
        $stmt = $conn->prepare("DELETE FROM user WHERE userid = :userid");
        $stmt->bindParam(':userid', $this->userid);
        $stmt->execute();
        header('location: ../index.php?page=workeroverview');

    }


}


