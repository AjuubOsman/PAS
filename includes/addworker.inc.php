<?php
if (isset($_SESSION['notification'])) {
    echo '<p style = "color:red;">' . $_SESSION['notification'] . '</p>';
    unset($_SESSION['notification']);
} ?>

<body>
<div class="container mt-3">
    <h2>Medewerker toevoegen</h2>
    <form action="php/addworker.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label>Voornaam:</label>
            <input type="text" class="form-control" placeholder="Voornaam" name="firstname" required>
        </div>
        <div class="mb-3 mt-3">
            <label>Achternaam:</label>
            <input type="text" class="form-control" placeholder="Achternaam" name="lastname" required>
        </div>
        <div class="mb-3 mt-3">
            <label>Email:</label>
            <input type="text" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="mb-3 mt-3">
            <label>Wachtwoord:</label>
            <input type="password" class="form-control" placeholder="Wachtwoord" name="password" required>
        </div>
        <button name="submit" type="submit" class="btn btn-success">Voeg toe</button>
    </form>
</div>
</body>