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
elseif ($row['status'] == 'approve'){


    $sql = "SELECT * FROM package WHERE userid = :userid ";
    $query = $conn->prepare($sql);
    $query->bindParam(':userid', $userid);
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);



    ?>


    <table class="table">
        <thead>
        <tr>

            <th scope="col">Sender</th>
            <th scope="col">Size</th>
            <th scope="col">Weight</th>
            <th scope="col">Receiver</th>
            <th scope="col">Status</th>


        </tr>
        </thead>

                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>


                    <td></td>
                    <td></td>

                </tr>
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
<?php  }





?>
