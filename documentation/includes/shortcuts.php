<?php
$i = '<tr><td>i</td><td>Integer</td><td>reference to the canvas</td></tr>';
$method = '<tr><td>m</td><td>Enum</td><td>stroke, fill</td></tr>';
$fint = '<tr><td>fint</td><td>Boolean</td><td>if true float-point numbers for coordinates will be converted to whole integer <br /><span>( default is true )</span></td></tr>';
function color($alt = false) {
    if(true === $alt) {
        $color = 'acolor';
    }else{
        $color = 'color';
    }
    $color = '<tr><td>'.$color.'</td><td>String</td><td>a hexadecimal color  <span>example: ( #000000 )</span></td></tr>';
    echo $color;
}
function x($i = '',$note = '') {
    echo '<tr><td>x'.$i.'</td><td>Number</td><td>x'.$i.' coordinate <span>'.$note.'</span></td></tr>';   
}
function y($i = '',$note = '') {
    echo '<tr><td>y'.$i.'</td><td>Number</td><td>y'.$i.' coordinate <span>'.$note.'</span></td></tr>';   
}
function z($i = '',$note = '') {
    echo '<tr><td>z'.$i.'</td><td>Number</td><td>z'.$i.' coordinate <span>'.$note.'</span></td></tr>';   
}
function r($i = '',$note = '') {
    echo '<tr><td>r'.$i.'</td><td>Number</td><td>r'.$i.' coordinate <span>'.$note.'</span></td></tr>';   
}
function opacity($v = '( 0 - 1 )') {
    echo '<tr><td>opacity</td><td>Float</td><td>'.$v.'</td></tr>';
}
?>