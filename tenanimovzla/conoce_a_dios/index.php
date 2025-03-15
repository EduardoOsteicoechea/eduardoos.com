<?php
   $root_folder = "../../";
   include $root_folder . "_/global.php";
    
   $get = count($_GET) > 0 ? $_GET : null;
   redirect_if_variable_is_populated($root_folder, $_POST);
   redirect_if_variable_is_populated($root_folder, $_FILES);
   $session = isset($_SESSION) ? $_SESSION : null;

   $page_title = "tenanimovzla - Conoce a Dios";
   $page_name = "conoce_a_dios";
   $page_description = "Contenido para conocer al Dios de la Biblia";
   $page_color_scheme = "light";

   $page_main_content = new main_content_002(
      $root_folder, 
      $root_folder . "_/layout/main_content/main_content_002", 
      $page_title, 
      $page_name, 
      $page_description, 
      "","",null, $page_color_scheme, $session,null,null,null,[false,true,true],
      "tenanimovzla/conoce_a_dios",
      [
         ["Inicio","inicio"],
         ["Conoce a Dios","tenanimovzla/conoce_a_dios/"]
      ]
   );

   new public_page
   (
      $root_folder,
      $page_title,
      $page_name,
      $page_description,
      [
         [
            "markup"=>$page_main_content->provide_markup(),
            "styles"=>$page_main_content->provide_styles(),
            "elements_ids"=>$page_main_content->provide_elements_ids()
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