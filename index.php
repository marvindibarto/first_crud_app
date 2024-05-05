<?php
   //Header und die DB Verbindung werden Importiert, genauso wie alle Variablen
   include("header.php");
   include("dbcon.php");
?>

<div class="box1">
    <h2>ALLE MITGLIEDER</h2>
    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Mitglied hinzufügen</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <?php
        $query = "SELECT * FROM `mitglieder`";
        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query ist gefailed" . mysqli_error($connection));
        }
    ?>
    
    <thead>
        <tr>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Stadt</th>
            <th>Bearbeiten</th>
            <th>Entfernen</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    $index = array_keys($row);
                                       
                    for($i=0; $i<count($index); $i++){
                        echo "<td>" . $row[$index[$i]] . "</td>";
                    }
                    ?>
                    <td> <a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Bearbeiten</a></td>
                    <td> <a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Entfernen</a></td>
                    </tr>
                    <?php
                }
            ?>
            
            
        
    </tbody>
</table>

<h6 style="color:green; text-align: center">
<?php
    if(isset($_GET['insert_msg'])){
    
        echo $_GET['insert_msg'];

    }
    elseif(isset($_GET['update_msg'])){
    
        echo $_GET['update_msg'];

    }
    elseif(isset($_GET['message'])){
    
        echo $_GET['message'];

    }
    elseif(isset($_GET['delete_msg'])){
    
        echo $_GET['delete_msg'];

    }
    
?>
</h6>

<form action="insert_data.php" method="post">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mitglied hinzufügen</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group" style="margin-bottom: 10px">
            <label for="first_name">Vorname</label>
            <input type="text" name="first_name" class="form-control">
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="last_name">Nachname</label>
            <input type="text" name="last_name" class="form-control">
        </div>
        <div class="form-group" style="margin-bottom: 10px">
            <label for="city">Stadt</label>
            <input type="text" name="city" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Abbrechen</button>
        <input type="submit" class="btn btn-primary" name="add_students" value="Hinzufügen">
      </div>
    </div>
  </div>
</div>
</form>
<?php
    include("footer.php");
?>