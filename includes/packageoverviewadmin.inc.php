<table class="table">
    <thead>
    <tr>
        <th scope="col">Sender adres</th>
        <th scope="col">Measurements</th>
        <th scope="col">Length</th>
        <th scope="col">Width</th>
        <th scope="col">Height</th>
        <th scope="col">Weight</th>
        <th scope="col">Receiver adres</th>
        <th scope="col">Contact information</th>
        <th scope="col">Insuranced</th>
        <th scope="col">Rush delivery</th>
        <th scope="col">Price</th>
        <th scope="col">Status</th>
        <th scope="col">Claimed by</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT p.packageid, p.senderadres,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,p.length,p.width,p.height,c.name,s.status
FROM package p
LEFT JOIN status s on p.statusid = s.statusid
LEFT JOIN carrier c on c.carrierid = c.carrierid

";




    $query3 = $conn->prepare($sql);
    $query3->execute();


    while ($row3 = $query3->fetch(PDO::FETCH_ASSOC)) {

        $measurments = $row3['length'] * $row3['width'] * $row3['height']


        ?>
        <tr>
            <td><?= $row3['senderadres'] ?></td>
            <td><?= $measurments ?>cm³</td>
            <td><?= $row3['length'] ?></td>
            <td><?= $row3['width'] ?></td>
            <td><?= $row3['height'] ?></td>
            <td><?= $row3['weight'] ?> kg</td>
            <td><?= $row3['receiveradres'] ?></td>
            <td><?= $row3['contactinformation'] ?></td>
            <td><?= $row3['insuranced'] ?></td>
            <td><?= $row3['rushdelivery'] ?></td>
            <td>€<?= $row3['price'] ?></td>
            <td><?= $row3['status'] ?></td>
            <td><?= $row3['name'] ?></td>


            <td>


        </tr>
    <?php } ?>
    </tbody>

</table>