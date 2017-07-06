<?php
$i = '<tr><td>i</td><td>Integer</td><td>reference to the canvas</td></tr>';
$method = '<tr><td>m</td><td>Enum</td><td>stroke, fill</td></tr>';
$fint = '<tr><td>fint</td><td>Boolean</td><td>if true float-point numbers for coordinates will be converted to whole integer <span>( default is true )</span></td></tr>';
function color($alt = false) {
    if(true === $alt) {
        $color = 'acolor';
    }else{
        $color = 'color';
    }
    '<tr><td>'.$color.'</td><td>String</td><td>a hexadecimal color  <span>example: ( #000000 )</span></td></tr>';
}
function x($i = '') {
    echo '<tr><td>x'.$i.'</td><td>Number</td><td>x'.$i.' coordinate</td></tr>';   
}
function y($i = '') {
    echo '<tr><td>y'.$i.'</td><td>Number</td><td>y'.$i.' coordinate</td></tr>';   
}
function r($i = '') {
    echo '<tr><td>r'.$i.'</td><td>Number</td><td>r'.$i.' coordinate</td></tr>';   
}
?>