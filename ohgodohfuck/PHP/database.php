<?php
/**
 * Created by PhpStorm.
 * User: Umied
 * Date: 14/01/2019
 * Time: 09:37
 */
$hostname= "(local)";
$dbname = "themasite";
$username = "";
$password = "";
$email    = "";
try{
    $dbh = new PDO("sqlsrv:Server=$hostname;Database=$dbname;ConnectionPooling=0", "$username", "$password");

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch(PDOException $error)   {
    die ("Fout met de database: {$error->getMessage()}");
}
?>