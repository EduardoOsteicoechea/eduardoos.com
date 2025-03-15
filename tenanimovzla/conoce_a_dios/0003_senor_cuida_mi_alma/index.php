<?php
   $root_folder = "../../../";
   include $root_folder . "_/global.php";
    
   $get = count($_GET) > 0 ? $_GET : null;
   redirect_if_variable_is_populated($root_folder, $_POST);
   redirect_if_variable_is_populated($root_folder, $_FILES);
   $session = isset($_SESSION) ? $_SESSION : null;

   $page_title = "tenanimovzla - Conoce a Dios - El Señor es mi Pastor";
   $page_name = "el_senor_es_mi_pastor";
   $page_description = "Contenido para conocer al Dios de la Biblia";
   $page_color_scheme = "light";

   $page_main_content = new main_content_001(
      $root_folder, 
      $root_folder . "_/layout/main_content/main_content_001", 
      $page_title, 
      $page_name, 
      $page_description, 
      "","",null, $page_color_scheme, $session,null,null,null,[true,true,true],
      "tenanimovzla/conoce_a_dios/0003_senor_cuida_mi_alma/article_data.json",
      [
         ["Inicio","inicio"],
         ["Conoce a Dios","tenanimovzla/conoce_a_dios/"],
         ["Señor, cuida mi alma","tenanimovzla/conoce_a_dios/0003_senor_cuida_mi_alma/"],
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