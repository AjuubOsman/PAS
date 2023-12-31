<?php

if (isset($_SESSION['notification'])) {
    echo '<p style = "color:red;">' . $_SESSION['notification'] . '</p>';
    unset($_SESSION['notification']);
}

$role = $_GET['role'];



if ($role == 'customer'){
?>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                    <form action="php/register.php" method="post">

                        <div class="form-outline mb-4">
                            <label class="form-label">Voornaam</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Voornaam" name="firstname" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['firstname']; } ?>" required  />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Tweede naam</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Tweede naam" name="middlename" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['middlename']; } ?>" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Achternaam </label>
                            <input type="text" class="form-control form-control-lg" placeholder="Achternaam" name="lastname" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['lastname']; } ?>" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Geboortedatum</label>
                            <input type="date" class="form-control form-control-lg" name="dob" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['dob']; } ?>" required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Postcode</label>
                            <input type="text" class="form-control form-control-lg" name="postalcode" placeholder="Postcode" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['postalcode']; } ?>" required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Stad</label>
                            <input type="text" class="form-control form-control-lg" name="city" placeholder="Stad" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['city']; } ?>" required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Huisnummer</label>
                            <input type="text" class="form-control form-control-lg" name="housenumber" placeholder="Huisnummer"  value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['housenumber']; } ?>" required />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Telefoonnummer</label>
                            <input type="number" class="form-control form-control-lg" name="phonenumber" placeholder="Telefoonnummer" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['phonenumber']; } ?>" required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="naam@voorbeeld.com" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['email']; } ?> "required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Wachtwoord</label>
                            <input type="password" class="form-control form-control-lg" name="psw" placeholder="*******" required />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Herhaal Wachtwoord</label>
                            <input type="password" class="form-control form-control-lg" name="pswrepeat" placeholder="*******" required />

                        </div>


                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-dark"
                                    onclick="window.location.href='index.php?page=register'" type="submit">Registreren
                            </button>
                        </div>
                        <input type="hidden" name="role" value="<?= $role ?>">



                    </form>

                </div>
            </div>
        </div>
    </div>
<?php }else{ ?>

    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>
                    <form action="php/register.php" method="post">

                        <div class="form-outline mb-4">
                            <label class="form-label">Naam</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Naam" name="name" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['name']; } ?>" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Bedrijf</label>
                            <input type="text" class="form-control" name="company"  placeholder="Company name" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['company']; } ?>" required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Laad capaciteit</label>
                            <input type="number" class="form-control" name="capacity" placeholder="Laad capaciteit" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['capacity']; } ?>" required />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="naam@voorbeeld.com" value="<?php if (isset($_SESSION['data']) and !empty($_SESSION['data'])) { echo $_SESSION['data']['post']['email']; } ?> " required/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Wachtwoord</label>
                            <input type="password" class="form-control" name="psw" placeholder="*******" required  />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Herhaal wachtwoord</label>
                            <input type="password" class="form-control" name="pswrepeat" placeholder="*******"required/>
                        </div>



                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-dark"
                                    onclick="window.location.href='index.php?page=register'" type="submit">Registreren
                            </button>
                        </div>

                        <input type="hidden" name="role" value="<?= $role ?>">


                    </form>

                </div>
            </div>
        </div>
    </div>
<?php  }?>
