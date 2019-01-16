<?php
require_once('Includes/Header.php');
?>
    <main>
        <div class="formulier">
            <h1>Vul het volgende in om contact met ons op te nemen.</h1>
            <form method="post">
                <label for="voornaam">Voornaam: </label>
                <input type="text" name="voornaam" id="voornaam"><br>
                <label for="achternaam">Achternaam: </label>
                <input type="text" name="achternaam" id="achternaam"><br>
                <label for="email">E-Mailadres: </label>
                <input type="text" name="email" id="email"><br>
                <label for="bericht">Bericht: </label>
                <input type="text" name="bericht" id="bericht"><br>
                <input type="submit" name="verzenden" value="Verzenden">
            </form>
        </div>
    </main>
<?php
require_once ('Includes/Footer.php');
?>