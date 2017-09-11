<!DOCTYPE html>

<html>
<head>
    <title></title>
</head>

<body>
    <?php
        $fs = array_diff(scandir(getcwd()), array('..', '.', 'index.php'));
        foreach($fs as $f) {
            echo '<a href="'.$f.'">'.$f.'</a></br />';
        }
    ?>
</body>
</html>