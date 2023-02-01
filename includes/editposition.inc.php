<?php
include '../private/conn.php';

$statusid = $_GET['statusid'];
$packageid = $_GET['packageid'];

$sql = "SELECT p.senderadres,p.receiveradres, s.status
        FROM package p
LEFT JOIN status s ON p.statusid = s.statusid where p.packageid = $packageid";
$stmt = $conn->prepare($sql);
$stmt->execute();



$statusids = array();

$sql = "SELECT statusid FROM status where statusid = :statusid";
$stmt1 = $conn->prepare($sql);
$stmt1->bindParam(':statusid', $statusid);
$stmt1->execute();
while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    array_push($statusids,$row1['statusid']);
}

?>
<form action="php/editstatus.php" method="POST" enctype="multipart/form-data">
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Afzender Adres</th>
            <th scope="col">Ontvanger Adres</th>




        </tr>
        </thead>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tbody>
            <tr>
                <td><?= $row['senderadres'] ?></td>
                <td><?= $row['receiveradres'] ?></td>
            </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <tr>
        <?php
        $sql = "SELECT * FROM status where statusid > 2";
        $stmt2 = $conn->prepare($sql);
        $stmt2->execute();


        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {?>

        <label>

            <input type="radio" name="statusid" value="<?=$row2["statusid"]?>" <?php if(in_array($row2["statusid"], $statusids)){ ?> checked="checked" <?php } ?>> <?=$row2["status"]?>
            <span class="checkmark"></span>

        </label>
    </tr>
    <?php }?>


    <input type="hidden" name="packageid" value="<?=$packageid?>">
    <button name="submit" type="submit" class="btn btn-success">Pas Aan</button>

</form>