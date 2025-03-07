<?php
   include $root_folder . "_/layout/page_base.php";

   class public_page extends page_base
   {
      public function __construct
      (
         string $root_folder,
         string $page_title,
         string $page_name,
         string $page_description,
         array $page_main_components = [["markup"=>null,"styles"=>null]],
         array | null $get = null,
         array | null $session = null,
         array | null $post = null,
         array | null $files = null,
         string $page_type = "",
         string $page_color_scheme = "",
      )
      {
         parent::__construct
         (            
            $root_folder,
            $page_type === "" ? "unauthenticated_user_001" : $page_type,
            $page_title,
            $page_name,
            $page_description,
            $page_color_scheme,
            $page_main_components,
            $get,
            $post,
            $session,
            $files,
         );
      }
   }
?>