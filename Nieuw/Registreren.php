<?php
require_once('Includes/Header.php');
?>
    <main>
        <div class="formulier">
            <h1>Vul hier de volgende gegevens in om een account aan te maken.</h1>
            <form method="post">
                <label for="email">E-Mailadres: </label>
                <input type="text" name="email" id="email"><br>
                <label for="herhaal_email">Herhaal E-Mailadres: </label>
                <input type="text" name="herhaal_email" id="herhaal_email"><br>
                <label for="gebruikersnaam">Gebruikersnaam: </label>
                <input type="text" name="gebruikersnaam" id="gebruikersnaam"><br>
                <label for="wachtwoord">Wachtwoord: </label>
                <input type="password" name="wachtwoord" id="wachtwoord"><br>
                <label for="herhaal_wachtwoord">Herhaal wachtwoord: </label>
                <input type="password" name="herhaal_wachtwoord" id="herhaal_wachtwoord"><br>
                <input type="submit" name="registreren" value="Registreren" id="send_button">
            </form>
        </div>
    </main>
<?php
require_once ('Includes/Footer.php');
?>