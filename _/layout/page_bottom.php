<?php
   class page_bottom extends base_component
   {
      private footer_001 | null $page_footer;

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

         $this->generate_page_footer();
         $this->complete_page_markup();
      }

      private function generate_page_footer()
      {
         include $this->root_folder."_/components/footer/footer_001/footer_001.php";
         
         $this->page_footer = new footer_001(
            $this->root_folder,
            $this->root_folder."_/components/footer/footer_001",
            $this->page_title,
            $this->page_name,
            $this->page_description,
            "","",
            ["123"],
            $this->color_mode,
            $this->environment_variables["session"],
         );

         $this->component_styles .= $this->page_footer->provide_styles();
         $this->component_markup .= $this->page_footer->provide_markup();
      }

      private function complete_page_markup()
      {
         $this->component_markup .= '
               </body>
            </html>
         ';
      }
   }
?>