<?php

try {
	if (isset($_POST["monBoutton"])){
	$nom=$_POST["Nom"];
	$email=$_POST["Email"];
	$photo=basename($_FILES["Photo"]["name"]);
	$fichierTempo=$_FILES["Photo"]["tmp_name"];
	move_uploaded_file($fichierTempo, "images/".$photo);
	
    $conn = new PDO("mysql:host=localhost;dbname=etudiant", "root", "");
    $sql = "INSERT INTO classe (Nom, Email, Photo)
    VALUES ('$nom', '$email', '$photo')";
    // use exec() because no results are returned
    $conn->exec($sql);
    header('Location: etudiant.php');
      exit();
     
   }
      
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="etudiant.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Etudiants</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="etudiant.php">Etudiant</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="saveEtudiant.php">Saisie</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">LogOut </a>
      </li>
      
  </ul>
</div>
</nav>
	<div class="container">
		<div class="row">
			<div class="offset-md-3"></div>
			<div class="col-md-6">
				<form action="#" method="POST" enctype="multipart/form-data">
					<h4>Saisir un etudiant</h4>
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" name="Nom"  placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" name="Email"  placeholder="Email">
  </div>
  <div class="form-group">
    <label for="Photo">Photo</label>
    <input type="file" class="form-control" name="Photo" >
  </div>
  <div class="form-group">
   <input type="submit" class="btn btn-primary" name="monBoutton" ></input>
</div>
</form>
				
				</div>
			
			<div class="offset-md-3"></div>
		</div>
	</div>

	

</body>
</html>
