<?php
include "connection.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $conn->begin_transaction();

    try{
        $email=$_POST['email'];
        $pass= $_POST['pass'];

        $stmt = $conn->prepare("SELECT pass FROM utentiipad where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 0){
            echo "Email non trovata.";
            $conn->rollback();
        } else {
            $stmt->bind_result($dbPassword);

        $stmt->fetch();
        }
        

        if(password_verify($pass, $dbPassword)){
            echo "Accesso riuscito";
            $conn->commit();
        } else {
            echo "Email o password errati.";
            $conn->rollback();
        }
        
    }catch(Exception $e){
        die("<br>Errore");
    }
}

?>