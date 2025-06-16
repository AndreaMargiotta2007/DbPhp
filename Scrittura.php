<?php
include "Connection.php";
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $nome = $_POST['nome'];
    $conn->begin_transaction();
    try{
        $stmt = $conn->prepare("INSERT INTO ipad(nome) VALUES(?)");
        $stmt->bind_param("s", $nome);
        $stmt->execute();

        $conn->commit();

        echo "Riuscito";

    } catch(Exception $e){
        $conn->rollback();
        echo "errore";
    }
    

    $stmt->close();
}



?>

