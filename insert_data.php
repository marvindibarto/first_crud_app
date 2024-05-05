
<?php
   //Header und die DB Verbindung werden Importiert, genauso wie alle Variablen
   include("header.php");
   include("dbcon.php");
?>

<?php

    if(isset($_POST['add_students'])){

        //nach dem = in den eckigen Klammern von Post muss der name der Variable in der Form sein
        //auf der linken Seite ist egal was steht
        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
        $city = $_POST['city'];

        if($f_name == "" || empty($f_name)){

            header('location:index.php?message=Bitte den Vornamen eingeben!');

        }

        elseif($l_name == "" || empty($l_name)){

            header('location:index.php?message=Bitte den Nachnamen eingeben!');

        }

        elseif($city == "" || empty($city)){

            header('location:index.php?message=Bitte die Stadt eingeben!');

        }

        else{
            // $query = "INSERT INTO `mitglieder` (`first_name`, `last_name`, `city`) VALUES ($f_name, $l_name, $city)";
            // echo $query;
            // echo $connection;
            // $result = mysqli_query($connection, $query);
            $query = "INSERT INTO `mitglieder` (`first_name`, `last_name`, `city`) VALUES ('$f_name', '$l_name', '$city')";
            $result = mysqli_query($connection, $query);

                // if(!$result){
                //     die("Query fehlgeschlagen!" . mysqli_error());
                // }

                // else{
                //     header('location.index.php?insert_msg=Mitglied erfolgreich hinzugefügt');
                // }
                if(!$result){
                    die("Query fehlgeschlagen! " . mysqli_error($connection));
                } else {
                    header('location: index.php?insert_msg=Mitglied erfolgreich hinzugefügt');
                }

        }

    }

?>