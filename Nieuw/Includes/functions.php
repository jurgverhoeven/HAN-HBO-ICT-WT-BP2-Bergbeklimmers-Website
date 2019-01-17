<?php
    function connectToDatabase() {
    $hostname = "(local)"; //Naam van de Server
    $dbname = "themasite";    //Naam van de Database
    $username = "";      //Inlognaam
    $pw = "";      //Password
    global $pdo;
    try {
        $pdo = new PDO ("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$pw");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e){
        echo "Probleem met de verbinding met de database, ".$e->getMessage();
    }
    }
    connectToDatabase();

function displayForumOverzicht() {
    global $pdo;
    $html = '';
    try {
        $data = $pdo->query("SELECT distinct rubriek, kopje FROM posts");
        while ($row = $data->fetch()){
            $html .= "<tr><td><a href='$row[rubriek].php'>$row[rubriek]</a></td><td>$row[kopje]</td></tr>";
        }
        echo $html;
    } catch (PDOException $e) {
        echo "Kan overzicht van forums niet laden, ".$e->getMessage();
    }

}
function trimInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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


function displayGeopendeForum($geopendeRubriek) {
    global $pdo;
    global $zoektekst;
    global $koppen;
    global $order;
    $html = '';
    try {
        $data = $pdo->query("SELECT bezoeker, kopje, tekst, DATEADD(second, unixtijd, convert(datetime, '01/01/1970', 101)) as datum FROM posts WHERE rubriek = '$geopendeRubriek' $zoektekst $koppen $order");
        while ($row = $data->fetch()){
            $html .= "<tr><td>$row[bezoeker]</td><td>$row[kopje]</td><td>$row[tekst]</td><td>$row[datum]</td></tr>";
        }
        echo $html;
    } catch (PDOException $e) {
        echo "Kan de forum niet laden, ".$e->getMessage();
    }
}

function displayFilter($geopendeRubriek){
    global $pdo;
    global $koppenkeuze;
    try {
        $data = $pdo->query("SELECT DISTINCT kopje FROM  posts where rubriek = '$geopendeRubriek'");
        while ($row = $data->fetch()) {
            $koppenkeuze .= '<option value="' . "$row[kopje]" . '">' . "$row[kopje]" . "</option>";
        }
    }
    catch (PDOException $e){
        echo "Kan de filteropties niet laden, ".$e->getMessage();
    }
}

function koppenOphalen(){
    global $pdo;
    global $koppenkeuze;
    try {
        $data = $pdo->query("SELECT DISTINCT kopje FROM  posts");
        while ($row = $data->fetch()) {
            $koppenkeuze .= '<option value="' . "$row[kopje]" . '">' . "$row[kopje]" . "</option>";
        }
    }
    catch (PDOException $e){
        echo "Kan de filteropties niet laden, ".$e->getMessage();
    }
}

function rubriekenOphalen(){
    global $pdo;
    global $rubrieken;
    try {
        $data = $pdo->query("SELECT DISTINCT rubriek FROM  rubrieken");
        while ($row = $data->fetch()) {
            $rubrieken .= '<option value="' . "$row[rubriek]" . '">' . "$row[rubriek]" . "</option>";
        }
    }
    catch (PDOException $e){
        echo "Kan de filteropties niet laden, ".$e->getMessage();
    }
}


if(empty($_POST['unixtijd'])){
    $unixtijd = '';
}
else {
    $unixtijd = trimInput($_POST['unixtijd']);
}
if(empty($_POST['gebruiker'])){
    $gebruiker = '';
}
else {
    $gebruiker = $_POST['gebruiker'];
}
if(empty($_POST['rubrieken'])){
    $rubrieken = '';

}
else{
    $rubrieken = trimInput($_POST['rubrieken']);

}
if(empty($_POST['koppen'])){
    $kop = '';

}
else{
    $kop = trimInput($_POST['koppen']);

}
if(empty($_POST['post'])){
    $post = '';

}
else{
    $post = trimInput($_POST['post']);

}
if ($kop == 'new') {
    $kop = trimInput($_POST['nieuw']);
}










function tekenVideos(){

}

?>