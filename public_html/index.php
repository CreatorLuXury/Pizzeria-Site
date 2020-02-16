<!DOCTYPE html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="csses/index.css">
    <style>
        .bg-image{
            background-image: url("img/pizza.jpeg");
        }
        .bg-text:hover{
            cursor: grabbing;
        }

    </style>
    <meta charset="utf-8">
    <title>Pizzeria Parma</title>
    <link rel="icon" href="img/pizza_ico_sm.png">
    <?php include 'navbar.php'; ?>

</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
    href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->
    <div class="bg-image"> </div>
    <div class = "bg-text" onclick="go()">ZAMÓW </div>
<script>
    function go(){location.href='order.php';}
</script>
</body>
</html>