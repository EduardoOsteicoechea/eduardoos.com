<?php
   class page_top extends base_component
   {
      private header_002 | null $page_header;
      private menu_001 | null $page_menu = null;
      private string $page_styles = "";

      public function __construct
      (
         string $root_folder, 
         string $component_folder, 
         string $page_title,
         string $page_name,
         string $page_description,
         string $parent_component_id = "",
         string $parent_component_class = "",
         array | null $external_elements_ids = null,
         string $color_mode = "",
         array | null $session = null,
         array | null $get = null,
         array | null $post = null,
         array | null $files = null,
         string $page_styles = "",
      )
      {
         parent::__construct
         (
            $root_folder,
            $component_folder,
            $page_title,
            $page_name,
            $page_description,
            $parent_component_id,
            $parent_component_class,
            $external_elements_ids,
            $color_mode,
            $session,
            $get,
            $post,
            $files,
         );

         $this->page_styles = $page_styles;

         $this->generate_page_menu();
         $this->generate_page_header();

         echo '
            <!DOCTYPE html>
            <html lang="es">
            <head>
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>'.$this->page_title.'</title>
               <meta description="'.$page_description.'">
               <link rel="icon" type="image/x-icon" href="'.$this->root_folder.'_/media/favicon.ico">
               <style>'. 
                  $this->generate_page_styles(
                     $this->root_folder,
                     $color_mode
                  )
               .'</style>
            </head>
            <body>
               '.$this->page_header->provide_markup().'
               '.$this->page_menu->provide_markup().'
            ';
      }

      private function generate_page_menu()
      {
         include $this->root_folder . "_/components/menu/menu_001/menu_001.php";

         $this->page_menu = new menu_001(
            $this->root_folder, 
            $this->page_title,
            $this->page_name,
            $this->page_description,
            $this->color_mode,
            $this->environment_variables["session"], 
         );
      }

      private function generate_page_header()
      {
         include $this->root_folder."_/components/header/header_002/header_002.php";
         
         $this->page_header = new header_002(
            $this->root_folder,
            $this->root_folder."_/components/header/header_002",
            $this->page_title,
            $this->page_name,
            $this->page_description,
            "","",
            [$this->page_menu->provide_outer_container_id()],
            $this->color_mode,
            $this->environment_variables["session"],
         );
      }

      private function generate_page_styles(string $root_folder, string $color_mode)
      {
         $styles = '';
         $styles .= $this->generate_global_styles($root_folder,$color_mode);
         $styles .= $this->page_header->provide_styles();
         $styles .= $this->page_menu->provide_styles();
         $styles .= $this->page_styles;

         return $styles;
      }
      
      private function generate_global_styles($root_folder, $color_mode)
      {
         include $root_folder . '_/layout/global_styles_'.$color_mode.'.php';
         return provide_global_styles($root_folder);
      }
   }
?>