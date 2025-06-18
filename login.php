<?php
include "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn->begin_transaction();

    try{
        $email=$_POST['email'];
        $pass= $_POST['pass'];

        $stmt = $conn->prepare("SELECT password FROM utentiipad where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($dbPassword);
        $stmt->fetch();

        if(password_verify($pass, $dbPassword)){
            echo "Accesso riuscito";
        } else {
            echo "Email o password errati.";
        }
    }catch(Exception $e){
        die("<br>Errore");
    }
}

?>