<?php
    $titel = 'Home';
    require_once('Includes/Header.php');
    require_once('Includes/functions.php');
?>
<main>
    <div>
            <h2>Welkom op Bergbeklimmers.nl!</h2>
            <p>Neem eens een flinke adem in.. het voelt wel een beetje duf, of niet? Nou, als je iets intens wilt voelen door je neusgaten, dan leest u gauw verder!.</p>
            <p>Op onze site willen wij u inspireren. Wij willen dat u de bergen beklimt, jong of oud, het maakt niet uit! De bergen bestaan al miljoenen jaren en het is ons recht om ze te beklimmen.</p>
            <p>Bezoekt u eens de forums om met andere berg-fanaten te spreken over bergbeklimmings gerelateerde onderwerpen te spreken, of kijkt u naar de video's die u zeker zullen inspireren.</p>
            <p>Bent u onder de indruk? Meld dan GRATIS aan!</p>
            <p>De doelgroep die wij proberen te bereiken zijn de mensen die als hobby of als beroep bergbeklimmen uitoefenen. Bergbeklimmers kunnen informatie over het onderwerp vinden, instructiefilmpjes bekijken en op elkaars vragen reageren.</p>
            <p>Zodat bergbeklimmers elkaar kunnen helpen bij vragen en adviezen kunnen geven aan elkaar.  Dit kunnen zowel professionele bergbeklimmers zijn als de beginnende bergbeklimmers met weinig ervaring. </p>
    </div>
    <h2>Kijk ook eens op onze forum</h2>
    <table>
        <tr>
            <th>Rubrieken</th>
            <th>Onderwerpen</th>
        </tr>
        <?php
        toonForumOverzicht();
        ?>
    </table>
    <h2>Onze website bevat ook video's. Klik hieronder op een video om naar de pagina te gaan.</h2>
    <div class="video-wall">
        <?php
            tekenIndexVideos();
        ?>
    </div>
</main>
<?php
    require_once('Includes/Footer.php');
?>