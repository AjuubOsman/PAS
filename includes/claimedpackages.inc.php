<?php
$userid = $_SESSION['userid'];



$sql = "SELECT p.packageid, p.senderadres,p.measurements,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,s.status
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

        <th scope="col">Sender adres</th>
        <th scope="col">Measurements</th>
        <th scope="col">Weight</th>
        <th scope="col">Receiver adres</th>
        <th scope="col">Contact information</th>
        <th scope="col">Insuranced</th>
        <th scope="col">Rush delivery</th>
        <th scope="col">Price</th>
        <th scope="col">Status</th>




    </tr>
    </thead>

    <tbody>
    <?php  if ($stmt->rowCount() > 0) {
        while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        ?>

    <tr>
        <td><?= $row['senderadres']?></td>
        <td><?= $row['measurements']?>cm³</td>
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


    </tr>
    <?php }} ?>
    </tbody>

</table>
