<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
$dev = isset($_GET['dev']) ? true : false;
if(true === $dev) {
    ?>
        <script src="../_/components/js/_canvas.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_collision.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_draw.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_math.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_motion.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_threed.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_color.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_loading.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/_syntaxhighlighter.js?a=<?php echo strtotime('now'); ?>"></script>
        <script src="../_/components/js/wes.mantooth.js?a=<?php echo strtotime('now'); ?>"></script>
    <?php
}else{
    ?>
        <script src="../_/js/wes.mantooth.js?a=<?php echo strtotime('now'); ?>"></script>
    <?php
}
?>