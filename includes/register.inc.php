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
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="First name" name="firstname" />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Last name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Middle name" name="middlename" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Last name" name="lastname" />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Date of birth</label>
                            <input type="date" class="form-control form-control-lg" name="dob" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Postal code</label>
                            <input type="text" class="form-control form-control-lg" name="postalcode" placeholder="Postal code" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control form-control-lg" name="city" placeholder="City" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Housenumber</label>
                            <input type="text" class="form-control form-control-lg" name="housenumber" placeholder="Housenumber" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Phonenumber</label>
                            <input type="text" class="form-control form-control-lg" name="phonenumber" placeholder="Phonenumber" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control form-control-lg" name="email" placeholder="name@example.com"/>

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" name="psw" placeholder="*******" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Repeat password</label>
                            <input type="password" class="form-control form-control-lg" name="pswrepeat" placeholder="*******" />

                        </div>


                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-dark"
                                    onclick="window.location.href='index.php?page=register'" type="submit">Sign up
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
                            <label class="form-label">Full name</label>
                            <input type="text" class="form-control form-control-lg" placeholder="Full name" name="name" />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Company</label>
                            <input type="text" class="form-control" name="company"  placeholder="Company name" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Load capacity</label>
                            <input type="number" class="form-control" name="capacity" placeholder="Load Capacity" />

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="name@example.com" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="psw" placeholder="*******" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label">Repeat password</label>
                            <input type="password" class="form-control" name="pswrepeat" placeholder="*******" />
                        </div>



                        <div class="d-flex justify-content-center">
                            <button class="btn btn-outline-dark"
                                    onclick="window.location.href='index.php?page=register'" type="submit">Sign up
                            </button>
                        </div>

                        <input type="hidden" name="role" value="<?= $role ?>">


                    </form>

                </div>
            </div>
        </div>
    </div>
<?php } ?>
