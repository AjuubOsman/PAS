<?php
include '../private/conn.php';

$sql = "SELECT *  FROM carrier where status = 'Pending' ";
$query = $conn->prepare($sql);
$query->execute();


?>

<table class="table">
    <thead>
    <tr>

        <th scope="col">Name</th>
        <th scope="col">Company</th>
        <th scope="col">Capacity</th>




    </tr>
    </thead>

    <tbody>
    <tr>

        <?php while($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>
        <form method="post" action="php/carrierrequest.php">
        <td> <?= $row['name']?></td>
        <td><?= $row['company']?></td>
        <td><?= $row['capacity']?></td>


            <td> <input type="submit" class="btn btn-primary"  name="action" value="approve" />
           <input type="submit" class="btn btn-danger" name="action" value="disapprove" /> </td>
            <input type="hidden" name="carrierid" value="<?= $row['carrierid']?>">
        <td></td>
<?php } ?>
        </form>
    </tr>
    </tbody>

</table>