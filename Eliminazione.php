<?php
include "Connection.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
        $conn->begin_transaction();
        try{

        
        $stmt = $conn->prepare("DELETE FROM ipad WHERE id = ?");
        $stmt->bind_param('i', $id);
            $stmt->execute();
        $conn->commit();
        echo "utente " . $id . " eliminato.";
        
        } catch(Exception $e){
            die("errore");
        }
    }
?>