<head>
    <link rel="stylesheet" href="csses/pizza_card.css">
    <style>
        .ext<?php echo $counter;?>{
            height: auto;
            width: 90%;
            display: none;
        }
        .x<?php echo $counter;?>{
            float: right;
            width: 20px;
            height: 20px;
        }

    </style>
</head>
<body>
<div class="card-outerborder">
    <div class="card-body">
        <button onclick="expand(<?php echo $counter;?>)" class="x<?php echo $counter;?>"></button>
        <h5 class="card-title"><?= $fetch['nazwa_pizzy'] ?></h5>

        <p class="card-text"><?= $fetch['opis'] ?></p>
        <p class="price"><?= $fetch['cena'] ?> zł</p>
        <div class = "ext<?php echo $counter;?>"><?php include 'overlay.php' ?><br></div>





    </div>
</div>

<script src="scripts/expander.js"></script>

</body>

