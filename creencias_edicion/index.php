<?php
   $root_folder = "../";
   $session = isset($_SESSION) ? $_SESSION : null;
   $page_title = "Creencias - Edición";
   $page_name = "creencias_edicion";
   $page_description = "La cosmovisión de Eduardo Osteicoechea";
   $page_color_scheme = "light";
   $root_folder = "../";

   include $root_folder . "_/_.php";
   include $root_folder . "_/components/form/login_form_001/login_form_001.php";

   $login_form_001 = new login_form_001(
      $root_folder,
      $session,
      $page_title,
      $page_name,
      $page_description,
      $page_color_scheme,
      "",
      ""
   );

   new page_head($root_folder,
      $session,
      $page_title,
      $page_name,
      $page_description,
      [$login_form_001->print_styles()], 
      $page_color_scheme
   );

   echo $login_form_001->print_markup();

   new page_foot($root_folder);
?>