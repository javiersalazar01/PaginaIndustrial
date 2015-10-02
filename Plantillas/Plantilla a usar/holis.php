
<?php
$cadena = 'No Válida';
$cadena1= "10 SEPTEMBER 2015";
// antes de PHP 5.1.0 se debería de comparar con -1, en vez de con false
if (($timestamp = strtotime($cadena1)) === false) {
    echo "La cadena ($cadena) es falsa";
} else {
    echo "$cadena1 == " . date('Y F d h:i:s A', $timestamp);

}
?>
