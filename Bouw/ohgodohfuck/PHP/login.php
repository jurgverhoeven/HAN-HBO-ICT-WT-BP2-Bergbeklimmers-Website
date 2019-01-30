<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Pagina</title>
    <?php
//    require_once('database.php');
//    $sql = "SELECT * FROM bezoekers WHERE login = 'umied' and wachtwoord = '1234'";
//    $query = $dbh->prepare($sql);
//    $query->execute(array($pw, $username));
//    echo 'my nam jef'. $dbh->lastInsertId(). 'aaaaa.<br>';
//
session_start();

require('database.php');
    if(isset($_POST["login"])){
        if(empty($_POST["username"])   ||  empty($_POST["password"])){

          $message = '<label>Alle velden zijn benodigd</label>';
        }   else{

            $query ="SELECT * FROM bezoekers WHERE login = :username";
            $statement = $dbh->prepare($query);
            $pwd = $_POST['password'];
            $pwd = hash("sha256", $pwd);
            $statement->execute(
                    array(
                            'username'=>    $_POST["username"]
                            //'password'=>    password_hash("$password", PASSWORD_DEFAULT)//$_POST["password"]//password_needs_rehash("password", PASSWORD_DEFAULT)//password_verify("password", 'sha256')//hash('sha256', $password)//hash($_POST["password"], "SHA256")
                    )

//                        'password'=>     ($_POST["password"]))
            );
            //$count = $statement->rowCount();
            $data = $statement->fetch(PDO::FETCH_ASSOC);

//            var_dump(hash('sha256', $password));
//            var_dump(password_verify("password", 'sha256'));
//            var_dump($data);

            if($data['wachtwoord'] == $pwd){

                    //return true;
                    $_SESSION["username"] = $_POST["username"];
                    header("location:Forum.html");
                } else{
                    //return false;
                    $message = '<label>Verkeerde Data</label>';
                    echo $message;
                }
               // $_SESSION["password"] = $_POST["password"];
            }

    }
    ?>
</head>
<body>
<form class="" action="login.php" method="post">
    <div class="container">
        <label for="">Sign In</label>
        <input type="text" name="username" placeholder="Gebruikersnaam" value="">
        <input type="password" name="password" placeholder="Wachtwoord" value="">
        <a href="#">Forgot Password?</a>
        <button type="submit" class="btn" name="login">Login</button><br>
        <a href="registration.php">Geen account? Maak er een aan!</a>
    </div>
    <?php
    if(isset($message)){
        echo '<label class="text-danger">'.$message.'</label>';
    }
    ?>
</body>
</html>























<?php
/**
 * Created by PhpStorm.
 * User: Umied
 * Date: 14/01/2019
 * Time: 09:38
 */


































//require_once('database.php');
//$username = $password =$confirm_password = "";
//$username_err = $password_err = $confirm_password_err ="";
//
//if($_SERVER["REQUEST_METHOD"] == "POST"){
//    if(empty(trim($_POST["username"]))){
//        $username_err = "GELIEVE UW GEBRUIKERSNAAM INVULLEN";
//    }   else{
//
//    }
//}










//if($_SERVER["REQUEST_METHOD"] == "POST"){
//    if(empty(trim($_POST["username"]))){
//        $username_err = "Gelieve uw gebruikersnaam invullen.";
//
//    }   else{
//        $sql = "SELECT naam FROM bezoekers WHERE login = ?";
//        if($stmt = sqlsrv_prepare($dbh, $sql)){
//            ($stmt, "s", $param_username);
//        }
//    }
//
//
//}

try{

}   catch(PDOException $e){

}
