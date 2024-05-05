<?php include ('dbcon.php');?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $query = "DELETE FROM `mitglieder` WHERE `id`=$id";
        $result= mysqli_query($connection, $query);

        if(!$result){
            die("Query fehlgeschlagen".mysqli_error());
        }

        else {
            header('location:index.php?delete_msg=Eintrag erfolgreich gelöscht!');
        }
    }
?>