<?php
require_once('../includes/Config.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}

//validatie form

if (isset($_POST['submit'])) {
    if (empty($_POST['Naam'])) {
        $errors['Naam'] = "Gelieve dit veld te invullend";
    }
    if (empty($_POST['Prijs'])) {
        $errors['Prijs'] = "Gelieve dit veld te invullend";
    }
    if (empty($_POST['Beschrijving'])) {
        $errors['Beschijving'] = "Gelieve dit veld te invullend";
    }

    if (empty($errors)) {
        $Img = mysqli_escape_string($db, htmlspecialchars($_POST['Img']));
        $Naam = mysqli_escape_string($db, htmlspecialchars($_POST['Naam']));
        $Prijs = mysqli_escape_string($db, htmlspecialchars($_POST['Prijs']));
        $Beschrijving = mysqli_escape_string($db, htmlspecialchars($_POST['Beschrijving']));
        $sql = "INSERT INTO producten (Img, Naam, Prijs, Beschrijving) VALUES ('$Img', '$Naam', '$Prijs', '$Beschrijving')";
        $result = mysqli_query($db, $sql);
        header("location:ProductenAdmin.php");
    }
}
?>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/Producten.css">
<link rel="stylesheet" type="text/css" href="../css/Create.css">
<link rel="stylesheet" type="text/css" href="../css/AllPage.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
<head>
    <title>Producten | PrettyHairByShirley</title>
</head>
<header>
    <a href="../Home.php"><img src="../img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
</header>
<body>
<div class="topnav" id="myTopnav">
    <a href="HomeAdmin.php" class="active">Home</a>
    <a href="PrijslijstAdmin.php">Prijslijst</a>
    <a href="ProductenAdmin.php">Producten</a>
    <a href="AddUser.php">Gebruiker toevoegen</a>
    <a class="login" href="../Afmelden.php">Afmelden</a>
</div>
    <div class="middle">
        <div class="center">
            <h1>Maximale text lengte is 255</h1>
            <form action="" method="post">
                <div>
                    <input type="text" name="Img" value="../img/">
                </div>
                <div>
                    <p><?= isset($errors['Naam']) ? $errors['Naam'] : ""?></p>
                    <input placeholder="Naam" type="text" name="Naam">
                </div>
                <div>
                    <p><?= isset($errors['Prijs']) ? $errors['Prijs'] : ""?></p>
                    <input placeholder="Prijs" type="number" name="Prijs" step=".01">
                </div>
                <div>
                    <p><?= isset($errors['Beschijving']) ? $errors['Beschijving'] : ""?></p>
                    <input placeholder="Beschrijving" type="text" name="Beschrijving">
                </div><br>
                <div>
                    <input type="submit" name="submit" value="toevoegen">
                    <a href="ProductenAdmin.php">Terug</a>
                </div>
            </form>
        </div>
    </div>
</body>
