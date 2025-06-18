<?php
include "Connection.php";
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn->begin_transaction();
    try{
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $passHashed = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO utentiIpad VALUES (?,?)");
        $stmt->bind_param("ss", $email, $passHashed);
        $stmt-> execute();

        $conn->commit();
        echo "Registrazione avvenuta con successo";
    }catch(Exception $e){
        die("<br>Errore.");
    }
}
?>