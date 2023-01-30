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
        <th scope="col">Claimed Door</th>
    </tr>
    </thead>

    <tbody>
    <?php
    $sql = "SELECT p.packageid, p.senderadres,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,p.length,p.width,p.height,s.status,u.email
FROM package p
LEFT JOIN status s on p.statusid = s.statusid
LEFT JOIN user u on p.claimedby = u.userid";

    $query3 = $conn->prepare($sql);
    $query3->execute();
    while ($row3 = $query3->fetch(PDO::FETCH_ASSOC)) {
        $measurments = $row3['length'] * $row3['width'] * $row3['height'] ?>
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
            <td><?= $row3['email'] ?></td>

        </tr>
    <?php } ?>
    </tbody>

</table>