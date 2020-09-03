<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Enter a new scp item</title>
  </head>
     <body class="container">
      <h1 class="page_header">Enter a new scp item</h1>
      <?php
        
        if($_POST)
        {
            //connect to the database

            include 'database/connection.php';

            try
            {
                  //insert query

                  $query="insert into secret set item=:item,images=:images,class=:class,`procedure`=:procedure, description=:description,`refrence`=:refrence,`additional`=:additional";

                  //prepare query for execution
                  $statement=$conn->prepare($query);

                  $item=htmlspecialchars(strip_tags($_POST['item']));
                  $images=htmlspecialchars(strip_tags($_POST['images']));
                  $class = htmlspecialchars(strip_tags($_POST['class']));
                  $procedure=htmlspecialchars(strip_tags($_POST['procedure']));
                  $description=htmlspecialchars(strip_tags($_POST['description']));
                  $refrence=htmlspecialchars(strip_tags($_POST['refrence']));
                  $additional=htmlspecialchars(strip_tags($_POST['additional']));

                  //bind our parameter to our query
                  $statement->bindParam(':item',$item);
                  $statement->bindParam(':images',$images);
                  $statement->bindParam(':class',$class);
                  $statement->bindParam(':procedure',$procedure);
                   $statement->bindParam(':description',$description);
                  $statement->bindParam(':refrence',$refrence);
                  $statement->bindParam(':additional',$additional);

                  //specify when record was created and then bind
                  
                  //execute the query
                  if($statement->execute())
                  {
                    echo"<div class='alert alert-success'>Record was created</div>";
                  }
                  else
                  {
                    echo"<div class='alert alert-danger'>Unable to save record.</div>";
                  }

            }
            catch(PDOException $exception)
            {
                 die('ERROR: ' . $exception->getMessage());
            }
        }

    ?>
    <h2>please enter a new scp item using the form below....</h2>
    <form class="form-group bg1-dark text-light p-5" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>item:</label>
    <br>
    <input type="text" class="form-control" name="item" class="form-control">
    <br>
    <label>images:</label>
    <br>
    <input type="text" class="form-control" name="images" class="form-control">
    <br>
    <label>class:</label>
    <br>
    <input type="text" class="form-control" name="class" class="form-control">
    <br>
    <label>procedure:</label>
    <br>
    <input type="text" class="form-control" name="procedure" class="form-control">
    <br>
    <label>description:</label>
    <br>
    <input type="text"  class="form-control" name="description" class="form-control">
    <br>
    <label>refrence:</label>
    <br>
    <input type="text" class="form-control" name="refrence" class="form-control">
    <br>
    <label>additional:</label>
    <br>
    <input type="text" class="form-control" name="additional" class="form-control">
    <br>
    <input type="submit" value="Save" class="btn btn-primary">
    <a href="index.php" class="  button btn btn-warning">Back to 
    </form>
    index page</a></p>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>