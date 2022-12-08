<?php

class loginaccount
{
    public
        $email,
        $password;

()
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function login($conn, $email, $password)
    {
        $sql = "SELECT userid, role FROM user WHERE email = :email AND password = :password";
        $query = $conn->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();

        $sql = "SELECT carrierid, role FROM carrier WHERE email = :email AND password = :password";
        $query1 = $conn->prepare($sql);
        $query1->bindParam(':email', $email);
        $query1->bindParam(':password', $password);
        $query1->execute();
    }
}

?>