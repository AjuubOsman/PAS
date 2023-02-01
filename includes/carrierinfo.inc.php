<?php
include '../private/conn.php';

$userid = $_GET['userid'];

$sql = "SELECT statusid FROM status where status = 'Pakket is bezorgd'  ";
$query1 = $conn->prepare($sql);
$query1->execute();
$row1 = $query1->fetch(PDO::FETCH_ASSOC);

$statusid = $row1['statusid'];
$sql = "SELECT * FROM package where claimedby = $userid AND statusid = $statusid ";
$query = $conn->prepare($sql);
$query->execute();

$sql = "SELECT SUM(price) as totalprice FROM package where claimedby = $userid AND statusid = $statusid ";
$querytest = $conn->prepare($sql);
$querytest->execute();



$sql = "SELECT * FROM package p
left join status s on s.statusid = p.statusid

WHERE p.claimedby = :userid and p.statusid = 6 ";
$query = $conn->prepare($sql);
$query->bindParam(':userid', $userid);
$query->execute();

//$row = $query->fetch(PDO::FETCH_ASSOC);


?>
<table class="table table-striped table-hover table-bordered table-light border-secondary">
    <thead>
    <tr>

        <th scope="col">Pakket ID</th>
        <th scope="col">Ontvanger adres</th>
        <th scope="col">Status</th>
        <th scope="col">Prijs</th>
        <th scope="col">Verzekerd</th>
        <th scope="col">Met spoed</th>
        <th scope="col">Pakketgrootte</th>


    </tr>
    </thead>


    <tbody>
    <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td> <?= $row['packageid'] ?></td>
        <td> <?= $row['receiveradres'] ?></td>
        <td> <?= $row['status'] ?></td>
        <td>€<?= $row['price'] ?></td>
        <td><?php if ($row['insuranced'] == 1) {
                echo 'Ja';
            } else {
                echo 'Nee';
            } ?></td>
        <td><?php if ($row['rushdelivery'] == 1) {
                echo 'Ja';
            } else {
                echo 'Nee';
            } ?></td>
        <td><?php if ($row['weight'] > 10 || $row['length'] > 38 || $row['width'] > 26.5 || $row['height'] > 3.2) {
                echo 'Groot';
            } else {
                echo 'Klein';
            } ?></td>
<?php } ?>

    </tr>
    <table class="table table-striped table-hover table-bordered table-light border-secondary">
        <thead>
        <tr>

            <th scope="col">Aantal bezorgde pakketten</th>
            <th scope="col">Bedrag totale bezorgde pakketten</th>


        </tr>
        </thead>


        <tbody>

            <tr>
                <?php
                $packages = $query->rowCount();?>
                <td><?=$packages ?></td>
                <?php $rowtest = $querytest->fetch(PDO::FETCH_ASSOC)

                ?>


                <td><?= $rowtest['totalprice'] ?> p</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-striped table-hover table-bordered table-light border-secondary">
        <thead>
        <tr>
            <th scope="col">Totale Grootte Pakketten</th>
            <th scope="col">Totale Kleine Pakketten</th>
            <th scope="col">Totale salaris koerier (80%)</th>
        </tr>
        </thead>


        <tbody>
        <tr>
            <?php $sql = "SELECT * FROM package where ( length > 38 or width > 26.5 or height > 3.2 or weight > 10) AND  claimedby = $userid AND statusid = $statusid ";
            $query3 = $conn->prepare($sql);

            $query3->execute();
            $packagesbig = $query3->rowCount();?>

            <td><?=$packagesbig ?></td>

            <?php



            $sql = "SELECT po.positionid
FROM package pa
LEFT JOIN position po on po.positionid = pa.positionid
where pa.claimedby = :userid and pa.statusid = :statusid and pa.positionid is not null   ";
            $queryid = $conn->prepare($sql);
            $queryid->bindParam(':userid', $userid);
            $queryid->bindParam(':statusid', $statusid);
            $queryid->execute();
            $rowid = $queryid->fetchAll();


//            var_dump($rowid);
            foreach ( $rowid as $value ){

                $sql = "SELECT percent FROM position where positionid = :positionid";
                $queryid1 = $conn->prepare($sql);
                $queryid1->bindParam(':positionid', $value['positionid']);
                $queryid1->execute();
                $rowid1 = $queryid1->fetch(PDO::FETCH_ASSOC);

                var_dump($rowid1);

                $salary = $rowtest['totalprice'] / 100 * $rowid1['percent'];
                $totalSalary = round($salary, 2);
            }

            $sql = "SELECT * FROM package where ( length < 38 and width < 26.5 and height < 3.2 and weight < 10) AND  claimedby = $userid AND statusid = $statusid ";
            $query4 = $conn->prepare($sql);
            $query4->execute();

            $packagessmall = $query4->rowCount();
            ?>

            <td><?=$packagessmall ?></td>
            <td><?=$totalSalary ?></td>


            </td>
        </tr>
        </tbody>
    </table>






