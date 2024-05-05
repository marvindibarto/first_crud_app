<?php
   //Header und die DB Verbindung werden Importiert, genauso wie alle Variablen
   include("header.php");
   include("dbcon.php");
?>

<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM `mitglieder` WHERE `id` = $id";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query ist gefailed" . mysqli_error($connection));
        }

        else {
            $row = mysqli_fetch_assoc($result);
        }
    }
?>

<?php

    if(isset($_POST['update_students'])){
        $fname=$_POST['first_name'];
        $lname=$_POST['last_name'];
        $city=$_POST['city'];
        
        if(isset($_GET['id_new'])){
            $idnew=$_GET['id_new'];
        }
        
        //hier noch die Validation vom Update einbauen - Error Message nicht vergessen!
        // if($f_name == "" || empty($f_name)){

        //     header('location:index.php?message=Bitte den Vornamen eingeben!');

        // }

        // elseif($l_name == "" || empty($l_name)){

        //     header('location:index.php?message=Bitte den Nachnamen eingeben!');

        // }

        // elseif($city == "" || empty($city)){

        //     header('location:index.php?message=Bitte die Stadt eingeben!');

        // }

        // else{

        $query = "UPDATE `mitglieder` SET `first_name`='$fname', `last_name`='$lname', `city`='$city' WHERE `id`=$idnew";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query ist gefailed" . mysqli_error($connection));
        }
        else{
            header('location:index.php?update_msg=Daten erfolgreich bearbeitet!');
        }
    }

?>



<form action="update_page_1.php?id_new=<?php echo $id;?>" method="post" >
    <div class="form-group" style="margin-bottom: 10px">
        <label for="first_name">Vorname</label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name'] ?>">
    </div>
    <div class="form-group" style="margin-bottom: 10px">
        <label for="last_name">Nachname</label>
        <input type="text" name="last_name" class="form-control"  value="<?php echo $row['last_name'] ?>">
    </div>
    <div class="form-group" style="margin-bottom: 10px">
        <label for="city">Stadt</label>
        <input type="text" name="city" class="form-control"  value="<?php echo $row['city'] ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="update_students" value="Änderungen speichern">

</form>

<?php
   //Header und die DB Verbindung werden Importiert, genauso wie alle Variablen
   include("footer.php");
   ?>