<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Update the record</title>
  </head>
  <body class="container">
            <h1 class="page-header">Update product record</h1>

           
            <?php

              //check if id value was sent to this page via the get method (?=) from a link
            $id=isset($_GET['id'])? $_GET['id']:die('Error:Record id not found');

            // connect to the database

            include 'database/connection.php';

            if($_POST)
            {
             try
             {
              //update sql query
              $query="update secret set item=:item,images=:images,class=:class,`procedure`=:procedure,description=:description,`refrence`=:refrence,`additional`=:additional where id=:id";

              //prepare the query 
              $update=$conn->prepare($query);

              //save post values from the form
                 $id=htmlspecialchars(strip_tags($_POST['id']));
                  $item=htmlspecialchars(strip_tags($_POST['item']));
                   $images=htmlspecialchars(strip_tags($_POST['images']));
                    $class=htmlspecialchars(strip_tags($_POST['class']));
                     $procedure=htmlspecialchars(strip_tags($_POST['procedure']));
                      $description=htmlspecialchars(strip_tags($_POST['description']));
                   $refrence=htmlspecialchars(strip_tags($_POST['refrence']));
                    $additional=htmlspecialchars(strip_tags($_POST['additional']));



                    //bind our parameter to our query
                  $update->bindParam(':id',$id);
                  $update->bindParam(':item',$item);
                  $update->bindParam(':images',$images);
                  $update->bindParam(':class',$class);
                  $update->bindParam(':procedure',$procedure);
                  $update->bindParam(':description',$description);
                  $update->bindParam(':refrence',$refrence);
                  $update->bindParam(':additional',$additional);
                 
                  
                  //execute the update query
                  if($update->execute())
                  {
                    echo"<div class='alert alert-success'>Record {$id} was updated.</div>";
                  }
                  else
                  {
                      echo"<div class='alert alert-danger'>Unable to update recorder.Please try again.</div>";
                  }


             }
             catch(PDOException $exception)
             {
               die('Error: '. $exception->getmessage());
             }
            }
            else
            {
              echo "<div class='alert alert-danger'>Record is ready to be updated</div>";
            }
            // get the current records from the db based on the ID value
            
            try
            {
                 //select data form the db
              $query="select id,item,images,class,`procedure`,description,`refrence`,`additional` from secret where id=:id";
            
             //bind our ? to  id
              $read=$conn->prepare($query);
              $read->bindParam(":id",$id);
              $read->execute();
               //store record into an associative array
              $row=$read->fetch(PDO::FETCH_ASSOC);

              //retrieve individual field data from the array
              $item =$row['item'];
              $images=$row['images'];
              $class =$row['class'];
              $procedure =$row['procedure'];
              $description =$row['description'];
              $refrence=$row['refrence'];
              $additional =$row['additional'];
            

            
?>

   <h2>Use a form to enter a new SCP page record. </h2>

      <form class="form-group bg1-dark text-light p-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] .'?id='. $id);?>" method="POST" >
     
     
     <br>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>" placeholder="Page Name" require>
    

     <p>item</p>
     <br>
    <input type="text" class="form-control" name="item" value="<?php echo htmlspecialchars($item, ENT_QUOTES); ?>" placeholder="Page Name" require>
    <br><br>

    <p>images</p>
    <br>
    <input type="text" class="form-control" name="images"  value="<?php echo htmlspecialchars($images, ENT_QUOTES); ?>">
   

    <p>class</p>
    <br>
    <input type="text" class="form-control" name="class" value="<?php echo htmlspecialchars($class, ENT_QUOTES); ?>" placeholder="paragraph " require>
    <br>
    <p>procedure</p>
     <br>
     <textarea class="form-control" rows="5" name="procedure" require><?php echo htmlspecialchars($procedure, ENT_QUOTES); ?></textarea>
    <br><br>

    <p>description</p>
    <br>
         <textarea class="form-control" rows="5" name="description" require><?php echo htmlspecialchars($description, ENT_QUOTES); ?></textarea>

    <br><br>

    <p>refrence</p>
    <br>
         <textarea class="form-control" rows="5" name="refrence" require><?php echo htmlspecialchars($refrence, ENT_QUOTES); ?></textarea>

    <br>
    <p>additional</p>
    <br>
         <textarea class="form-control" rows="5" name="additional" require><?php echo htmlspecialchars($additional, ENT_QUOTES); ?></textarea>

    <br>
      <?php }
            catch(PDOException $exception)
            {
                die('Error: '.$exception->getmessage());
            } ?>
    <hr width="75%">
    <input type="submit" class="btn btn-primary" name="update" value="Save Changes">
</form>
<p><a href="index.php" class=" button btn btn-primary">Back to Index page</a></p>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>