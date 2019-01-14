<?php
function trimInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    require_once ('DB_connectie.php');
    $unixtijd = trimInput($_POST['unixtijd']);
    $gebruiker = trimInput($_POST['gebruiker']);
    $rubrieken = trimInput($_POST['rubrieken']);
    $kop = trimInput($_POST['koppen']);
    $post = trimInput($_POST['post']);

    if($kop == 'new'){
        $kop = trimInput($_POST['nieuw']);
    }

    $sql = "INSERT INTO posts (rubriek, gebruiker, kop, tekst, unixtijd) VALUES (:rubriek, :gebruiker, :kop, :tekst, :unixtijd)";
    $query = $dbh->prepare($sql);
    $query->execute(
            array(':rubriek'=>$rubrieken, ':gebruiker'=>$gebruiker, ':kop'=>$kop, ':tekst'=>$post, 'unixtijd'=>$unixtijd));



    $html = '';
    $data = $dbh->query("SELECT * FROM  posts");
    while ($row = $data->fetch()) {
        $html .= "<tr><td>$row[gebruiker]</td><td>$row[rubriek]</td><td>$row[kop]</td><td>$row[tekst]</td><td>$row[unixtijd]</td></tr>";
    }
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gelukt</title>
    <link rel="stylesheet" type="text/css" href="stijl.css">
</head>
<body>
    Je post is gepost!
    <table>
        <tr>
            <th>Gebruikersnaam</th>
            <th>Rubriek</th>
            <th>Kop</th>
            <th>Tekst</th>
            <th>Unixtijd</th>
        </tr>
        <?php
            echo $html;
        ?>
    </table>
</body>
</html>