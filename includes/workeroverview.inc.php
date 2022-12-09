<?php
include '../private/conn.php';
$workerOverview = new worker();

?>
<table class="table table-striped table-hover table-bordered table-light border-secondary">
    <thead>
    <tr>
        <button style="float:right" class="btn btn-success" onclick="window.location.href='index.php?page=addworker'">
            Add Worker
        </button>
        <th scope="col">Firstname</th>
        <th scope="col">lastname</th>
        <th scope="col">Email</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <?php if ($workerOverview->workerOverview($conn) != NULL){
        foreach($workerOverview->workerOverview($conn) as $value){?>
            <tbody>
            <tr>
                <td> <?= $value->firstname ?></td>
                <td> <?= $value->lastname ?></td>
                <td> <?= $value->email ?></td>
                <td>
                    <button class="btn btn-primary"
                            onclick="window.location.href='index.php?page=editworker&userid=<?= $value->userid ?>'">Edit
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger"
                            onclick=" if(confirm('Are you sure you want to delete this worker?'))window.location.href='php/deleteworker.php?userid=<?= $value->userid ?>'">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        <?php }}
    ?>
</table>




