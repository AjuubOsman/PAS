<?php
include '../private/conn.php';

$userid = $_GET['userid'];
$positionid = $_GET['positionid'];

$sql = "SELECT c.name,po.position
        FROM carrier c
LEFT JOIN position po ON po.positionid = c.positionid where c.userid  = :userid";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':userid', $userid);
$stmt->execute();



$positionids = array();

$sql = "SELECT positionid FROM position where positionid = :positionid";
$stmt1 = $conn->prepare($sql);
$stmt1->bindParam(':positionid', $positionid);
$stmt1->execute();
while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
    array_push($positionids,$row1['positionid']);
}

?>
<form action="php/editposition.php" method="POST" enctype="multipart/form-data">
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Naam Koerier</th>
            <th scope="col">Huidige Positie</th>




        </tr>
        </thead>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tbody>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['position'] ?></td>
            </tr>
            </tbody>
            <?php
        } ?>
    </table>
    <tr>
        <?php
        $sql = "SELECT * FROM position ";
        $stmt2 = $conn->prepare($sql);
        $stmt2->execute();


        while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {?>

        <label>

            <input type="radio" name="positionid" value="<?=$row2["positionid"]?>" <?php if(in_array($row2["positionid"], $positionids)){ ?> checked="checked" <?php } ?>> <?=$row2["position"]?>
            <span class="checkmark"></span>

        </label>
    </tr>
    <?php }?>


    <input type="hidden" name="userid" value="<?=$userid?>">
    <button name="submit" type="submit" class="btn btn-success">Pas Aan</button>

</form>