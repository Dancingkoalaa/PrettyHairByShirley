<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}
?>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/Prijslijst.css">
<link rel="stylesheet" type="text/css" href="../css/AllPage.css">

<head>
    <title>Prijslijst | PrettyHairByShirley</title>
</head>
<header>
    <a href="HomeAdmin.php"><img src="../img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
</header>
<body>
<div class="topnav" id="myTopnav">
    <a href="HomeAdmin.php">Home</a>
    <a class="active" href="PrijslijstAdmin.php">Prijslijst</a>
    <a href="ProductenAdmin.php">Producten</a>
    <a href="AddUser.php">Gebruiker toevoegen</a>
    <a class="login" href="../Afmelden.php">Afmelden</a>
</div>
<div class="middle">
    <div class="prijs">
    <img src="../img/Prijslijst.png" height="100%" width="100%">
    </div>
</div>
</body>
<footer>
    <a href="https://www.instagram.com/prettyhairbyshirley/"><img src="../img/instagram.png" width="35px" height="30px"> </a>
    <a href="https://www.facebook.com/PrettyHairByShirley"><img src="../img/facebook.png" width="35px" height="30px"></a>
</footer>

</html>
