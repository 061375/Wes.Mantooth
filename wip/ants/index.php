<!DOCTYPE html>

<html>
<head>
    <title>Ants</title>
    <?php
        require_once('../../examples/scripts.php');
        $out = array();
        $map = file_get_contents('maps/1.map');
        $map = str_replace("\t","\s\s\s",$map);
        $map = str_replace("\r","",$map);
        $lines = explode("\n",$map);
        $y = 0;
        foreach($lines as $line) {
            for($x=0; $x<strlen($line); $x++) {
                if(substr($line,$x,1) == '#') {
                    $out[$y][$x] = 1;
                }else{
                    $out[$y][$x] = 0;
                }
            }
            $y++;
        }
    ?>
    <style>
        canvas {
            position: absolute;
            top: 0px;
            left: 0px;
        }
    </style>
    <script src="js/_script.js?a=<?php echo strtotime('now'); ?>"></script>
    <script src="js/map.js?a=<?php echo strtotime('now'); ?>"></script>
    <script src="js/ant.js?a=<?php echo strtotime('now'); ?>"></script>
    <script src="js/egg.js?a=<?php echo strtotime('now'); ?>"></script>
    <script src="js/food.js?a=<?php echo strtotime('now'); ?>"></script>
    <script>
        const   ANTMAX = 48,
                QUEENMAX = 1,
                MALEMAX = 3, 
                SOLDIERMAX = 23,
                GATHERERMAX = 23,
                LIFESPAN = 10000,
                MAXFOOD = 10,
                MAXPREDATORS = 3,
                EGGMAX = 3,
                W = 1000,
                H = 1000,
                MAP = <?php echo json_encode($out); ?>;
        window.onload = function() {
            'use strict';
            AntSim.init(MAP);
        }
    </script>
</head>
<body>
    <div id="target"></div>
</body>
</html>