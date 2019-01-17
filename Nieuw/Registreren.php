<?php
$titel = 'Registreren';
require_once('Includes/Header.php');

require('Includes/functions.php');
if(isset($_POST["register"])) {
    if (empty($_POST["username"]) || empty($_POST["name"]) || empty($_POST["password"]) || empty($_POST["email"])) {
        //header("location:Forum.html");
        $userErr = '<label>Vul SVP alles in.</label>';

    } else {
        $query = "SELECT COUNT (*) FROM bezoekers WHERE login = :username";
        $statement = $pdo->prepare($query);
        $statement->execute([':username'=> trimInput($_POST["username"])]);
        $data = $statement->fetch(PDO::FETCH_NUM);

        if ($data[0] > 0) {
            $userErr = "<h2>Gebruikersnaam en/of email bestaat al";
        } else {
            $query = "INSERT INTO bezoekers(login, naam, wachtwoord) VALUES(:username, :name, :password)";
            $statement = $pdo->prepare($query);
            $pwd = trimInput($_POST['password']);
            $statement->execute(
                array(
                    'username' => trimInput($_POST["username"]),
                    'name' => trimInput($_POST["name"]),
                    'password'=>    hash("sha256", $pwd)
                )
            );
            $count = $statement->rowCount();
            if ($count) {

                $_SESSION["username"] = trimInput($_POST["username"]);
                header("location:Forum.php");
            }
        }
    }
}
?>
    <main>
        <form class="" action="Registreren.php" method="post">
            <div class="container">
                <label for="">Inschrijven!</label><br><br><br>
                <input type="text" name="username" placeholder="Gebruikersnaam" required><br>
                <input type="password" name="password" placeholder="Wachtwoord" required><br>
                <input type="text" name="name" placeholder="Voor & Achternaam" required><br><br>

                <button type="submit" class="btn" name="register">Registreer!</button><br><br><br>

                <a href="login.php">Toch al een account? Log anders hier in!</a>
            </div>
    </main>
<?php
require_once('Includes/Footer.html');
?>