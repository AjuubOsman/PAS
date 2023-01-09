<?php
include '../private/conn.php';
$userid = $_GET['userid'];

$sql = "SELECT w.firstname,w.lastname,w.userid,u.email
            FROM worker w
            LEFT JOIN user u on w.userid = u.userid
            where w.userid = u.userid";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<body>
<div class="container mt-3">
    <h2>Medewerker bewerken</h2>
    <form action="php/editworker.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label>Voornaam:</label>
            <input type="text" class="form-control" placeholder="Voornaam" value="<?= $row['firstname'] ?>"
                   name="firstname">
        </div>
        <div class="mb-3 mt-3">
            <label>Achternaam:</label>
            <input type="text" class="form-control" placeholder="Achternaam" value="<?= $row['lastname'] ?>"
                   name="lastname">
        </div>
        <div class="mb-3 mt-3">
            <label>Email:</label>
            <input type="email" class="form-control" placeholder="Email" value="<?= $row['email'] ?>" name="email">
        </div>

        <input type="hidden" name="userid" value="<?= $userid ?>">
        <button name="submit" type="submit" class="btn btn-success">Opslaan</button>
    </form>
</div>
</body>