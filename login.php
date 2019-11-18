<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="etudiant.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Etudiants</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="offset-md-3"></div>
			<div class="col-md-6">
				<form action="authentifier.php" method="POST">
					<h4>Authentification</h4>
  <div class="form-group">
    <label for="LOGIN">Login</label>
    <input type="text" class="form-control" name="LOGIN"  placeholder="Login">
  </div>
  <div class="form-group">
    <label for="PASSWORD">Password</label>
    <input type="password" class="form-control" name="PASSWORD"  placeholder="Password">
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
