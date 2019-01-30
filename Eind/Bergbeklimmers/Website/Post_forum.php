<?php
$titel = 'Post je eigen forumbijdrage';
require_once('Includes/Header.php');
require_once('Includes/functions.php');



if($post == ''){

}else {
    $sql = "INSERT INTO posts (kopje, tekst, bezoeker, rubriek, unixtijd) VALUES (?,?,?,?,?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($kop, $post, $gebruiker, $rubrieken, $unixtijd));
}
?>
    <main>
        <form method="post" action="Post_forum.php">
            <input type="hidden" name="unixtijd" value="<?=time()?>" required>
            <input type="hidden" name="gebruiker" value="<?php echo $_SESSION["username"];?>" required><br>
            <label for="rubrieken" >Rubrieken: </label>
            <select name="rubrieken" id="rubrieken" required>
                <?php
                rubriekenOphalen();
                echo $rubrieken;
                ?>
            </select><br>
            <label for="koppen">Onderwerp: </label>
            <select name="koppen" id="koppen" required>
                <?php
                koppenOphalenPostPagina();
                echo $koppenkeuze;
                ?>
                <option value="new">Nieuw onderwerp</option>
            </select><br>
            <label for="nieuw">Nieuw onderwerp: </label>
            <input type="text" name="nieuw" id="nieuw"><br>
            <label for="post">Tekst: </label>
            <textarea id="post" cols="100" rows="20" name="post" required></textarea><br>
            <input type="submit" name="verzenden" value="Verzenden">
        </form>
    </main>
<?php
require_once('Includes/Footer.php');
?>