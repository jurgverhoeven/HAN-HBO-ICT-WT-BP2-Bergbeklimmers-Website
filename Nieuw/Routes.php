<?php
$titel = 'Forum Routes';
require_once('Includes/Header.php');
require_once ('Includes/functions.php');
$rubriek = 'Routes';
?>
    <main>
        <?php
        require_once ('Includes/Zoek_Filter_Sorteer_Forum.php');
        ?>
        <table>
            <tr>
                <th>Bezoeker</th>
                <th>Onderwerp</th>
                <th>Bericht</th>
                <th>Datum</th>
            </tr>
            <?php
            displayGeopendeForum($rubriek);
            ?>
        </table>
    </main>
<?php
require_once('Includes/Footer.html');
?>