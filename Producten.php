<?php
$producten = [
    "1" => [
        "productName" => "Appel",
        "Price" => '19.99',
    ],
    "2" => [
        "productName" => "Peer",
        "Price" => '21.99',
    ]
];

    include('includes/ProductList.php');
?>
<html lang="en">
    <link rel="stylesheet" type="text/css" href="css/Index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <head>
        <title>Producten | PrettyHairByShirley</title>
    </head>
    <header>
        <a href="Home.php"><img src="img/logo.png" alt="Logo" id="center" width="360" height="120"></a>
        <div class="topnav">
            <a class="active" href="Home.php">Home</a>
            <a href="Prijslijst.php">Prijslijst</a>
            <a href="#">Producten</a>
            <a href="#">Contact</a>
        </div>
    </header>
    <body>
        <a id="create" href="#">Voeg nieuw product toe</a>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Prijs</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producten as $index => $product) { ?>
                <tr>
                    <td><?=$index;?></td>
                    <td><?=$product['productname'];?></td>
                    <td><?=$product['price'];?></td>
                    <td><a href="detail.php?index=<?=$index?>">Details</a></td>
                    <td><a href="edit.php?index=<?=$index?>">Edit</a></td>
                    <?php } ?>
            </tbody>
        </table>
    </body>
</html>
