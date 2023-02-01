<?php
include '../private/conn.php';

if ($_SESSION['role'] == 'admin') {
    ?>

    <table class="table table-striped table-hover table-bordered table-light border-secondary">
        <thead>
        <tr>
            <button style="float:right" class="btn btn-success"
                    onclick="window.location.href='index.php?page=addworker'">
                Add Worker
            </button>
            <th scope="col">Naam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Email</th>
            <th scope="col">Bewerken</th>
            <th scope="col">Verwijderen</th>
        </tr>
        </thead>


        <tbody>
        <tr>
            <td> <?= '' ?></td>
            <td> <?= '' ?></td>
            <td> <?= '' ?></td>
            <td>

            </td>
        </tr>
        </tbody>
    </table>
    <?php
} elseif ($_SESSION['role'] == 'carrier') {

    $carrierid = $_SESSION['userid'];

    $sql = "SELECT * FROM package p 
         left join status s on s.statusid = p.statusid
         
         WHERE p.claimedby = :carrierid and p.statusid = 6 ";
    $query = $conn->prepare($sql);
    $query->bindParam(':carrierid', $carrierid);
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


            </tr>
        <?php }

        $sql = "SELECT COUNT(packageid) as numberOfRows
                FROM package 
                where claimedby = :carrierid and statusid = 6 ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':carrierid', $carrierid);
        $stmt->execute();
        $row2 = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT SUM(price) as totalPrice
                FROM package 
                where claimedby = :carrierid and statusid = 6 ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':carrierid', $carrierid);
        $stmt->execute();
        $row3 = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT po.percent FROM
             position po
LEFT JOIN package pa on pa.positionid = po.positionid where pa.claimedby = :userid";
        $queryid = $conn->prepare($sql);
        $queryid->bindParam(':userid', $carrierid);
        $queryid->execute();
        $rowid = $queryid->fetch(PDO::FETCH_ASSOC);

        $salary = $row3['totalPrice'] / 100 * $rowid['percent'];
        $totalSalary = round($salary, 2);

        ?>
        </tbody>
    </table>
    <table class="table table-striped table-hover table-bordered table-light border-secondary">
        <thead>
        <tr>
            <th scope="col">Aantal pakketten geleverd</th>
            <th scope="col">Totale prijs</th>
            <th scope="col">Totale salaris koerier (80%)</th>
        </tr>
        </thead>


        <tbody>
        <tr>
            <td><?= $row2['numberOfRows'] ?></td>
            <td><?= $row3['totalPrice'] ?></td>
            <td>€<?= $totalSalary ?></td>
            <td>

            </td>
        </tr>
        </tbody>
    </table>

<?php } ?>




