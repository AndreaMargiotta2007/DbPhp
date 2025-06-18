<?php

$conn = mysqli_connect("localhost","root","","ciao");
if(!$conn){
    die("connessione fallita.");
} else {
    echo "Connessione avvenuta con successo!";
}

?>
