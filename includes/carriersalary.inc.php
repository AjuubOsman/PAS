<?php
include '../private/conn.php';

if ($_SESSION['role'] == 'admin' ){
?>

<table class="table table-striped table-hover table-bordered table-light border-secondary">
    <thead>
    <tr>
        <button style="float:right" class="btn btn-success" onclick="window.location.href='index.php?page=addworker'">
            Add Worker
        </button>
        <th scope="col">Naam</th>
        <th scope="col">Achternaam</th>
        <th scope="col">Email</th>
        <th scope="col">Bewerken</th>
        <th scope="col">Verwijderen</th>
    </tr>
    </thead>


            <tbody>
            <tr>
                <td> <?= ''?></td>
                <td> <?= '' ?></td>
                <td> <?= ''?></td>
                <td>

              </td>
         </tr>
           </tbody>
    </table>
      <?php
  }elseif(''){ ?>


<?php }?>




