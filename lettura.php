<?php
include "Connection.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $conn->begin_transaction();
    try{
        $stmt = $conn->prepare("SELECT nome from ipad where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->bind_result($nome);
        if($nome == ""){
            echo "errore";
            die("errore");
        } else {
             $stmt->fetch();
        echo "Ciao ". $nome;
        }
       
    } catch(Exception $e){
        $conn->rollback();
        echo "errore...";
    }
    


}

?>