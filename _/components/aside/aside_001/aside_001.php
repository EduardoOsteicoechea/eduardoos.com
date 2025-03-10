<?php
   class aside_001 extends base_component
   {
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
         $this->generate_component_markup_and_styles();
      }

      protected function generate_component_markup_and_styles()
      {
         $this->add_component("aside","aside",[["","
            height:200px;
            width:200px;
            background:red;
         "]],[
            "This is the aside"
         ],[],[],[""]);
      }
   }
?>