<?php
    session_start();
?>
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
        <li>
            <a href="Videos.php">Video's</a>
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
            <a href="Bezoeker.php">
                <?php
                    if(!empty($_SESSION['username'])){
                        echo $_SESSION['username'];
                    }
                    else{
                        echo 'Bezoeker';
                    }
                ?>
            </a>
            <div class="dropdown-menu">
                <?php
                if(empty($_SESSION['username'])) {

                 echo   '<a href = "Bezoeker.php"> Inloggen</a>';
                 echo   '<a href = "Registreren.php"> Registreren</a>';
                }
                else{
                    echo '<a href="logout.php">Uitloggen</a>';
                }
                ?>
            </div>
        </li>
    </ul>
</nav>
