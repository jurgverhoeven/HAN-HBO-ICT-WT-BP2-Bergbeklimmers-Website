<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titel; ?></title>
    <link rel="stylesheet" href="CSS/Style.css">
    <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
    <div>
        <a href="index.php"><img src="Images/Logo.png" alt="Berg Logo"></a>
        <h1>
            Bergbeklimmers
        </h1>
    </div>
</header>
<nav>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li class="dropdown">
            <a href="Video's.php">Video's</a>
            <div class="dropdown-menu">
                <a href="https://www.youtube.com/embed/Phl82D57P58" target="film">The North Face: Alex Honnold <br> El Sendero Luminoso</a>
                <a href="https://www.youtube.com/embed/Hu8TJKMtmtI" target="film">Rock-Climbing Goats</a>
                <a href="https://www.youtube.com/embed/5P5akoQ_eNI" target="film">11-Year-Old Girl Shatters Climbing Records</a>
                <a href="https://www.youtube.com/embed/bEpMR86wxeQ" target="film">Scale Yosemite's El Capitan in Google Maps</a>
                <a href="https://www.youtube.com/embed/SR1jwwagtaQ" target="film">The ascent of Alex Honnold</a>
                <a href="https://www.youtube.com/embed/HY3pDs3iKfk" target="film">GoPro: Rock Climbing China's White Mountain With Abond</a>
                <a href="https://www.youtube.com/embed/Imiz_vi_Ozg" target="film">Climbing the highest mountains in Europe, Top 10</a>
                <a href="https://www.youtube.com/embed/HRgNI7ecZlE" target="film">Climbing the Savage Mountain (K2 The Killer Mountain)</a>
                <a href="https://www.youtube.com/embed/XRwrpXf5V6c" target="film">CLIMBING MOUNT KILIMANJARO</a>
                <a href="https://www.youtube.com/embed/zp72WjMVhTQ" target="film">Annapurna III – Unclimbed</a>
            </div>
        </li>

        <li class="dropdown">
            <a href="Forum.php">Forum</a>
            <div class="dropdown-menu">
                <a href="Bergen.php">Rubriek Bergen</a>
                <a href="Reisgenoten.php">Rubriek Reisgenoten</a>
                <a href="Routes.php">Rubriek Routes</a>
                <a href="Uitrusting.php">Rubriek Uitrusting</a>
                <a href="Vermist.php">Rubriek Vermist</a>
            </div>
        </li>
        <li>
            <a href="Over_ons.php">Over ons</a>
        </li>
        <li class="dropdown" id="bezoeker">
            <a href="Bezoeker.php">Bezoeker</a>
            <div class="dropdown-menu">
                <a href="Bezoeker.php">Inloggen</a>
                <a href="Registreren.php">Registreren</a>
                <a href="Contact.php">Contact</a>
            </div>
        </li>
        <li>
            <form method="post">
                <label for="titel">Zoek video: </label><br>
                <input type="text" name="titel" id="titel" required><br>
                <input type="submit" name="zoeken" value="zoeken">
            </form>
        </li>
    </ul>
</nav>
