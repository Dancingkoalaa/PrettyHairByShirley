<?php

?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/AllPage.css">
<link rel="stylesheet" type="text/css" href="css/Home.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<html lang="en">
<head>
    <title>HOME | PrettyHairByShirley</title>
</head>
<header>
    <a href="Home.php"><img src="img/Logo.jpg" alt="Logo" id="center" width="200" height="120"></a>
</header>
<body>
    <div class="topnav" id="myTopnav">
        <a href="Home.php" class="active">Home</a>
        <a href="Prijslijst.php">Prijslijst</a>
        <a href="Klant/Producten.php">Producten</a>
        <a href="Contact.php">Contact</a>
        <a class="login" href="Login.php">Inloggen</a>
    </div>
    <div class="middle">
        <div class="container">
            <div class="mySlides">
                <div class="numbertext">1 / 6</div>
                <img src="img/Style1.jpg">
            </div>

            <div class="mySlides">
                <div class="numbertext">2 / 6</div>
                <img src="img/Style2.jpg">
            </div>

            <div class="mySlides">
                <div class="numbertext">3 / 6</div>
                <img src="img/Style3.jpg">
            </div>

            <div class="mySlides">
                <div class="numbertext">4 / 6</div>
                <img src="img/Style4.jpg"">
            </div>

            <div class="mySlides">
                <div class="numbertext">5 / 6</div>
                <img src="img/Style5.jpg">
            </div>

            <div class="mySlides">
                <div class="numbertext">6 / 6</div>
                <img src="img/Style6.jpg">
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
        <script src="js/Home.js"></script>
    </div>
    </div>
</body>

<footer>
    <a href="https://www.instagram.com/prettyhairbyshirley/"><img src="img/instagram.png" width="35px" height="30px"> </a>
    <a href="https://www.facebook.com/PrettyHairByShirley"><img src="img/facebook.png" width="35px" height="30px"></a>
</footer>


</html>