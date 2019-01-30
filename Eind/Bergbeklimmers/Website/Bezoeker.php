<?php
$titel = 'Bezoeker';
require_once('Includes/Header.php');

require('Includes/functions.php');
if(isset($_POST["login"])){
    if(empty($_POST["username"])   ||  empty($_POST["password"])){

        $message = '<label>Alle velden zijn benodigd</label>';
    }   else{

            $query = "SELECT * FROM bezoekers WHERE login = :username";
            $statement = $pdo->prepare($query);
            $pwd = opschonen($_POST['password']);
            $pwd = hash("sha256", $pwd);
            $statement->execute(
                array(
                    'username' => opschonen($_POST["username"])
                )
            );
        }

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if($data['wachtwoord'] == $pwd){
            $_SESSION["username"] = opschonen($_POST["username"]);
            header("location:Forum.php");
        } else{
            $message = '<label>Verkeerde Data</label>';
            echo $message;
        }
    }


?>
    <main>
        <form class="" action="Bezoeker.php" method="post">
            <div class="container">
                <h1>Log hier in</h1>
                <label for="username">Gebruikersnaam</label>
                <input type="text" name="username" placeholder="Gebruikersnaam" id="username" required><br>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" placeholder="Wachtwoord" id="password" required><br>
                <button type="submit" class="btn" name="login">Login</button><br><br>
                <a href="Registreren.php">Geen account? Maak er een aan!</a>
            </div>
        </form>
            <?php
            if(isset($message)){
                echo '<label class="text-danger">'.$message.'</label>';
            }
            ?>
    </main>
<?php
require_once('Includes/Footer.php');
?>