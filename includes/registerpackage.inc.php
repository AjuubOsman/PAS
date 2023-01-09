
<body>
<div class="container mt-3">
    <h2>Pakket Aanmelden</h2>
    <form action="php/packagecreat.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label>Voornaam:</label>
            <input type="text" class="form-control" placeholder="Voornaam" name="firstname">
        </div>
        <div class="mb-3 mt-3">
            <label>Achternaam:</label>
            <input type="text" class="form-control" placeholder="Achternaam" name="lastname">
        </div>
        <div class="mb-3 mt-3">
            <label>Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="mb-3 mt-3">
            <label>Wachtwoord:</label>
            <input type="password" class="form-control" placeholder="Wachtwoord" name="password">
        </div>
        <button name="submit" type="submit" class="btn btn-success">Voeg toe</button>
    </form>
</div>
</body>