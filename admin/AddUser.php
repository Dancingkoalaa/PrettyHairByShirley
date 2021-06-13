<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('location: ../Login.php');
}

require_once ('../includes/Config.php');

$username = $password = "";
$errors = [];


if (isset($_POST['submit'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = "Gelieve dit veld in te vullen.";
    } else {
        $username = mysqli_escape_string($db, $_POST['username']);
        // check if username is available
        $query = "SELECT id FROM gebruikers WHERE username = '$username'";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {
            $errors['username'] = 'Er is iets misgegaan, kijk de velden na.';
        } else {
            $username = mysqli_escape_string($db, htmlspecialchars($username));
        }
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Gelieve dit veld in te vullen.";
    } else {
        $password = mysqli_escape_string($db, $_POST['password']);
    }

    if (empty($_POST['confirm-password'])) {
        $errors['confirm-password'] = "Gelieve dit veld in te vullen.";
    } elseif (empty($errors['password']) && $_POST['password'] != $_POST['confirm-password']) {
        $errors['confirm-password'] = "Er is iets misgegaan, kijk de velden na.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO gebruikers (username, password) VALUES ('$username', '$hashedPassword')";
        $result = mysqli_query($db, $query)
             or die ('Er is iets misgegaan, probeer het later opnieuw.' . $query);
        header("location:HomeAdmin.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Sahil Kumar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
        initial-scale=1, shrink-to-fit=no">
    <title>Login | PrettyHairByShirley</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Login.css">
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-dark p-3">Voeg gebruiker toe bij PrettyHairByShirley</h3>
            <form action="" method="post" class="p-4 text-light bg-dark" >
                <div class="form-group">
                    <label  for="username">Gebruikersnaam:</label>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Gebruikersnaam" required
                            value="<?= isset($username) ? $username : ""?>">
                    <p><?= isset($errors['username']) ? $errors['username'] : ""?></p>
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" name="password" class="form-control form-control-lg"
                           placeholder="Wachtwoord" required>
                    <p><?= isset($errors['password']) ? $errors['password'] : ""?></p>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Bevestig Wachtwoord:</label>
                    <input type="password" name="confirm-password" class="form-control form-control-lg"
                           placeholder="Wachtwoord" required>
                    <p><?= isset($errors['confirm-password']) ? $errors['confirm-password'] : ""?></p>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="submit" value="gebruiker aanmaken" class="btn btn-light text-dark btn-block">
                </div>
                <br>
                <a href="HomeAdmin.php">Terug naar homepage</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
