<html lang="pl">
<head>
    <title>Twoje zamówienie</title>
</head>

<body>
<div>Twoje zamówienie o nr: <?=$_GET['id']?> zostanie dostarczone tak szybko jak możliwe ! <br> Kwota do zapłaty: <?php echo $_GET['cena'],'zł';?></div>
<a href="faktury.php">
    <input type="button" value="Generuj Fakture" />
</a>
</body>

<?php
    ?>