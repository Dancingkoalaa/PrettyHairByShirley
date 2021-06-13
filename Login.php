<?php
session_start();
require_once ('includes/Config.php');
$msg = "Gebruikersnaam of wachtwoord is fout!";
$msg="";
$errors = [];

if(isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = "Dit veld mag niet leeg zijn.";
    } else {
        $username = $_POST['username'];
    }

    if (empty($_POST['password'])) {
        $errors['password'] = "Dit veld mag niet leeg zijn.";
    } else {
        $password = $_POST['password'];
    }

    if (empty($errors)) {
        $query = "SELECT id, username, password FROM gebruikers WHERE username = '$username'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                header('location: Admin/HomeAdmin.php');
                exit();
            }
        }
    }

    session_regenerate_id();
    $_SESSION['username'] = $row['username'];
    session_write_close();

    if ($result->num_rows == 1) {
        header("location:Admin/HomeAdmin.php");
    } else{
        header('Location:LoginError.php');
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
    <link rel="stylesheet" type="text/css" href="css/Login.css">
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 bg-light mt-5 px-0">
            <h3 class="text-center text-light bg-dark p-3">Log in bij PrettyHairByShirley</h3>
            <form action="" method="post" class="p-4 text-light bg-dark" >
                <div class="form-group">
                    <label  for="username">Gebruikersnaam:</label>
                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Gebruikersnaam" required>
                    <p><?= isset($errors['username']) ? $errors['username'] : ""?></p>
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" name="password" class="form-control form-control-lg"
                           placeholder="Wachtwoord" required>
                    <p><?= isset($errors['password']) ? $errors['password'] : ""?></p>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-light text-dark btn-block">
                </div>
                <br>
                <a href="Home.php">Terug naar homepage</a>
                <h5 class="text-danger text-center"><?= $msg; ?></h5>
            </form>
        </div>
    </div>
</div>
</body>
</html>