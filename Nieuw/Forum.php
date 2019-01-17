<?php
$titel = 'Forum';
    require_once('Includes/Header.php');
    require_once('Includes/functions.php');
?>
    <main>
        <table>
            <tr>
                <th>Rubrieken</th>
                <th>Onderwerpen</th>
            </tr>
                <?php
                    displayForumOverzicht();
                ?>
        </table>
        <?php
            if(!empty($_SESSION["username"])){
                echo '<a href="Post_forum.php">Schrijf hier uw eigen bijdrage aan deze forums</a>';
            }
        ?>

    </main>
<?php
    require_once('Includes/Footer.html');
?>