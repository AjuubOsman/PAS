<?php
include '../private/conn.php';
$userid = $_GET['userid'];

$sql = "SELECT firstname, lastname, email, password FROM user
        WHERE userid = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid', $userid);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo $userid; ?> <br><?php

$test = new worker();
foreach ($test->setUserid($conn, $userid) as $value) {
    echo $value->firstname;

}


?>
<body>
<div class="container mt-3">
    <h2>Edit A Worker</h2>
    <form action="php/editworker.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" value="<?= $row['firstname'] ?>"
                   name="firstname">
        </div>
        <div class="mb-3 mt-3">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" value="<?= $row['lastname'] ?>"
                   name="lastname">
        </div>
        <div class="mb-3 mt-3">
            <label>Email:</label>
            <input type="text" class="form-control" placeholder="Enter email" value="<?= $row['email'] ?>" name="email">
        </div>

        <div class="mb-3 mt-3">
            <label>Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" value="<?= $row['password'] ?>"
                   name="password">
        </div>
        <input type="hidden" name="userid" value="<?= $userid ?>">
        <button name="submit" type="submit" class="btn btn-success">Update</button>
    </form>
</div>
</body>