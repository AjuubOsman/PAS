<?php

class loginaccount
{
    public

    function login($conn, $email, $password)
    {
        $sql = "SELECT role, userid FROM user WHERE email = :email";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT password FROM user WHERE email = :email ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($query->rowCount() == 1) {
            if (password_verify($password, $row['password'])) {
                if ($result['role'] == 'customer') {
                    $_SESSION['role'] = 'customer';
                    $_SESSION['userid'] = $result['userid'];
                    header('location: ../index.php?page=homepage ');
                } elseif ($result['role'] == 'carrier') {
                    $_SESSION['role'] = 'carrier';
                    $_SESSION['userid'] = $result['userid'];
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
        } else {

            $_SESSION['notification'] = 'Email of wachtwoord incorrect, probeer het nogmaals.';
            header('location: ../index.php?page=login ');
        }
    }
}

?>