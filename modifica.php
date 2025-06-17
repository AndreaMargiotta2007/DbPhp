<?php
include "Connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $conn->begin_transaction();
    try{
        $nome = $_POST['nome'];
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE ipad set nome = ? where id = ?");
        $stmt->bind_param('si', $nome, $id);

        $stmt->execute();

        $conn->commit();
        echo "fatto";
    }catch(Exception $e){
        $conn->rollback();
        echo "errore";
    }
}

?>