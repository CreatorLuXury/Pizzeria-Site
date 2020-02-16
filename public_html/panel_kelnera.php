<?php
session_start();
include dirname( __DIR__, 1 ).'/protected/fetch.php';
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
    echo 'zalogowano jako: ', $login;
} else {
    header('Location: 404.html');
}
    date_default_timezone_set('Europe/Warsaw');
    $date = date('m/d/Y h:i:s', time());

$kw = mysqli_query($polaczenie, 'SELECT id_zamowienia,basic_pizza.nazwa_pizzy,size,isgrube,nr_stolika, zamowienie_cfg.cena, zamowienie_cfg.id_b_pizzy as id_p
FROM zamowienie_cfg left join basic_pizza on 
zamowienie_cfg.id_b_pizzy = basic_pizza.id_b_pizzy 
WHERE isready is FALSE;');

?>

<html>
    <head>
        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
            text-align: center;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: inherit;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>

        <table>
            <tr>
                <th>Nr Zamówienia</th>
                <th>Pizza</th>
                <th>Rozmiar</th>
                <th>Ciasto</th>
                <th>Stolik</th>
                <th>Cena</th>
                <th>Dodatki</th>
            </tr>
        <?php
        while($row = mysqli_fetch_array($kw))
        {

        echo '<tr><td>',$row['id_zamowienia'],'</td>';
        echo '<td>',$row['nazwa_pizzy'],'</td>';
        echo '<td>',$row['size'],'</td>';
        if($row['id_zamowienia']){
            echo '<td>Grube</td>';
        }
        else{echo '<td>Cienkie</td>';}
        echo '<td>',$row['nr_stolika'],'</td>';
        echo '<td>',$row['cena'],'zł</td>';
        echo '<td>';
        $res = mysqli_query($polaczenie,'select dodatki.nazwa_dodatku from relay left join dodatki on  relay.id_dodatku = dodatki.id_dodatku where id_b_pizzy = '.$row['id_p'].';');
        while($r1 = mysqli_fetch_array($res)){
            echo $r1['nazwa_dodatku'];
            echo '<br>';
        }
        echo '</td>';
        echo '</tr>';
        }
        ?>
        </table>
    </head>

<body>

</body>
</html>