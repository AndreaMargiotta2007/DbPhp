<?php
include "Connection.php";
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $nome = $_POST['nome'];

    $stmt = $conn->prepare("INSERT INTO ipad(nome) VALUES(?)");
    $stmt->bind_param("s", $nome);
    $stmt->execute();

    $stmt->close();
    
}



?>

