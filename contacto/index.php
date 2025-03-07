<?php
   $root_folder = "../";
   include $root_folder . "_/global.php";
    
   $get = count($_GET) > 0 ? $_GET : null;
   redirect_if_variable_is_populated($root_folder, $_POST);
   redirect_if_variable_is_populated($root_folder, $_FILES);
   $session = isset($_SESSION) ? $_SESSION : null;

   $page_title = "Contáctame";
   $page_name = "contacto";
   $page_description = "Agendemos una conversación";
   $page_color_scheme = "light";

   new public_page(
      $root_folder,
      $page_title,
      $page_name,
      $page_description,
      [
         ["markup"=>null,"styles"=>null,"elements_ids"=>null],
      ],
      $get,
      $session,
      null,
      null,
      "",
      $page_color_scheme
   );
?>