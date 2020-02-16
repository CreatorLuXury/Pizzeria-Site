<html lang="pl">
    <head>
        <title>Redirecting...</title>
    </head>

    <p> Proszę czekać zamówienie jest przetwarzane...</p>
<?php
session_start();
include dirname( __DIR__, 1 ).'/protected/fetch.php';
date_default_timezone_set('Europe/Warsaw');

if ($_SESSION['check'] == $_POST['id_pizzy']) {
    header('Location: order.php');
}
if (isset($_POST['id_pizzy'])& isset($_POST['size'])) {

    include dirname(__DIR__, 1) . '/protected/pizza_querry.php';
    $cena = $f['cena'];
    $id_zamowienia = date("YmdHi", time());
    $size = $_POST['size'];
    $stolik = $_POST['stolik'];

    if ($size == "medium") {
        $cena += 5;
    } elseif ($size == "large") {
        $cena += 10;
    }
    $dough = $_POST['grubosc'];

    if (isset($_POST['dodatek'])) {
        $secondarr = $_POST['dodatek'];
        foreach ($_POST['dodatek'] as $dodatek) {
            $dodatek = strval($dodatek);
            if ($dodatek != 'none') {
                list($dod, $isdoubled) = explode("-", $dodatek, 2);
                include dirname(__DIR__, 1) . '/protected/addon_querry.php';
//            echo $addons['nazwa_dodatku'], ' ';
//            echo $isdoubled,'<br>';
                if ($isdoubled == 'doubled') {
                    $ic = $addons['double_cena'];
//                echo 'podwójny';
                } else {
                    $ic = $addons['cena'];
                }
                echo '<br>';

                if ($size == "medium") {
                    $cena += ($ic * 1.20);
                } elseif ($size == "large") {
                    $cena += ($ic * 1.40);
                } else {
                    $cena += $ic;
                }
                if ($isdoubled == 'doubled') {
                    $isdoubled = True;
                } else $isdoubled = False;
                $ask = 'insert into zamowienie_dod values("' . $id_zamowienia . '","' . $pizza . '","' . $dod . '","' . $isdoubled . '")';
                mysqli_query($polaczenie, $ask);
            }
        }
    } else {
        $dodatek = 0;
        $cena = $cena * 0.8;
    }

    if ($dough == 'grube') {
        $dough = True;
    } else {
        $dough = False;
    }

    $q = 'insert into zamowienie_cfg values("' . $id_zamowienia . '","' . $pizza . '","' . $size . '","' . $dough . '","' . $stolik . '","' . $cena . '",0)';
    $dodane = mysqli_query($polaczenie, $q);
    if ($dodane == 0) {
        echo '<br>error<br>';
    }

    $tmp = $id_zamowienia;


    $_SESSION['check'] = $_POST['id_pizzy'];
//    $_POST['id_pizzy'] = NULL;
//    unset($_POST['id_pizzy']);
    unset($id_zamowienia);
//    unset($_POST);
    header('Location: complete_order.php?id=' . $tmp . '&cena=' . $cena . '');
}
else{
    header('Location: order.php');
}
?>


</html>

