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


        $sql = 'SELECT email FROM user where email = :email ';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'worker');
        if ($stmt->rowCount() == 0) {

            $stmt = $conn->prepare("INSERT INTO user ( email,password,role)
                        VALUES(:email,:password,:role)");
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':role', $this->role);
            $stmt->execute();
            $dbuserid = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO worker ( firstname,lastname,userid)
                                        VALUES(:firstname,:lastname,:userid)");
            $stmt->bindParam(':firstname', $this->firstname);
            $stmt->bindParam(':lastname', $this->lastname);
            $stmt->bindParam(':userid', $dbuserid);
            $stmt->execute();
            header('location: ../index.php?page=workeroverview ');

        } else {
            $_SESSION['notification'] = 'Deze email is niet beschkikbaar.';
            header('location: ../index.php?page=addworker ');

        }
    }



    function workerOverview($conn)
    {

        $sql = "SELECT w.firstname,w.lastname,w.userid,u.email 
            FROM worker w
            LEFT JOIN user u on w.userid = u.userid
            where w.userid = u.userid";
        $stmt = $conn->prepare($sql);
        $stmt->execute();


        if ($stmt->rowCount() > 0) {

            while ($row = $stmt->fetchAll(PDO::FETCH_CLASS, 'worker')) {
                return $row;
            }
        }

    }


    function updateWorker($conn, $firstname, $lastname, $email, $userid)
    {
        $stmt = $conn->prepare("UPDATE user SET email = :email WHERE userid = :userid ");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        $stmt = $conn->prepare("UPDATE worker SET firstname = :firstname, lastname =:lastname WHERE userid = :userid ");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        header('location: ../index.php?page=workeroverview');
    }

    function deleteWorker($conn)
    {

        $stmt = $conn->prepare("DELETE FROM worker WHERE userid = :userid");
        $stmt->bindParam(':userid', $this->userid);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM user WHERE userid = :userid");
        $stmt->bindParam(':userid', $this->userid);
        $stmt->execute();


        header('location: ../index.php?page=workeroverview');

    }


}


