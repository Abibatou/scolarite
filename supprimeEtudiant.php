<?php

try {
	if (isset($_GET["code"])) {
	
	
	$code=$_GET["code"];

     $conn = new PDO("mysql:host=localhost;dbname=etudiant", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DELETE FROM classe WHERE Code=?");
    $stmt->execute(array($_GET['code']));
     header('location: etudiant.php');
     exit();
 
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
	<title></title>
</head>
<body>

</body>
</html>

 

