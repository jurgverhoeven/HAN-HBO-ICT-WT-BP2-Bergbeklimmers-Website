<?php
$titel = 'Registreren';
require_once('Includes/Header.php');

require('Includes/functions.php');
if(isset($_POST["register"])) {
    if (empty($_POST["username"]) || empty($_POST["name"]) || empty($_POST["password"])) {
        //header("location:Forum.html");
        $userErr = '<label>Vul SVP alles in.</label>';

    } else {
        try {

            $query = "SELECT COUNT (*) FROM bezoekers WHERE login = :username";
            $statement = $pdo->prepare($query);
            $statement->execute([':username' => opschonen($_POST["username"])]);
            $data = $statement->fetch(PDO::FETCH_NUM);
        }
        catch (PDOException $e){

        }
        if ($data[0] > 0) {
            $userErr = "<h2>Gebruikersnaam bestaat al";
        } else {
            $query = "INSERT INTO bezoekers(login, naam, wachtwoord) VALUES(:username, :name, :password)";
            $statement = $pdo->prepare($query);
            $pwd = opschonen($_POST['password']);
            $statement->execute(
                array(
                    'username' => opschonen($_POST["username"]),
                    'name' => opschonen($_POST["name"]),
                    'password'=>    hash("sha256", $pwd)
                )
            );
            $count = $statement->rowCount();
            if ($count) {

                $_SESSION["username"] = opschonen($_POST["username"]);
                header("location:Forum.php");
            }
        }
    }
}
?>
    <main>
        <form class="" action="Registreren.php" method="post">
            <div class="container">
                <label for="username">Gebruikersnaam: </label>
                <input type="text" name="username" placeholder="Gebruikersnaam" id="username" required><br>
                <label for="password">Wachtwoord: </label>
                <input type="password" name="password" placeholder="Wachtwoord" id="password" required><br>
                <label for="name">Naam: </label>
                <input type="text" name="name" placeholder="Voor & Achternaam" id="name" required><br><br>

                <button type="submit" class="btn" name="register">Registreer!</button><br><br><br>

                <a href="login.php">Toch al een account? Log anders hier in!</a>
            </div>
        </form>
    </main>
<?php
require_once('Includes/Footer.php');
?>