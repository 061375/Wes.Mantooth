<?php
$i = '<tr><td>i</td><td>Integer</td><td>reference to the canvas</td></tr>';
//$x = '<tr><td>x</td><td>Number</td><td>x coordinate</td></tr>';
//$y = '<tr><td>y</td><td>Number</td><td>y coordinate</td></tr>';
$color = '<tr><td>color</td><td>String</td><td>a hexadecimal color  <span>example: ( #000000 )</span></td></tr>';
$fint = '<tr><td>fint</td><td>Boolean</td><td>if true float-point numbers for coordinates will be converted to whole integer <span>( default is true )</span></td></tr>';

function x($i = '') {
    echo '<tr><td>x'.$i.'</td><td>Number</td><td>x'.$i.' coordinate</td></tr>';   
}
function y($i = '') {
    echo '<tr><td>y'.$i.'</td><td>Number</td><td>y'.$i.' coordinate</td></tr>';   
}
?>