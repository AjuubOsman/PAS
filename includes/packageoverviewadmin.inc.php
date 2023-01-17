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
    <?php
    $sql = "SELECT p.packageid, p.senderadres,p.measurements,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,s.status
FROM package p
LEFT JOIN status s on p.statusid = s.statusid
";
    $query3 = $conn->prepare($sql);
    $query3->execute();


    while ($row3 = $query3->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?= $row3['senderadres'] ?></td>
            <td><?= $row3['measurements'] ?>cm³</td>
            <td><?= $row3['weight'] ?> kg</td>
            <td><?= $row3['receiveradres'] ?></td>
            <td><?= $row3['contactinformation'] ?></td>
            <td><?= $row3['insuranced'] ?></td>
            <td><?= $row3['rushdelivery'] ?></td>
            <td>€<?= $row3['price'] ?></td>
            <td>€<?= $row3['status'] ?></td>

            <td>


        </tr>
    <?php } ?>
    </tbody>

</table>