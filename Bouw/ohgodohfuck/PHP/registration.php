<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Registratie Pagina</title>
<head>
    <?php $userErr="";
    /**
     * Created by PhpStorm.
     * User: Umied
     * Date: 14/01/2019
     * Time: 19:54
     */
    session_start();
    require('database.php');
    if(isset($_POST["register"])) {
        if (empty($_POST["username"]) || empty($_POST["name"]) || empty($_POST["password"]) || empty($_POST["email"])) {
            //header("location:Forum.html");
            $userErr = '<label>Vul SVP alles in.</label>';

        } else {
            $query = "SELECT COUNT (*) FROM bezoekers WHERE login = :username OR email = :email";
            $statement = $dbh->prepare($query);
            $statement->execute([':username'=>$_POST["username"], ':email'=>$_POST["email"]]);
            $data = $statement->fetch(PDO::FETCH_NUM);

            if ($data[0] > 0) {
                $userErr = "<h2>Gebruikersnaam en/of email bestaat al";
            } else {
                //select count (username) from bezoekers where username = :username
                $query = "INSERT INTO bezoekers(login, naam, wachtwoord, email) VALUES(:username, :name, :password, :email)";
                $statement = $dbh->prepare($query);
                $pwd = $_POST['password'];
                $statement->execute(
                    array(
                        'username' => $_POST["username"],
                        'name' => $_POST["name"],
                        'password'=>    hash("sha256", $pwd),//password_hash($_POST["password"], PASSWORD_DEFAULT),
                        'email' => $_POST["email"]

                        //'c.password' => $_POST["c.password"]
                    )
                );
                $count = $statement->rowCount();
                if ($count) {

                    $_SESSION["username"] = $_POST["username"];
                    // $_SESSION["password"] = $_POST["password"];
                    header("location:Forum.html");
                }
            }
        }
    }

    ?>
<body>
<form class="" action="registration.php" method="post">
    <div class="container">
        <label for="">Inschrijven!</label><br><br><br>
        <input type="text" name="username" placeholder="Gebruikersnaam" value="" ><br>
        <input type="email" name="email" placeholder="Email Adress" value="" ><br>
        <input type="password" name="password" placeholder="Wachtwoord" value="" ><br>
      <input type="text" name="name" placeholder="Voor & Achternaam" value=""><br><br>

        <button type="submit" class="btn" name="register">Registreer!</button><br><br><br>        <?php echo $userErr; ?>

        <a href="login.php">Toch al een account? Log anders hier in!</a>
    </div>
</body>
</head>
</html>





