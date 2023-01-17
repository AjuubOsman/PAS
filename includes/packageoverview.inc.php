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

            <th scope="col">Sender adres</th>
            <th scope="col">Measurements</th>
            <th scope="col">Weight</th>
            <th scope="col">Receiver adres</th>
            <th scope="col">Contact information</th>
            <th scope="col">Insuranced</th>
            <th scope="col">Rush delivery</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Claim Pakket</th>



        </tr>
        </thead>

                <tbody>
                <?php
                $sql = "SELECT p.packageid, p.senderadres,p.measurements,p.weight,p.receiveradres,p.contactinformation,p.insuranced,p.rushdelivery,p.price,s.status
FROM package p
LEFT JOIN status s on p.statusid = s.statusid


where p.claimedby is NULL";
                $query2 = $conn->prepare($sql);
                $query2->execute();



                while(  $row2 = $query2->fetch(PDO::FETCH_ASSOC)){?>
                <tr>
                    <td><?= $row2['senderadres']?></td>
                    <td><?= $row2['measurements']?>cm³</td>
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
                    <td>€<?= $row2['status']?></td>

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





