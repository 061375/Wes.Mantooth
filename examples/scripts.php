<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php

// if this is my local machine the run Grunt auto-reload
$local = '';
if('192.168.1.160' == $_SERVER['REMOTE_ADDR'])
$local = '<script src="http://192.168.1.159:35729/livereload.js"></script>';

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
        <script src="<?php echo $path; ?>../_/components/js/gui.js<?php echo $dev; ?>"></script>
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
// Track user interest
if('' == $local) {
    ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      
        ga('create', 'UA-103050548-1', 'auto');
        ga('send', 'pageview');
      
    </script>
    <?php
}
?>
    <script src="<?php echo $path; ?>../_/js/external/_syntaxhighlighter.js<?php echo $dev; ?>"></script>
    <div style="position: fixed;right: 2px;bottom:2px;z-index:999999;background: #fff;box-shadow:-2px -2px 1px;padding:2px 5px;"><a href="/"><<<<----- Return to Wes Mantooth</a></div>