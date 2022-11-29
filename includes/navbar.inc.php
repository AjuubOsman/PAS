

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=homepage">PAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if(isset($_SESSION['userid'])){
                    if(isset($_SESSION['role']) && ($_SESSION['role'] == 'worker')){?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=carrieroverview">Carrier overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="php/logout.php">Logout</a>
                </li><?php }?>
                <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')){?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=carrieroverview">Carrier overview (admin)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="php/logout.php">Logout</a>
                    </li><?php }?>
                <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'customer')){?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=registerpackage">Register package</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?page=mypackages">My packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="php/logout.php">Logout</a>
                    </li><?php }}else{?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=register">Register</a>
                </li>
                <?php }?>
            </ul>
            <form class="d-flex">
            </form>
        </div>
    </div>
</nav>
