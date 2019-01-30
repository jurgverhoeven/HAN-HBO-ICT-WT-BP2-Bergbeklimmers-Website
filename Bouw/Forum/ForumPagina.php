<?php
    require_once ('DB_connectie.php');

function trimInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    $html = '';
    $zoektekst = '';
    $koppen = '';
    $order = '';
    if(empty($_POST['zoeken'])){
        $zoektekst = '';
    }
    else{
        $zoektekst = "and tekst like '%".trimInput($_POST['zoeken'])."%'";
    }

    if(empty($_POST['koppen'])){
        $koppen = '';
    }
    else{
        $koppen = "and kopje like '%".trimInput($_POST['koppen'])."%'";
    }
    if(empty($_POST['sorteer'])){
        $order = '';
    }
    else if($_POST['sorteer'] == "naam_alfabet"){
        $order = "order by bezoeker asc";
    }
    else if($_POST['sorteer'] == "naam_alfabet_andersom"){
        $order = "order by bezoeker desc";
    }
    else{
        $order = "order by unixtijd asc";
    }

    $data = $dbh->query("SELECT *, DATEADD(second, unixtijd, convert(datetime, '01/01/1970', 101)) as datum FROM  posts where rubriek = 'Steken'$zoektekst $koppen $order");
    while ($row = $data->fetch()) {
        $html .= "<tr><td>$row[bezoeker]</td><td>$row[rubriek]</td><td>$row[kopje]</td><td>$row[tekst]</td><td>$row[datum]</td></tr>";
    }
    $data = $dbh->query("SELECT DISTINCT kopje FROM  posts where rubriek = 'Steken'");
    while ($row = $data->fetch()) {
        $koppen .= '<option value="' . "$row[kopje]" . '">' . "$row[kopje]" . "</option>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Overzicht</title>
    <link rel="stylesheet" type="text/css" href="stijl.css">
</head>
<body>
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
        echo $koppen;
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
    <table>
        <tr>
            <th>Gebruiker</th>
            <th>Rubriek</th>
            <th>Onderwerp</th>
            <th>Bericht</th>
            <th>Tijd</th>
        </tr>
        <?php
            echo $html;
        ?>
    </table>
</body>
</html>