<!doctype html>

<html lang="en">
<head>
    <title>Wes Mantooth - Examples - Simple Paint Program</title>
    <?php require_once('scripts.php'); ?>
    <script src="../_/js/paint_program.js<?php echo $dev ?>"></script>
    <link rel="stylesheet" href="../_/css/style.css<?php echo $dev ?>" />
    <style>
        .left,.right {
            max-width: 50%;
        }
        #target {
            border: solid 1px #000;

            float: left;
        }
        #buttons {
            width: 40px;
            float: left;
            padding: 0;
        }
        #buttons button {
            box-shadow: 1px 1px 1px;
            width: 100%;
            max-width: 100%;
            padding: 5px;
        }
        #buttons button img {
            width: 99%;
        }
        #swatches {
            clear: both;
        }
        #swatches div {
            width: 48%;
            float: left;
            box-shadow: 1px 1px 1px;
        }
    </style>
</head>
<body>
    <div class="left">
        <div id="target"></div>
        <div id="buttons">
            <button class="new">New</button>
            <button class="spray"><img src="../_/assets/paint/spray.gif"/></button>
            <button class="pencil"><img src="../_/assets/paint/pencil.png"/></button>
            <button class="line"><img src="../_/assets/paint/line.png"/></button>
            <button class="eraser"><img src="../_/assets/paint/eraser.png"/></button>
            <div id="swatches">
                <div class="black"></div>
                <div class="white"></div>
                <div class="red"></div>
                <div class="blue"></div>
                <div class="green"></div>
                <div class="yellow"></div>
            </div>
        </div>
    </div>
    <div class="right">
        <pre class="brush: js">

        </pre>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
