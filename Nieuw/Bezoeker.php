<?php
$titel = 'Bezoeker';
require_once('Includes/Header.php');

require('Includes/functions.php');
if(isset($_POST["login"])){
    if(empty($_POST["username"])   ||  empty($_POST["password"])){

        $message = '<label>Alle velden zijn benodigd</label>';
    }   else{

        $query ="SELECT * FROM bezoekers WHERE login = :username";
        $statement = $pdo->prepare($query);
        $pwd = trimInput($_POST['password']);
        $pwd = hash("sha256", $pwd);
        $statement->execute(
            array(
                'username'=>    trimInput($_POST["username"])
            )
        );
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if($data['wachtwoord'] == $pwd){
            $_SESSION["username"] = trimInput($_POST["username"]);
            header("location:Forum.php");
        } else{
            $message = '<label>Verkeerde Data</label>';
            echo $message;
        }
    }

}
?>
    <main>
        <form class="" action="Bezoeker.php" method="post">
            <div class="container">
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" placeholder="Gebruikersnaam" required><br>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" placeholder="Wachtwoord" required><br>
                <button type="submit" class="btn" name="login">Login</button><br><br>
                <a href="Registreren.php">Geen account? Maak er een aan!</a>
            </div>
            <?php
            if(isset($message)){
                echo '<label class="text-danger">'.$message.'</label>';
            }
            ?>
    </main>
<?php
require_once('Includes/Footer.html');
?>