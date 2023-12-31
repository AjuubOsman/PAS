<?php
include '../private/conn.php';

$expiredstatus = 'pending';

$sql = "SELECT *  FROM carrier where status = 'pending' ";
$query = $conn->prepare($sql);
$query->execute();

$stmt = $conn->prepare("UPDATE carrier SET status = :status where cd = curdate();");
$stmt->bindParam(':status', $expiredstatus);
$stmt->execute();
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Bedrijf</th>
            <th scope="col">Capaciteit</th>
            <th scope="col">Goedkeuren</th>
            <th scope="col">Afkeuren</th>
        </tr>
    </thead>
    <tbody>

        <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>

            <form method="post" action="php/carrierrequest.php">
                <tr>
                    <td> <?= $row['name'] ?></td>
                    <td><?= $row['company'] ?></td>
                    <td><?= $row['capacity'] ?></td>


                    <td><input type="submit" class="btn btn-primary" name="action" value="approve"/></td>
                    <td><input type="submit" class="btn btn-danger" name="action" value="disapprove"/></td>
                    <input type="hidden" name="userid" value="<?= $row['userid'] ?>">
                    <td></td>
                    <?php } ?>
                </tr>
            </form>
    </tbody>
</table>