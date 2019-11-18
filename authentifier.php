<?php
try {
     
    if (isset($_POST["LOGIN"])) {
        
    $login=$_POST["LOGIN"];
    $password=$_POST["PASSWORD"];
   
        $conn = new PDO("mysql:host=localhost;dbname=etudiant", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = $conn->prepare("SELECT * FROM utilisateur WHERE login=? AND password=?");
    $sql->execute(array($login,$password));
     if ($users=$sql->fetch()) {
      
     header("Location:etudiant.php");
     exit();

    }
    else{
   header("Location:login.php");
     exit();
    
    }
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