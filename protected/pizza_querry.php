<?php
$pizza = $_POST['id_pizzy']; //id pizzy
$qu = "SELECT * FROM basic_pizza WHERE id_b_pizzy = '$pizza'"; //odwolanie do pizzy
$rs = mysqli_query($polaczenie, $qu);
$f = mysqli_fetch_assoc($rs);?>
