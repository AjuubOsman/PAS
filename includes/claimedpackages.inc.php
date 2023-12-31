<?php
$userid = $_SESSION['userid'];


$sql = "SELECT p.packageid, p.senderadres,p.length,p.width,p.height,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,s.status, p.statusid
FROM package p
LEFT JOIN status s on p.statusid = s.statusid


where p.claimedby = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid', $userid);

$stmt->execute();



?>

<table class="table">
    <thead>
    <tr>

        <th scope="col">Zender adres</th>
        <th scope="col">Afmetingen</th>
        <th scope="col">Lengte</th>
        <th scope="col">Breedte</th>
        <th scope="col">Hoogte</th>
        <th scope="col">Gewicht</th>
        <th scope="col">Ontvanger adres</th>
        <th scope="col">Contact informatie</th>
        <th scope="col">Verzerkerd</th>
        <th scope="col">Spoed Bezorging</th>
        <th scope="col">Prijs</th>
        <th scope="col">Status</th>






    </tr>
    </thead>

    <tbody>
    <?php  if ($stmt->rowCount() > 0) {
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){


            $sql = "SELECT statusid FROM status where status = :status";
            $stmt1 = $conn->prepare($sql);
            $stmt1->bindParam(':status', $row['status']);

            $stmt1->execute();
            $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    $measurments = $row['length'] * $row['width'] * $row['height']
?>
    <tr>
        <td><?= $row['senderadres']?></td>
        <td> <?= $measurments ?>cm³</td>
        <td><?= $row['length']?> cm</td>
        <td><?= $row['width']?> cm</td>
        <td><?= $row['height']?> cm</td>
        <td><?= $row['weight']?> kg</td>
        <td><?= $row['receiveradres']?></td>
        <td><?= $row['contactinformation']?></td>
        <td> <?php if ($row['insuranced'] == 1 ){
                echo 'Is Verzekerd';
            } else {
                {
                    echo 'Is niet verzekerd';
                }
            }


            ?></td>
        <td><?php if ($row['rushdelivery'] == 1 ){
                echo 'Is een spoed levering';
            } else {
                {
                    echo 'Is geen spoed levering';
                }
            }


            ?></td>
        <td>€<?= $row['price']?></td>
        <td><?= $row['status']?></td>
        <?php if ($row['statusid'] != 6) {?>
        <td>
            <button class="btn btn-primary"
                    onclick=" window.location.href='index.php?page=editstatus&statusid=<?= $row1['statusid']?>&packageid=<?=$row['packageid']?>'">
                Wijzig Status
            </button>
        </td>
        <?php } ?>
    </tr>
    <?php }} ?>
    </tbody>

</table>
