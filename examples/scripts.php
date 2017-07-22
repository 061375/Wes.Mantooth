<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

// if this is my local machine the run Grunt auto-reload
$local = '';
if('192.168.1.157' == $_SERVER['REMOTE_ADDR'])
$local = '<script src="http://192.168.1.154:35729/livereload.js"></script>';

// allow for sub-pathing as neccesary
$path = isset($_GET['path']) ? $path : '../';

// development mode
$dev = isset($_GET['dev']) ? true : false;

if(true === $dev) {
    $dev = '?a='.strtotime('now');
    $grunt = $local.'<script>$w.boolLog = true;console.log("Dumping window to show that no objects associated with Wesmantooth (aliased as $w) are stuck in root [this would be a memory leak]");console.log(window);</script>';
    ?>
        <script src="<?php echo $path; ?>../_/components/js/_wes.mantooth.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/canvas.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/collision.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/draw.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/math.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/motion.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/threed.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/color.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/loading.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/game.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/shortys.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/buttons.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/js/external/js_memleak/memory_leak_checker.js"></script>
        <script>
            MemoryLeakChecker.checkLeaks($w);
        </script>
    <?php
    
}else{
    $dev = '';
    $grunt = '';
    ?>
        <script src="<?php echo $path; ?>../_/js/wes.mantooth.js"></script>
    <?php
}
?>
    <script src="<?php echo $path; ?>../_/js/external/_syntaxhighlighter.js<?php echo $dev; ?>"></script>