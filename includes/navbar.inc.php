<?php
include '../private/conn.php';
if (isset($_SESSION['carrierid'])) {
    $carrierid = $_SESSION['carrierid'];

    $sql = "SELECT status  FROM carrier where carrierid = :carrierid ";
    $query = $conn->prepare($sql);
    $query->bindParam(':carrierid', $carrierid);
    $query->execute();


    $row = $query->fetch(PDO::FETCH_ASSOC);


}
?>






<nav class="navbar navbar-expand-lg navbar-dark indigo">
    <a class="navbar-brand" href="index.php?page=homepage">PAS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
                <?php
if (isset($_SESSION['role'])){
                    if($_SESSION['role'] == 'worker'){?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=carrieroverview">Carrier overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="php/logout.php">Logout</a>
                </li><?php }?>
                <?php if ($_SESSION['role'] == 'admin'){?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=workeroverview">Worker overview</a>
                    </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php?page=carrierrequest">Carrier Request</a>
        </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=carrieroverview">Carrier overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="php/logout.php">Logout</a>
                    </li>
                <?php } elseif ($_SESSION['role'] == 'customer'){?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=registerpackage">Register package</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=mypackages">My packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="php/logout.php">Logout</a>

                    </li><?php } elseif($_SESSION['role'] == 'carrier'){
                        if ($row['status'] == 'approve') {?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=packageoverview">Package Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=claimedpackages">Claimed Packages</a>
                        </li>
<?php }?>
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="php/logout.php">Logout</a>

                    <?php }}else{?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php?page=registerchoose">Register</a>
                </li>
                <?php }?>
        </ul>
        <span class="navbar-text white-text">
    </span>
    </div>
</nav>
