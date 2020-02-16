
<?php
?>

<head>
    <!-- bootstrap -->
    <style>
        nav{border-bottom-width: 2px;border-bottom-color: #888888
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>


<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: darkgray;">
<!--    <div class="imaged"><img src="img/arcc.png" class="img-fluid" alt="logo strony"></div>-->
    <a class="navbar-brand" href="">Pizzeria Parma</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">

        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <?php
                echo '<li class="nav-item"><a class="nav-link" href="index.php">Strona Główna</a></li>';
//                echo '<li class="nav-item"><a class="nav-link" href="logowanie.php">Zaloguj się</a></li>';
            ?>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="formularz.php">Kontakt</a>
            </li>
        </ul>
    </div>
</nav>

</html>
