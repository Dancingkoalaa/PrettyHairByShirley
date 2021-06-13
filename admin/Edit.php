<?php
require_once('../includes/Config.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}

if (isset($_POST['Submit'])){
    $img = mysqli_escape_string($db, htmlspecialchars($_POST['Img']));
    $Naam = mysqli_escape_string($db, htmlspecialchars($_POST['Naam']));
    $Prijs = mysqli_escape_string($db, htmlspecialchars($_POST['Prijs']));
    $Beschrijving = mysqli_escape_string($db, htmlspecialchars($_POST['Beschrijving']));
    $sql= "UPDATE producten SET Img='$img', Naam='$Naam', Prijs='$Prijs', Beschrijving='$Beschrijving'WHERE id=" . mysqli_escape_string($db, htmlspecialchars($_POST['id']));
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    header('location:ProductenAdmin.php');
    exit();
} elseif (isset($_GET['index'])){
    $id = $_GET['index'];
    $sql = "SELECT * FROM producten WHERE id=" . mysqli_escape_string($db, $id);
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result)==1){
        $product = mysqli_fetch_assoc($result);
    } else {
        header('location:ProductenAdmin.php');
        exit();
    }
}else {
    header('location:ProductenAdmin.php');
    exit();
}
?>

<html lang="en">
    <head>
        <title>Edit</title>
        <link rel="stylesheet" href="../css/AllPage.css">
    </head>
    <header>
        <a href="../Home.php"><img src="../img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
        <div class="topnav" id="myTopnav">
            <a href="HomeAdmin.php" class="active">Home</a>
            <a href="PrijslijstAdmin.php">Prijslijst</a>
            <a href="ProductenAdmin.php">Producten</a>
            <a href="AddUser.php">Gebruiker toevoegen</a>
            <a class="login" href="../Afmelden.php">Afmelden</a>
        </div>
    </header>
    <body>
        <div class="middle">
            <h2>Edit</h2>
            <form action="" method="post">
                <div><input type="hidden" name="id" value="<?= $product['id']?>"></div>
                <div><input type="text" name="Img" value="<?= $product['Img']?>"></div>
                <div><input type="text" name="Naam" value="<?= $product['Naam']?>"></div>
                <div><input type="number" name="Prijs" step=".01" value="<?= $product['Prijs']?>"></div>
                <div><input type="text" name="Beschrijving" value="<?= $product['Beschrijving']?>"></div>
                <div><input type="submit" name="Submit" value="Bewerk"></div>
                <a href="ProductenAdmin.php">Back</a>
            </form>
        </div>
    </body>
</html>