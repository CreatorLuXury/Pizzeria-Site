<?php
$qq = "SELECT MAX(id_dodatku) FROM dodatki";
$rr = mysqli_query($polaczenie, $qq);
$dt = mysqli_fetch_array($rr);
$sum_dod = $dt[0];
while($sum_dod){
    $qu = "SELECT * FROM dodatki WHERE id_dodatku=$sum_dod";
    $rs = mysqli_query($polaczenie, $qu);
    $f = mysqli_fetch_assoc($rs);
//    echo '<input type="checkbox" name="dodatek[]" value="'.$f['id_dodatku'].'">'.$f['nazwa_dodatku'].'';


    echo '<div class = "box">'.$f['nazwa_dodatku'].':<select name="dodatek[]">
        <option value="none">Brak</option>
        <option value="'.$f['id_dodatku'].'-one">Pojedynczy</option>
        <option value="'.$f['id_dodatku'].'-doubled">Podwójny</option>
    </select></div>';
    $sum_dod -= 1;
}



?>