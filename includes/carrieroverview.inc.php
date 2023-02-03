<?php
$sql = "SELECT c.name,c.company,c.capacity,p.position,p.positionid, c.userid FROM carrier c
LEFT JOIN position p on p.positionid = c.positionid                                     
where status = 'approve' ";

$query = $conn->prepare($sql);
$query->execute();
?>

    <table class="table">
    <thead>
    <tr>
        <th scope="col">Naam</th>
        <th scope="col">Bedrijfsnaam</th>
        <th scope="col">Ladings capaciteit</th>
        <th scope="col"> Positie Aanpassen</th>
        <th scope="col">Koerier Informatie</th>
    </tr>
    </thead>
  <tbody>
<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>


    <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['company'] ?></td>
        <td><?= $row['capacity'] ?></td>
        <td>
            <button class="btn btn-primary"
                    onclick="window.location.href='index.php?page=editposition&userid=<?= $row['userid'] ?>&positionid=<?= $row['positionid'] ?>'"><?= $row['position'] ?>
            </button>
        </td>
        <td>
    <button class="btn btn-primary"
            onclick="window.location.href='index.php?page=carrierinfo&userid=<?= $row['userid'] ?>'">Koerier informatie
    </button>
        </td>
    </tr>

<?php } ?>
  </tbody>
    </table>
