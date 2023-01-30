<?php


$carrierid = $_GET['carrierid'];

$sql = "SELECT *  FROM package where claimedby = :carrierid ";
$query = $conn->prepare($sql);
$query->bindParam(':carrierid', $carrierid);
$query->execute();

?>



<table class="table">
    <thead>
    <tr>

        <th scope="col">Naam</th>
        <th scope="col">Bedrijfsnaam</th>
        <th scope="col">Aantal kleine pakketten  geleverd</th>
        <th scope="col">Aantal grote pakketten  geleverd</th>
        <th scope="col">Totale prijs van pakketten koerier</th>
        <th scope="col">Salaris</th>





    </tr>
    </thead>
    <?php while($row = $query->fetch(PDO::FETCH_ASSOC)){


        echo $row['claimedby'];
        echo 'hello';?>
        <tbody>
        <tr>
            <td>x<?=$row['senderadres']?></td>
            <td>x<?= $row['company']?></td>
            <td>x<?=$row['capacity']?></td>
            <td><?=$row['capacity']?></td>

            <td><?=$row['capacity']?></td>

            <td><?=$row['capacity']?></td>

            <td><?=$row['capacity']?></td>

            <td><?=$row['capacity']?></td>

            <td><?=$row['capacity']?></td>



        </tr>
        </tbody>


    <?php }?>
</table>

