<?php 

include 'config/db.php';

    if(isset($_GET['id'])){
        
        $note_id = $_GET['id'];

        $delete_query = "delete from notes where id=:id";
        $stmt = $pdo->prepare($delete_query);
        $stmt->execute(['id'=>$note_id]);
        
        header("location: index.php");
    }



?>