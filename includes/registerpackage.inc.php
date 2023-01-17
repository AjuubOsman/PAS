<?php

$userid = $_SESSION['userid'];

if (isset($_SESSION['notification'])) {
    echo '<p style = "color:red;">' . $_SESSION['notification'] . '</p>';
    unset($_SESSION['notification']);
}
?>
<body>
<div class="container mt-3">
    <h2>Pakket Aanmelden</h2>
    <form action="php/packagecreat.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label>Adres Verzender:</label>
            <input type="text" class="form-control" placeholder="Adres Verzender" name="senderadres">
        </div>

        <div class="mb-3 mt-3">
            <label>Lengte:</label>

            <input type="number" name="length" placeholder="length"  min="0" required step="any">
            cm
        </div>

        <div class="mb-3 mt-3">
            <label>Breedte:</label>
            <input type="number" name="width" placeholder="width" min="0" required step="any">
            cm
        </div>

        <div class="mb-3 mt-3">
            <label>Hoogte:</label>
            <input type="number" name="height" placeholder="height" min="0" required step="any">
            cm
        </div>

        <div class="mb-3 mt-3">
            <label>Gewicht:</label>
            <input type="number" class="form-control" placeholder="Gewicht" name="weight">
        </div>

        <div class="mb-3 mt-3">
            <label>Adres Ontvangen:</label>
            <input type="text" class="form-control" placeholder="Adres Ontvangen" name="receiveradres">
        </div>

        <div class="mb-3 mt-3">
            <label>Telefoonnummer of Email</label>
            <input type="text" class="form-control" placeholder="Contact gegevens" name="contactinformation">
        </div>


        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="insured" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Pakket Verzekeren? (Pakket Verzekeren is 10% extra boven op de gewoonlijke kosten)
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="rushdelivery" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Pakket Met Spoed Leveren? (Spoed Levering is 20% extra boven op de gewoonlijke kosten)
            </label>
        </div>

<input type="hidden" name="userid" value="<?= $userid?>">
        <button name="submit" type="submit" class="btn btn-success">Voeg toe</button>
    </form>
</div>
</body>