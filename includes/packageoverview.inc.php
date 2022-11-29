<?php
include '../private/conn.php';
$carrierid = $_SESSION['carrierid'];


$sql = "SELECT status FROM carrier WHERE carrierid = :carrierid ";
$query = $conn->prepare($sql);
$query->bindParam(':carrierid', $carrierid);
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);
if ($row['status'] == NULL)
{?>
    <div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form action="php/login.php" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">package pick-up service</h2>
                            <p class=" mb-5">Please await until your request is accepted</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }
else{?>


    welkom
<?php }
?>
