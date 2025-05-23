<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data"><br>
        <h1>Formulaire</h1>
        <div class="input-box">
        <input type="text" name="Nom" placeholder="Nom" ><br>
        </div>
        <div class="input-box">
        <input type="text"  name="Email"  placeholder="Email" ><br>
        </div>
        <div class="input-box">
        <input class="sirr-btn" type="submit" value="Sirr">
        </div>
    </form>
</body>
</html>


<?php
    $servername = "localhost";
    $username = "root"; 
    $password = "Thereal15699";   
    $dbname = "DB";     
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie !";
    #$d=$conn->query('drop table Personne');
    #echo"$d";
    /*$sql= "CREATE TABLE Personne (
            id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom VARCHAR(20) NOT NULL,
            email VARCHAR(30) NOT NULL
          )";
    $conn->exec($sql);*/
    $sql= "INSERT INTO Personne (nom, email) values
                        ($name,$email)";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>


