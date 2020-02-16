<link rel="stylesheet" href="csses/select.css">
<form id ="<?= $fetch['id_b_pizzy'] ?>" action="redirect.php" method="POST">
    Wielkość pizzy: <br>
    <input type="hidden" name = "id_pizzy" value = "<?= $fetch['id_b_pizzy'] ?>">
    <div class="menu-inside">
    <select name="size" id="wp<?= $fetch['id_b_pizzy'] ?>">
        <option value="small">Mała(30cm)</option>
        <option value="medium" >Średnia(45cm)</option>
        <option value="large" >Duża(60cm)</option>
    </select>
    </div>

    Ciasto :<br>
    <div class="menu-inside">
        <input type="radio" name="grubosc" value="cienkie" checked> Cienkie<br>
        <input type="radio" name="grubosc" value="grube"> Grube
    </div>

    Dodatki : <br>
    <div class = "menu-inside">
    <?php
        //include 'price_sum.php';
        include 'bck.php';
    ?>
    </div>
    Numer Stolika:
    <select style="width: 100px;" name="stolik" id="nr_stolika<?= $fetch['id_b_pizzy'] ?>">
        <option value="1" >1</option>
        <option value="2" >2</option>
        <option value="3" >3</option>
        <option value="4" >4</option>
        <option value="5" >5</option>
        <option value="6" >6</option>
    </select><br><br>
    <input type="submit" value="Dodaj do koszyka">
    <br><br>
    <div id = "cme<?= $fetch['id_b_pizzy'] ?>" ></div>



</form>
<script>
    document.getElementById('<?= $fetch['id_b_pizzy'] ?>').addEventListener('change', (event) => {
        var base = <?= $fetch['cena'] ?>;
            var pizza = document.getElementById("wp<?= $fetch['id_b_pizzy'] ?>");
            var po = pizza.options[pizza.selectedIndex].value;
            if(po === 'small'){po = 0;}
            if(po === 'medium'){po = 5;}
            if(po === 'large'){po = 10;}
        document.getElementById("cme<?= $fetch['id_b_pizzy'] ?>").innerHTML = 'Łączna kwota = ' + (base+po) + 'zł';
    });


</script>