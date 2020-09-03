<?php 
	include 'database/connection.php';
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>SCP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><a href="index.php">SCP</a></h1>
							<img class="imginnav" src="images/scplogo.png">
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="index.php">Home</a></li>
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
								}
								catch(PDOException $exception)
						        {
						            die('Error: ' .$exception->getmesssage());
						        }

								 ?>
							</ul>
						</nav>
						
				</section>

			<!-- Intro -->
				<section id="intro" class="wrapper style1">
					<div class="title">The Introduction</div>
					<div class="container">
						<p>
							The SCP Foundation[note 3] is a fictional organization documented by the web-based collaborative-fiction project of the same name. Within the website's fictional setting, the SCP Foundation is responsible for locating and containing individuals, entities, locations, and objects that violate natural law (referred to as SCPs). The real-world website is community-based and includes elements of many genres such as horror, science fiction, and urban fantasy.
						</p>
						<p>
							On the SCP Foundation wiki, the majority of works consist of "special containment procedures": structured internal documentation that describes an SCP object and the means of keeping it contained. The website also contains thousands of "Foundation Tales", short stories that take place within the SCP Foundation setting. The series has been praised for its ability to convey horror through its scientific and academic writing style, as well as for its high standards of quality.
						</p>

						<p>The Foundation has inspired numerous spin-off works, including the horror indie video game SCP – Containment Breach.></p>
						<div id="copyright">
							<ul>
								<li>&copy; 2020.</li><li>Design: Sagar</li>
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

	</body>
</html>