<?php
   $root_folder = "../../../";
   include $root_folder . "_/global.php";
    
   $get = count($_GET) > 0 ? $_GET : null;
   redirect_if_variable_is_populated($root_folder, $_POST);
   redirect_if_variable_is_populated($root_folder, $_FILES);
   $session = isset($_SESSION) ? $_SESSION : null;

   $page_title = "tenanimovzla - Conoce a Dios - ¡Cuánta imaginación!";
   $page_name = "cuanta_imaginacion";
   $page_description = "Contenido para conocer al Dios de la Biblia";
   $page_color_scheme = "light";

   $page_main_content = new main_content_001(
      $root_folder, 
      $root_folder . "_/layout/main_content/main_content_001", 
      $page_title, 
      $page_name, 
      $page_description, 
      "","",null, $page_color_scheme, $session,null,null,null,[true,true,true],
      "tenanimovzla/conoce_a_dios/0005_cuanta_imaginacion/article_data.json",
      [
         ["Inicio","inicio"],
         ["Conoce a Dios","tenanimovzla/conoce_a_dios/"],
         ["Cuánta imaginación","tenanimovzla/conoce_a_dios/0005_cuanta_imaginacion/"],
      ],
      getcwd()
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