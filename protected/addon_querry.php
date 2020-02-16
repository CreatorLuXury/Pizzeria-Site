<?php
$ad = $_POST['id_pizzy']; //id pizzy
$qw = "SELECT * FROM dodatki WHERE id_dodatku = '$dod'"; //odwolanie do pizzy
$rr = mysqli_query($polaczenie, $qw);
$addons = mysqli_fetch_assoc($rr);?>
