<?php
$index = $_GET['index'];
require_once('../includes/Config.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}

$sql = "SELECT * FROM producten WHERE id = $index";
$result = mysqli_query($db, $sql);
$producten = [];
while ($product = mysqli_fetch_assoc($result)) {
    $producten[] = $product;
    break;
}
?>
<html lang="en">
<head>
    <title>Detail</title>
    <link rel="stylesheet" href="../css/AllPage.css">
    <link rel="stylesheet" href="../css/details.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
</head>
<header>
    <a href="HomeAdmin.php"><img src="../img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
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
<ul>
    <img src="<?=$product['Img']?>" width="100px" height="100px">
    <li>Het product is: <?php print_r($product['Naam']);?></li>
    <li>De prijs van dit product is: <?php print_r($product['Prijs']);?></li>
    <li><?php print_r($product['Beschrijving'])?></li>
</ul>

<a class="back" href="ProductenAdmin.php">Back</a>
</div>
</body>
</html>

