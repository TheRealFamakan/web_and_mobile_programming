<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Création du répertoire pour les uploads
        if (isset($_FILES["Photo"]) && $_FILES["Photo"]["error"] == 0) {
            if (!file_exists("uploads")) {
                mkdir("uploads", 0777, true); 
            }

            $imageName = basename($_FILES["Photo"]["name"]);
            $imagePath = "uploads/" . $imageName;
            move_uploaded_file($_FILES["Photo"]["tmp_name"], $imagePath);
        } else {
            $imagePath = "";
        }

        // Récupération et sécurisation des données
        $Nom = htmlspecialchars($_POST["Nom"] ?? "");
        $Prenom = htmlspecialchars($_POST["Prenom"] ?? "");
        $Email = htmlspecialchars($_POST["Email"] ?? "");
    } else {
        header("Location: index.php");
        exit();
    }
?>

<form action="cible.php" method="post" enctype="multipart/form-data">
    <h1>Les informations saisies</h1>
    <div class="input-box">
        <input type="text" name="Nom" value="<?= $Nom ?>"><br>
    </div>
    <div class="input-box">
        <input type="text" name="Prenom" value="<?= $Prenom ?>"><br>
    </div>
    <div class="input-box">
        <input type="text" name="Email" value="<?= $Email ?>"><br>
    </div>
    <div class="input-box">
        <input type="file" name="Photo"><br>
    </div>

    <div class="input-box">
        <?php if ($imagePath): ?>
            <p>Image :</p>
            <img src="<?= $imagePath ?>" style="width:200px;">
        <?php else: ?>
            <p>Aucune image reçue.</p>
        <?php endif; ?>
    </div>

    <div class="input-box">
        <input class="sirr-btn" type="submit" value="Update">
    </div>
</form>
