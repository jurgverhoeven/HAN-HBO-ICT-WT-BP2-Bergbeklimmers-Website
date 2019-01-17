<?php
    require_once ('functions.php');
?>

<form method="post" action="#">
    <label for="zoeken">Zoeken: </label>
    <input type="text" name="zoeken" id="zoeken" placeholder="Typ hier wat je in de tekst wil zoeken">
    <input type="submit" name="zoek" value="Zoek">
</form>
<form method="post" action="#">
    <label for="koppen">Filteren: </label>
    <select name="koppen" id="koppen" required>
        <option value="">Klik hier om te filteren op onderwerp</option>
        <?php
        displayFilter($rubriek);
        echo $koppenkeuze;
        ?>

    </select>
    <input type="submit" name="filter" value="Filter">
</form>
<form method="post" action="#">
    <label for="sorteer">Sorteren: </label>
    <select name="sorteer" id="sorteer" required>
        <option value="">Klik hier om te sorteren</option>
        <option value="naam_alfabet">Naam op alfabet</option>
        <option value="naam_alfabet_andersom">Naam op tegenovergesteld alfabet</option>
        <option value="datum">Naam op datum</option>
    </select>
    <input type="submit" name="sorteren" value="Sorteer">
</form>