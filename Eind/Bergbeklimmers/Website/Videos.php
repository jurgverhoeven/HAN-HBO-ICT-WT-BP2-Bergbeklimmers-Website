<?php
$titel = "Video's";
require_once('Includes/Header.php');
require_once ('Includes/functions.php');
?>
    <main>


        <iframe name="film" allowfullscreen></iframe>
        <?php
        require_once ('Includes/Zoek_Filter_Sorteer_Video.php');
        ?>
        <div class="video-wall">
            <?php
            tekenVideos();
            ?>
        </div>

    </main>
<?php
require_once('Includes/Footer.php');
?>