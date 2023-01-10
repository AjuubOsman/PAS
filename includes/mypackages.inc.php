<?php
include '../private/conn.php';

$userid = $_SESSION['userid'];


$sql = "SELECT p.senderadres,p.receiveradres, p.price, p.userid, s.status
        FROM package p
LEFT JOIN status s ON p.statusid = s.statusid where userid = $userid";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<table class="table">
    <thead>
    <tr>

        <th scope="col">Afzender Adres</th>
        <th scope="col">Ontvanger Adres</th>
        <th scope="col">Prijs</th>
        <th scope="col">Status</th>



    </tr>
    </thead>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tbody>
            <tr>
                <td><?= $row['senderadres'] ?></td>
                <td><?= $row['receiveradres'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['status'] ?></td>





            </tr>
            </tbody>
        <?php
    } ?>
</table>
