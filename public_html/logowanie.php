<!DOCTYPE html>
<?php
session_start(); // 1
?>
<html lang="pl">
<head>
    <title>Logowanie Kelner</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="csses/form.css">


</head>
<body>
<div class="center">
    <div class="inside">
        <form action="logowanie.php" method="POST">

            <input type="text" name="login" required placeholder="Login""
                   title="Login nie może zawierać znaków specjalnych!"><br>

            <input type="password" name="haslo" required placeholder="Hasło"><br>

            <input type="submit" value="Zaloguj"><br>

        </form>
<?php

include dirname( __DIR__, 1 ).'/protected/fetch.php';

if (isset($_POST['login']) && isset($_POST['haslo'])) {

    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo = addslashes($haslo);
    $login = addslashes($login);
    $login = htmlspecialchars($login);

    if (!$login OR empty($login)) {
        echo '<p class="alert">Wypełnij pole z loginem!</p>';
        exit;
    }

    if (!$haslo OR empty($haslo)) {
        echo '<p class="alert">Wypełnij pole z hasłem!</p>';
        exit;
    }

    $zapytanie = "SELECT * FROM pracownicy";

    $queryh = "SELECT * FROM pracownicy WHERE login='$login'";

//    $haslo = md5($haslo);

    $resulth = mysqli_query($polaczenie, $queryh);
    $resultu = mysqli_query($polaczenie, $queryh);
    $passch = mysqli_fetch_assoc($resulth);
    $user = mysqli_fetch_assoc($resultu);


    if ($user['login'] != $_POST['login']) {
        echo "<br> Użytkownik nie istnieje!";
    } else if ($passch['haslo'] != $haslo) {
        echo "<br>Nieprawidłowe hasło logowania!";
    } else {
        $_SESSION['login'] = $_POST['login'];
//        $_SESSION['isadmin'] = $user['isadmin'];

        header('Location: panel_kelnera.php');
    }
}
?>
</div>
</div>
</body>
</html>