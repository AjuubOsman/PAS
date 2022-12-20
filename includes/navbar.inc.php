<?php
include '../private/conn.php';

    $userid = $_SESSION['userid'];

    $sql = "SELECT *  FROM carrier where userid = :userid ";
    $query = $conn->prepare($sql);
    $query->bindParam(':userid', $userid);
    $query->execute();


    $row = $query->fetch(PDO::FETCH_ASSOC);



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
                    <a class="nav-link" aria-current="page" href="index.php?page=carrieroverview">Koerier overzicht</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="php/logout.php">Log Uit</a>
                </li><?php }?>
                <?php if ($_SESSION['role'] == 'admin'){?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=workeroverview">Medewerker overzicht</a>
                    </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php?page=carrierrequest">Koerier Aanvragen</a>
        </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=carrieroverview">Koerier overzicht</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="php/logout.php">Log Uit</a>
                    </li>
                <?php } elseif ($_SESSION['role'] == 'customer'){?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=registerpackage">Registreer Pakket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=mypackages">Mijn pakketten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="php/logout.php">Log Uit</a>

                    </li><?php } elseif($_SESSION['role'] == 'carrier'){
                        if ($row['status'] == 'approve') {?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=packageoverview">Pakket overzicht</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php?page=claimedpackages">Claimed Pakketten</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="php/logout.php">Log Uit</a>
                            <li class="nav-item">


                    <?php }elseif($row['status'] == 'pending' ||$row['status'] == 'disapprove' ){

                            ?>
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="php/logout.php">Log Uit</a>
                            <li class="nav-item">
                    <?php }}}else{?>

                    <a class="nav-link" aria-current="page" href="index.php?page=login">Log In</a>
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
