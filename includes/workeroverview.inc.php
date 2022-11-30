<?php
include '../private/conn.php';

$sql = "SELECT *  FROM user where role = 'worker' ";
$query = $conn->prepare($sql);
$query->execute();


?>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-light border-secondary">
        <thead>
        <tr>
            <button class="btn btn-primary"
                    onclick=" if(confirm('Are you sure you want to delete this worker?'))window.location.href='php/deleteworker.php?userid='">
                Add
            </button>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Delete </th>
            <th scope="col">Edit </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php while($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>
            <td><?= $row['firstname']?></td>
            <td><?= $row['email']?></td>
                <td>
                <button class="btn btn-danger"
                        onclick=" if(confirm('Are you sure you want to delete this worker?'))window.location.href='php/deleteworker.php?userid='">
                    Delete
                </button>
                </td>
                <td>
                    <button class="btn btn-warning"
                            onclick=" if(confirm('Are you sure you want to delete this worker?'))window.location.href='php/deleteworker.php?userid='">
                        Edit
                    </button>
                </td>
            <?php }?>
        </tr>
        </tbody>

    </table>
</div>