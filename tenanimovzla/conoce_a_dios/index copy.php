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

   $page_main_content = new main_001($root_folder, $root_folder . "_/components/main/main_001", $page_title, $page_name, $page_description, "","",null, $page_color_scheme, $session,null,null,null,);

   // $page_content = new page_content
   // (
   //    $root_folder, $root_folder . "_/layout/", $page_title, $page_name, $page_description,
   //    "","",null, $page_color_scheme, $session,null,null,null, $page_main_content,
   //    [
   //       "floating_menu"=>$page_main_content->provide_markup(),
   //    ]
   // );

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