<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$path = isset($path) ? $path : '../';
$dev = isset($_GET['dev']) ? true : false;
if(true === $dev) {
    $dev = '?a='.strtotime('now');
    $grunt = '<script src="http://192.168.1.154:35729/livereload.js"></script><script>$w.boolLog = true;</script>';
    ?>
        <script src="<?php echo $path; ?>../_/components/js/_canvas.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_collision.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_draw.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_math.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_motion.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_threed.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_color.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_loading.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_game.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_shortys.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_buttons.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/_syntaxhighlighter.js<?php echo $dev; ?>"></script>
        <script src="<?php echo $path; ?>../_/components/js/wes.mantooth.js<?php echo $dev; ?>"></script>
    <?php
    
}else{
    $dev = '';
    $grunt = '';
    ?>
        <script src="<?php echo $path; ?>../_/js/wes.mantooth.js"></script>
    <?php
}
?>