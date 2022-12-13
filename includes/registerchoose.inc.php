
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="border border-3 border-primary"></div>
                <div class="card bg-white shadow-lg">
                    <div class="card-body p-5">
                        <form action="php/login.php" method="post">
                            <h2 class="fw-bold mb-2 text-uppercase ">Pakket Ophaal Service</h2>
                            <p class=" mb-5">Specify your Role</p>
                            <div class="mb-3">
                                <div class="d-grid">
                                    <label>Sign in as Customer</label>
                                    <button class="btn btn-outline-dark"
                                            onclick="window.location.href='index.php?page=register&role=customer'"  type="button">Registreer
                                    </button>
                                </div>
                            </div>
                            <div class="mb-3">

                            </div>


                        <div class="d-grid">
                            <label>Registreer als als Koerier</label>
                            <button class="btn btn-outline-dark"
                                    onclick="window.location.href='index.php?page=register&role=carrier'" type="button">Registreer
                            </button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>