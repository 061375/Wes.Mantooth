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
        <script src="../_/components/js/wes.mantooth.js?a=<?php echo strtotime('now'); ?>"></script>
    <?php
}else{
    ?>
        <script src="../_/js/script.js?a=<?php echo strtotime('now'); ?>"></script>
    <?php
}
?>