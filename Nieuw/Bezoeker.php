<?php
$titel = 'Bezoeker';
require_once('Includes/Header.php');
?>
    <main>
            <div class="formulier">
                <h1>
                    Inloggen
                </h1>
                <form method="post">
                    <label for="gebruikersnaam">Gebruikersnaam: </label>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam" required><br>
                    <label for="wachtwoord">Wachtwoord: </label>
                    <input type="password" name="wachtwoord" id="wachtwoord" required><br>
                    <input type="submit" name="Inloggen" value="Inloggen" id="send_button">
                </form>
                <p>
                    Heeft u nog een account? Klik dan <a href="Registreren.php">HIER</a> om een account aan te maken.
                </p>
            </div>
    </main>
<?php
require_once('Includes/Footer.html');
?>