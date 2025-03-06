<?php
   $root_folder = "../";
   $session = isset($_SESSION) ? $_SESSION : null;
   $page_title = "Inicia Sesión";
   $page_name = "sesion_iniciar";
   $page_description = "Inicia sesión y accede a los servicios disponibles.";
   $page_color_scheme = "light";

   include $root_folder . "_/global.php";
   include $root_folder . "_/components/form/login_form_001/login_form_001.php";

   $login_form_001 = new login_form_001(
      $root_folder,
      $root_folder . "_/components/form/login_form_001/",
      $page_title,
      $page_name,
      $page_description,
      $page_color_scheme,
      "",
      "",
      $session,
   );

   new page_top($root_folder,
      $session,
      $page_title,
      $page_name,
      $page_description,
      [$login_form_001->print_styles()], 
      $page_color_scheme
   );

   echo $login_form_001->print_markup();

   new page_bottom($root_folder);
?>