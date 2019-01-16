<?php
    require_once ('DB_connectie.php');
    $rubrieken = '';
    $koppen = '';
    $data = $dbh->query("SELECT * FROM  rubrieken");
    while ($row = $data->fetch()) {
        $rubrieken .= '<option value="' . "$row[rubriek]" . '">' . "$row[rubriek]" . "</option>";
    }

    $data = $dbh->query("SELECT DISTINCT kopje FROM  posts");
    while ($row = $data->fetch()) {
        $koppen .= '<option value="' . "$row[kopje]" . '">' . "$row[kopje]" . "</option>";
    }
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="stijl.css">
</head>
<body>
    <form method="post" action="Uitkomst.php">
        <input type="hidden" name="unixtijd" value="<?=time()?>" required>
        <label for="gebruiker">Gebruiker: </label>
        <input type="text" name="gebruiker" id="gebruiker" required><br>
        <label for="rubrieken" >Rubrieken: </label>
        <select name="rubrieken" id="rubrieken" required>
            <?php
            echo $rubrieken;
            ?>
        </select><br>
        <label for="koppen">Onderwerp: </label>
        <select name="koppen" id="koppen" required>
            <?php
            echo $koppen;
            ?>
            <option value="new">Nieuw onderwerp</option>
        </select><br>
        <label for="nieuw">Nieuw onderwerp: </label>
        <input type="text" name="nieuw" id="nieuw"><br>
        <label for="post">Tekst: </label>
<!--        <input type="text" name="post"><br>-->
        <textarea id="post" cols="100" rows="20" name="post" required></textarea><br>
        <input type="submit" name="verzenden" value="Verzenden">
    </form>
</body>
</html>