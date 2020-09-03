<?php 
	include 'database/connection.php';
	$item_id=isset($_GET['id'])? $_GET['id']:die('ERROR:Record ID not found');
	
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>
			<?php
			try
			{ 
			    //select data from DB
			    $query ="SELECT item from secret where id=:id";
			    //bind our ? to ID
			    $read=$conn->prepare($query);
			    $read->bindParam(":id",$item_id);
			    $read->execute();

			    //store record into an associative array
			    $row= $read->fetch(PDO::FETCH_ASSOC);

			    ///retrieve individual field data from the array
			    echo $row['item'];
			}
	        catch(PDOException $exception)
	        {
	            die('Error: ' .$exception->getmesssage());
	        } ?>				
			</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="no-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1>
							<?php
							try
							{ 
							    //select data from DB
							    $query ="SELECT item from secret where id=:id";
							    //bind our ? to ID
							    $read=$conn->prepare($query);
							    $read->bindParam(":id",$item_id);
							    $read->execute();

							    //store record into an associative array
							    $row= $read->fetch(PDO::FETCH_ASSOC);

							    ///retrieve individual field data from the array
							    echo $row['item'];
							}
					        catch(PDOException $exception)
					        {
					            die('Error: ' .$exception->getmesssage());
					        } ?>	</h1>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php">Home</a></li>
								<?php 
								try
								{
									$query = "SELECT id, item FROM secret";
									$statement = $conn->prepare($query);
									$statement->execute();
									while ($result = $statement->fetch(PDO::FETCH_ASSOC)) {
										extract($result);
										echo "<li><a href='secret.php?id={$id}'>{$item}</a></li>";
									}
									echo"<li><a href='create.php' class='btn btn-prinary'>Enter a new scp file</a></li>";
									if (isset($_GET['id'])){
										$id = isset($_GET['id'])? $_GET['id']:die('ERROR:Record ID not found');
										echo"<li><a href='update.php?id={$id}' class='btn btn-prinary'>Edit</a></li>
										<li><a href='javascript:void(0)' data-id='{$id}' class='btn btn-prinary deleteme'>Delete</a></li>";


									}
								}
								catch(PDOException $exception)
						        {
						            die('Error: ' .$exception->getmesssage());
						        }

								 ?>
							</ul>
						</nav>

				</section>

			<!-- Main -->
				<div id="main" class="wrapper style2">
					<?php 
					try
					{
						$query = "SELECT * from secret where id=:id";
					    //bind our ? to ID
					    $read=$conn->prepare($query);
					    $read->bindParam(":id",$item_id);
					    $read->execute();

					    //store record into an associative array
					    $row= $read->fetch(PDO::FETCH_ASSOC);
					    ?>
					    <div class="title">Object Class: <?php echo $row['class']; ?></div>
                          
					    
					   

						<div class="container">

							<!-- Content -->
								<div id="content">
									<article class="box post">
										
										<h2>Procedure:</h2><?php echo $row['procedure']; ?></p>
										<?php 
										if ($row['images']) {
											echo '<div class="imgof"><img src="images/'.$row['images'].'" alt="" /></div>';
										}
										
										?>
										
										<h2>Description:</h2> <?php echo $row['description']; ?>
										<?php 
										if ($row['refrence']) {
											echo "<h2>Reference:</h2><p>{$row['refrence']}</p>";
										}
										if ($row['additional']) {
											echo "<h2>Additional:</h2><p>{$row['additional']}</p>";
										}
										?>
									</article>
								</div>

						</div>
					    <?php
					}
					catch(PDOException $exception)
			        {
			            die('Error: ' .$exception->getmesssage());
			        }

					 ?>
					
				</div>
			<!-- Footer -->
				<section id="footer" class="wrapper">
					<div class="container">
						<div id="copyright">
							<ul>
								<li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>
		
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
				$('.deleteme').on("click",function(){
					var id  = $(this).data("id");

					var answer = confirm("Are you sure to delete this?");
					if (answer) {
						window.location.href = "delete.php?id="+id;
					}
				})
			</script>
	</body>
</html>