<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form action="php/login.php" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Pakket afhaal-service</h2>
                            <p class=" mb-5">Voer uw email en wachtwoord hier in.</p>
                            <?php
                            if (isset($_SESSION['notification'])) {
                                echo '<p style = "color:red;">' . $_SESSION['notification'] . '</p>';
                                unset($_SESSION['notification']);


                            } ?>
                            <div class="mb-3">
                                <label for="email" class="form-label ">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="name@voorbeeld.com">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label ">Wachtwoord</label>
                                <input type="password" class="form-control" name="psw" placeholder="*******">
                           www </div>

                            <div class="d-grid">
                                <button class="btn btn-outline-dark" type="submit">Login</button>
                            </div>
                        </form>
                        <div class="d-grid">
                            <p>Nog geen account?</p>
                            <button class="btn btn-outline-dark"
                                    onclick="window.location.href='index.php?page=registerchoose'" type="button">
                                Registreer
                            </button>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>