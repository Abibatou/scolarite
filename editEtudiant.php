<?php
try {
  if (isset($_GET["code"])) {
  $code=$_GET["code"];

     $conn = new PDO("mysql:host=localhost;dbname=etudiant", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT * FROM classe WHERE Code=?");
    $sql->execute(array($_GET['code']));
    $classe = $sql->Fetch(PDO::FETCH_ASSOC);
    
    }
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;



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
				<form action="updateEtudiant.php" method="POST" enctype="multipart/form-data">
					<h4>Saisir un etudiant</h4>
        


          <div class="form-group">
    <label for="Code">Code</label>
    <input type="hidden" class="form-control" name="Code"  value="<?php echo($classe["Code"])?>" >
  </div>
  <div class="form-group">
    <label for="Nom">Nom</label>
    <input type="text" class="form-control" name="Nom" value="<?php echo($classe['Nom'])?>" >
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" name="Email" value="<?php echo($classe['Email'])?>">
  </div>
  <div class="form-group">
    <label for="Photo">Photo</label>
    <input type="file" class="form-control" name="Photo" width="100%" height="70%">
    <img src="images/<?php echo($classe['Photo'])?>"/>
  </div>
  <div class="form-group">
   <input type="submit" class="btn btn-primary" name="monBoutton" ></input>
</div>

</form>
				
				</div>
			
			<div class="offset-md-3"></div>
		</div>
  
               <?php
  if (isset($_POST["monBoutton"])){
session_destroy();
header('location: etudiant.php');
exit;
}
?> 
	</div>

	

</body>
</html>
