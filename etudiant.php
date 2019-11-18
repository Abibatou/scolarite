
<?php
try {
	 
    
     
    $conn = new PDO("mysql:host=localhost;dbname=etudiant", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("SELECT Code, Nom, Email, Photo FROM classe");
    $stmt->execute();
   
	 
    


    // set the resulting array to associative
    
    
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
        <a class="nav-link" href="logOut.php">LogOut </a>
      </li>
      
  </ul>
</div>
</nav>
	<div class="container">
		<div class="row">
			<div class="offset-md-3"></div>
			<div class="col-md-6">
					<h4>Liste des etudiants</h4>			
  					<table class="table table-striped spacer">
							<thead>
								<tr>
									<th>Code</th>
									<th>Nom</th>
									<th>Email</th>
									<th>Photo</th>
								</tr>
							</thead>
								<tbody>
									<?php  while($classe = $stmt->Fetch(PDO::FETCH_ASSOC)){?>

                                         
									<tr>
										<td><?php echo ($classe["Code"])?></td>
										<td><?php echo  ($classe["Nom"])?></td>
										<td><?php echo  ($classe["Email"])?></td>
										<td><img src="images/<?php echo  ($classe["Photo"])?>" width="100%" height="70%"></td>
										<td><a href="editEtudiant.php?code=<?php echo ($classe['Code'])?>">Edit</a></td>
										<td><a onclick="return confirm('Etes-vous sûre..?');" href="supprimeEtudiant.php?code=<?php echo ($classe['Code']);?>">Supprime</a></td>
									</tr>
								   <?php } ?>
								</tbody>
							
						</table>
						
			</div>
			<div class="offset-md-3"></div>
		</div>
	</div>
	

	

</body>
</html>