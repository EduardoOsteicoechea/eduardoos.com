<?php
  $root_folder = "../";
  include $root_folder . "_/global.php";

  $get = count($_GET) > 0 ? $_GET : null;
  redirect_if_variable_is_populated($root_folder, $_POST);
  redirect_if_variable_is_populated($root_folder, $_FILES);
  $session = isset($_SESSION) ? $_SESSION : null;

  $page_title = "eduardoos.com";
  $page_name = "inicio";
  $page_description = "El sitio web oficial de Eduardo Osteicoechea.";
  $page_color_scheme = "light";

  include $root_folder . "_/components/hero/hero_001/_.php";
   
   $hero_001 = new hero_001(
      $root_folder,
      null,
      "Inicio",
      "inicio",
      "Eduardo Osteicoechea", 
      "light",
      "fotoPersonal1080x1920.jpg",
      "Personal Image"
   );


   
   $root_folder,
   $root_folder . "_/components/form/login_form_001/",
   $page_title,
   $page_name,
   $page_description,
   "",
   "",
   null,
   $page_color_scheme,
   $session,
 

   new public_page(
     $root_folder,
     $page_title,
     $page_name,
     $page_description,
     [
       [
         "markup" => $hero_001->provide_markup(),
         "styles" => $hero_001->provide_styles()
       ],
     ],
     $get,
     $session,
     null,
     null,
     "",
     $page_color_scheme
   );
 ?>