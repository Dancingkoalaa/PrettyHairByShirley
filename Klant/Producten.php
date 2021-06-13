<?php
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
        <a href="../Home.php"><img src="../img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
    </header>
    <body>
    <div class="topnav">
        <a href="../Home.php">Home</a>
        <a href="../Prijslijst.php">Prijslijst</a>
        <a class="active" href="Producten.php">Producten</a>
        <a href="../Contact.php">Contact</a>
        <a class="login" href="../Login.php">Inloggen</a>
    </div>
    <div class="middle">
            <div class="grid-container">
            <?php foreach ($result as $index => $product) { ?>
                <div class="grid-item">
                    <a href="Details.php?index=<?=$product['id']?>" ><img src="<?=$product['Img']?>" width="100px" height="100px"></a>
                        <?=$product['Naam'];?>
                </div>
            <?php } ?>
            </div>
    </div>
    </body>
</html>
