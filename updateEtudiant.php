<?php



try {
    if (isset($_POST["monBoutton"])) {
       
    $code=$_POST["Code"];
    $nom=$_POST["Nom"];
    $email=$_POST["Email"];
    $photo=$_FILES["Photo"]["name"];
    
     $conn = new PDO("mysql:host=localhost;dbname=etudiant", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($photo='') {
    $stmt = $conn->prepare("UPDATE classe SET Nom=?, Email=? WHERE Code=?");
    $stmt->execute(array($nom,$email,$code));        
    }
    else{
    $fichierTempo=$_FILES["Photo"]["tmp_name"];
    move_uploaded_file($fichierTempo, "images/".$photo);    
    $stmt = $conn->prepare("UPDATE classe SET Nom=?, Email=?, Photo=? WHERE Code=?");
    $stmt->execute(array($nom,$email,$photo,$code));
    }
    header('location: etudiant.php');
     exit;
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
  