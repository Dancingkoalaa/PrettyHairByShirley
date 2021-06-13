<?php
require_once('../includes/Config.php');

session_start();

if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}
if (isset($_POST['submit'])){
    $sql= "DELETE FROM producten WHERE id=" . mysqli_escape_string($db, $_POST['id']);
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    header('location:ProductenAdmin.php');
    exit();
} elseif (isset($_GET['index'])){
    $id = $_GET['index'];
    $sql = "SELECT id, Naam FROM producten WHERE id=" . mysqli_escape_string($db, $id);
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
<div class="topnav" id="myTopnav">
    <a href="HomeAdmin.php" class="active">Home</a>
    <a href="PrijslijstAdmin.php">Prijslijst</a>
    <a href="ProductenAdmin.php">Producten</a>
    <a href="AddUser.php">Gebruiker toevoegen</a>
    <a class="login" href="../Afmelden.php">Afmelden</a>
</div>
    <h2>Weet u zeker dat u dit product wilt verwijderen?</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$product['id']?>">
        <input type="submit" name="submit" value="Verwijderen">
        <div class="button">
            <a href="ProductenAdmin.php">Terug</a>
        </div>
    </form>
</body>
