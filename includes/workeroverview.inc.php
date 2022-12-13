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
        <th scope="col">Voornaam</th>
        <th scope="col">Achternaam</th>
        <th scope="col">Email</th>
        <th scope="col">Bewerken</th>
        <th scope="col">Verwijderen</th>
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
                            onclick="window.location.href='index.php?page=editworker&userid=<?= $value->userid ?>'">Bewerken
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger"
                            onclick=" if(confirm('Are you sure you want to delete this worker?'))window.location.href='php/deleteworker.php?userid=<?= $value->userid ?>'">
                        Verwijderen
                    </button>
                </td>
            </tr>
            </tbody>
        <?php }}
    ?>
</table>




