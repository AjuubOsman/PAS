<?php

$userid = $_GET['userid'];

$sql = "SELECT statusid FROM status where status = 'Pakket is bezorgd'  ";
$query1 = $conn->prepare($sql);
$query1->execute();
$row1 = $query1->fetch(PDO::FETCH_ASSOC);

$statusid = $row1['statusid'];
$sql = "SELECT SUM(price) as totalprice FROM package where claimedby = $userid AND statusid = $statusid ";
$query = $conn->prepare($sql);
$query->execute();
?>

<table class="table">
    <thead>
    <tr>

        <th scope="col">Aantal bezorgde pakketten</th>
        <th scope="col">Bedrag totale bezorgde pakketten</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $packages = $query->rowCount();?>
    <td><?=$packages ?></td>
  <?php  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

        ?>
        <tr>

<td><?= $row['totalprice'] ?></td>


        </tr>

    <?php } ?>
    </tbody>
</table>
