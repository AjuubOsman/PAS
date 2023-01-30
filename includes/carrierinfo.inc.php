<?php
include '../private/conn.php';
1; 
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
?>
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


                <td><?= $rowtest['totalprice'] ?></td>
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

            <?php $sql = "SELECT * FROM package where ( length < 38 and width < 26.5 and height < 3.2 and weight < 10) AND  claimedby = $userid AND statusid = $statusid ";
            $query4 = $conn->prepare($sql);
            $query4->execute();

            $packagessmall = $query4->rowCount();
            $salary = $rowtest['totalprice'] / 100 * 80;
            $totalSalary = round($salary, 2);
            ?>

            <td><?=$packagessmall ?></td>
            <td><?=$totalSalary ?></td>


            </td>
        </tr>
        </tbody>
    </table>






