<!DOCTYPE html>
<?php
session_start(); // 1
include dirname( __DIR__, 1 ).'/protected/fetch.php';
include 'navbar.php';
global $login;
?>

<html lang="pl">
<head>
    <link rel="icon" href="img/pizza_ico_sm.png">
    <title>Zamówienie</title>
    <meta charset="utf-8">
<!--    <link rel="stylesheet" href="css/normalize.css">-->
    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <link rel="stylesheet" href="csses/scroll_bar.css">
    <link rel="icon" href="img/pizza_ico_sm.png">
    <script>var flag = [];</script>

</head>

<body>

<?php
$q = "SELECT MAX(id_b_pizzy) FROM basic_pizza";
$result2 = mysqli_query($polaczenie, $q);
$data = mysqli_fetch_array($result2);
$counter = $data[0];
while ($counter) {
    $query = "SELECT * FROM basic_pizza WHERE id_b_pizzy=$counter";
    $result = mysqli_query($polaczenie, $query);
    $fetch = mysqli_fetch_assoc($result);
    if ($fetch['nazwa_pizzy'] != NULL) {
        include 'pizza_card.php';
    }
    $counter -= 1;
}


?>

<form action="order_complete.php" method="POST">

</form>
</body>
<?php
?>
