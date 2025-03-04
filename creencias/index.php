<?php
$root_folder = "../";
include $root_folder . "_/_.php";
include "styles.php";

new page_head($root_folder, null, "Eduardo Osteicoechea", "El sitio web oficial de Eduardo Osteicoechea, cristiano, pensador, arquitecto, desarrollador de software y creador venezolano.", [print_styles()]
);


echo "Creencias";

new page_foot($root_folder);
?>