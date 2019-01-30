<?php
    function verbindenMetDatabase() {
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
    verbindenMetDatabase();

function toonForumOverzicht() {
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
function opschonen($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$zoektekstForum = '';
$filterKoppenForum = '';
$sorteerForum = '';
if(empty($_POST['zoeken'])){
    $zoektekstForum = '';
}
else{
    $zoektekstForum = "and tekst like '%".opschonen($_POST['zoeken'])."%'";
}

if(empty($_POST['koppen'])){
    $filterKoppenForum = '';
}
else{
    $filterKoppenForum = "and kopje like '%".opschonen($_POST['koppen'])."%'";
}
if(empty($_POST['sorteer'])){
    $sorteerForum = '';
}
else if($_POST['sorteer'] == "naam_alfabet"){
    $sorteerForum = "order by bezoeker asc";
}
else if($_POST['sorteer'] == "naam_alfabet_andersom"){
    $sorteerForum = "order by bezoeker desc";
}
else{
    $sorteerForum = "order by unixtijd asc";
}


function toonGeopendeForum($geopendeRubriek) {
    global $pdo;
    global $zoektekstForum;
    global $filterKoppenForum;
    global $sorteerForum;
    $html = '';
    try {
        $data = $pdo->query("SELECT bezoeker, kopje, tekst, DATEADD(second, unixtijd, convert(datetime, '01/01/1970', 101)) as datum FROM posts WHERE rubriek = '$geopendeRubriek' $zoektekstForum $filterKoppenForum $sorteerForum");
        while ($row = $data->fetch()){
            $html .= "<tr><td>$row[bezoeker]</td><td>$row[kopje]</td><td>$row[tekst]</td><td>$row[datum]</td></tr>";
        }
        echo $html;
    } catch (PDOException $e) {
        echo "Kan de forum niet laden, ";
    }
}

function toonFilterOptiesForum($geopendeRubriek){
    global $pdo;
    global $koppenkeuze;
    try {
        $data = $pdo->query("SELECT DISTINCT kopje FROM  posts where rubriek = '$geopendeRubriek'");
        while ($row = $data->fetch()) {
            $koppenkeuze .= '<option value="' . "$row[kopje]" . '">' . "$row[kopje]" . "</option>";
        }
    }
    catch (PDOException $e){
        echo "Kan de filteropties niet laden, ";
    }
}

function koppenOphalenPostPagina(){
    global $pdo;
    global $koppenkeuze;
    try {
        $data = $pdo->query("SELECT DISTINCT kopje FROM  posts");
        while ($row = $data->fetch()) {
            $koppenkeuze .= '<option value="' . "$row[kopje]" . '">' . "$row[kopje]" . "</option>";
        }
    }
    catch (PDOException $e){
        echo "Kan de filteropties niet laden, ";
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
        echo "Kan de filteropties niet laden, ";
    }
}


if(empty($_POST['unixtijd'])){
    $unixtijd = '';
}
else {
    $unixtijd = opschonen($_POST['unixtijd']);
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
    $rubrieken = opschonen($_POST['rubrieken']);

}
if(empty($_POST['koppen'])){
    $kop = '';

}
else{
    $kop = opschonen($_POST['koppen']);

}
if(empty($_POST['post'])){
    $post = '';

}
else{
    $post = opschonen($_POST['post']);

}
if ($kop == 'new') {
    $kop = opschonen($_POST['nieuw']);
}










function tekenVideos(){
    global $pdo;
    $htmlVideos = '';
    $videoPad = 'youtube.com/embed/';
    $plaatjePad = 'Images/Video_Thumbnails/';
    global $zoektekstVideos;
    global $gekozenRubriek;
    global $orderVideos;
    try {
        $data = $pdo->query("SELECT titel, samenvatting, poster, link, rubriek FROM videos $gekozenRubriek $zoektekstVideos $orderVideos");
        while ($row = $data->fetch()){
            $htmlVideos .= '<a href="'."http://www.$videoPad$row[link]?autoplay=1".'"'.' target="film">
                        <div>
                            <h1>'."$row[titel]".'</h1>
                            <img src="'."$plaatjePad$row[poster]".'"'.' alt="'."$row[titel]".'"'.'>
                            <p>'."$row[samenvatting]".'</p>
                        </div>
                      </a>';
        }
        echo $htmlVideos;
    } catch (PDOException $e) {
        echo "Kan de videos niet laden, ";
    }
}

$rubriekenKeuzeVideos = '';


function toonFilterVideos(){
    global $pdo;
    global $rubriekenKeuzeVideos;
    $toevoegen = "WHERE rubriek = '";
    try {
        $data = $pdo->query("SELECT DISTINCT rubriek FROM  videos");
        while ($row = $data->fetch()) {
            $rubriekenKeuzeVideos .= '<option value="' . "$toevoegen$row[rubriek]'" . '">' . "$row[rubriek]" . "</option>";
        }
    }
    catch (PDOException $e){
        echo "Kan de filteropties niet laden, ";
    }
}
if(empty($_POST['koppen'])){
    $gekozenRubriek = '';
}
else{
    $gekozenRubriek = $_POST['koppen'];
}

$zoektekstVideos = '';
$orderVideos = '';
if(empty($_POST['zoeken'])){
    $zoektekstVideos = '';
}
else{
    $zoektekstVideos = "where samenvatting like '%".opschonen($_POST['zoeken'])."%'";
}

if(empty($_POST['sorteer'])){
    $orderVideos = '';
}
else if($_POST['sorteer'] == "naam_alfabet"){
    $orderVideos = "order by titel asc";
}
else if($_POST['sorteer'] == "naam_alfabet_andersom"){
    $orderVideos = "order by titel desc";
}


function tekenIndexVideos(){
    global $pdo;
    $html = '';
    $plaatjePad = 'Images/Video_Thumbnails/';
    try {
        $data = $pdo->query("SELECT top 3 titel, samenvatting, poster, link, rubriek FROM videos");
        while ($row = $data->fetch()){
            $html .= '<a href="'."Videos.php".'">
                        <div>
                            <h1>'."$row[titel]".'</h1>
                            <img src="'."$plaatjePad$row[poster]".'"'.' alt="'."$row[titel]".'"'.'>
                            <p>'."$row[samenvatting]".'</p>
                        </div>
                      </a>';
        }
        echo $html;
    } catch (PDOException $e) {
        echo "Kan de videos niet laden, ";
    }
}

?>