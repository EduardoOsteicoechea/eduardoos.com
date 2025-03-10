<?php
    $root_folder = "../../../../";
    include $root_folder . "_/global.php";
    
    $get = count($_GET) > 0 ? $_GET : null;
    redirect_if_variable_is_populated($root_folder, $_POST);
    redirect_if_variable_is_populated($root_folder, $_FILES);
    $session = isset($_SESSION) ? $_SESSION : null;

   echo "Gracias Señor";
?>