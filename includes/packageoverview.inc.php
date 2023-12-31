<?php
include '../private/conn.php';
$userid = $_SESSION['userid'];


$sql = "SELECT status,cd FROM carrier WHERE userid = :userid ";
$query = $conn->prepare($sql);
$query->bindParam(':userid', $userid);
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);
if ($row['status'] == 'pending')
{?>
    <div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form action="php/login.php" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Package pick-up service</h2>
                            <p class=" mb-5">Please await until your request is accepted</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
elseif ($row['status'] == 'approve'){?>


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
            <th scope="col">Claim Pakket</th>



        </tr>
        </thead>

                <tbody>
                <?php
                $sql = "SELECT p.packageid, p.senderadres,p.length,p.width,p.height,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,s.status
FROM package p
LEFT JOIN status s on p.statusid = s.statusid


where p.claimedby is NULL AND p.statusid = 1";
                $query2 = $conn->prepare($sql);
                $query2->execute();



                while(  $row2 = $query2->fetch(PDO::FETCH_ASSOC)){

                    $measurments = $row2['length'] * $row2['width'] * $row2['height']?>
                <tr>
                    <td><?= $row2['senderadres']?></td>
                   <td><?= $measurments?> cm³</td>
                    <td><?= $row2['length']?> cm</td>
                    <td><?= $row2['width']?> cm</td>
                    <td><?= $row2['height']?> cm</td>
                    <td><?= $row2['weight']?> kg</td>
                    <td><?= $row2['receiveradres']?></td>
                    <td><?= $row2['contactinformation']?></td>
                    <td> <?php if ($row2['insuranced'] == 1 ){
                            echo 'Is Verzekerd';
                        } else {
                            {
                                echo 'Is niet verzekerd';
                            }
                        }


                        ?></td>
                    <td><?php if ($row2['rushdelivery'] == 1 ){
                            echo 'Is een spoed levering';
                        } else {
                            {
                                echo 'Is geen spoed levering';
                            }
                        }


                        ?></td>
                    <td>€<?= $row2['price']?></td>
                    <td><?= $row2['status']?></td>

                    <td>

                        <button class="btn btn-primary "
                                onclick="window.location.href='php/claimpackage.php?packageid=<?= $row2["packageid"] ?> '">
                            Claim
                        </button></td>

                </tr>
                <?php } ?>
                </tbody>

    </table>

<?php }
elseif ($row['status'] == 'disapprove'){



    ?>

    <div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form action="php/login.php" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Pakket Ophaal service</h2>
                            <p class=" mb-5">Je toegang is afgewezen, Probeer op <?= $row['cd'] ?>  om jezelf op te geven.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  }?>





