<?php

$userid = $_GET['userid'];

$sql = "SELECT statusid FROM status where status = 'Pakket is bezorgd'";
$query1 = $conn->prepare($sql);
$query1->execute();
$row1 = $query1->fetch(PDO::FETCH_ASSOC);

$statusid = $row1['statusid'];
$sql = "SELECT * FROM package where claimedby = $userid AND statusid = $statusid";
$query = $conn->prepare($sql);
$query->execute();

$sql = "SELECT SUM(price) as totalprice FROM package where claimedby = $userid AND statusid = $statusid";
$querytest = $conn->prepare($sql);
$querytest->execute();
?>

<table class="table">
    <thead>
    <tr>

        <th scope="col">Aantal bezorgde pakketten</th>
        <th scope="col">Bedrag totale bezorgde pakketten</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        $packages = $query->rowCount(); ?>
        <td><?= $packages ?></td>
        <?php $rowtest = $querytest->fetch(PDO::FETCH_ASSOC)?>
        <td><?= $rowtest['totalprice'] ?></td>
    </tr>
    </tbody>
</table>
<tbody>
<tr>
    <?php
    $sql = "SELECT * FROM package where  length > 38 or width > 26.5 or height > 3.2 or weight > 10";
    $query3 = $conn->prepare($sql);
    $query3->execute();
    $packagesbig = $query3->rowCount(); ?>
    <td><?= $packagesbig ?></td>


    <?php $sql = "SELECT * FROM package where  length < 38 or width < 26.5 or height < 3.2 or weight < 10";
    $query4 = $conn->prepare($sql);
    $query4->execute();
    $packagessmall = $query4->rowCount(); ?>

    <td><?= $packagessmall ?></td>
</tr>
</tbody>
</table>
