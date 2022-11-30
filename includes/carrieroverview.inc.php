<?php
$sql = "SELECT *  FROM carrier where status = 'approve' ";
$query = $conn->prepare($sql);
$query->execute();

?>
<table class="table">
    <thead>
    <tr>

        <th scope="col">Firstname</th>
        <th scope="col">Company Name</th>
        <th scope="col">Package Capacity</th>



    </tr>
    </thead>
    <?php while($row = $query->fetch(PDO::FETCH_ASSOC)){?>
    <tbody>
    <tr>
        <td><?=$row['name']?></td>
        <td><?= $row['company']?></td>
        <td><?=$row['capacity']?></td>


    </tr>
    </tbody>

</table>
<?php }?>