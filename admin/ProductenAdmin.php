<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}
require_once('../includes/Config.php');

$sql = "SELECT * FROM producten";
$result = mysqli_query($db, $sql);
$producten = [];
while ($row = mysqli_fetch_assoc($result)) {
    $producten[] = $row;
    break;
}
?>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/Producten.css">
<link rel="stylesheet" type="text/css" href="../css/AllPage.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
<head>
    <title>Producten | PrettyHairByShirley</title>
</head>
<header>
    <a href="HomeAdmin.php"><img src="../img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
</header>
<body>
<div class="topnav">
    <a href="HomeAdmin.php">Home</a>
    <a href="PrijslijstAdmin.php">Prijslijst</a>
    <a class="active" href="ProductenAdmin.php">Producten</a>
    <a href="AddUser.php">Gebruiker toevoegen</a>
    <a class="login" href="../Afmelden.php">Afmelden</a>
</div>
<div class="middle">
    <div class="center">
        <a class="button" id="create" href="Create.php">Voeg nieuw product toe</a> <br>
            <?php foreach ($result as $index => $product) { ?>
                <?=$product['id']?>
                <!--<td><img src="<?=$product['Img']?>" alt="man show that image"></td>-->
                <?=$product['Naam'];?>
                <?=$product['Prijs'];?>
                <?=$product['Beschrijving'];?>
                <a class="button" href="Details.php?index=<?=$product['id']?>">Details</a>
                <a class="button" href="Edit.php?index=<?=$product['id']?>">Edit</a>
                <a class="button" href="Delete.php?index=<?=$product['id']?>">Delete</a><br>
            <?php } ?>
    </div>
</div>
</body>
</html>
