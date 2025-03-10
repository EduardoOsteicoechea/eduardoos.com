<?php
class page_content extends base_component
   {
      private main_001 | null $page_main_content = null;
      private array | null $components_to_render = null;

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
         main_001 | null $page_main_content = null,
         array | null $components_to_render = null,

      )
      {
         $this->page_main_content = $page_main_content;
         $this->components_to_render = $components_to_render;

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

         $this->generate_main_content();
         $this->generate_components_to_render();         
      }

      private function generate_main_content()
      {
         $this->component_markup .= $this->page_main_content->provide_markup();
         $this->component_styles .= $this->page_main_content->provide_styles();
      }

      private function generate_components_to_render()
      {
         if($this->components_to_render["floating_menu"] === true)
         {
            $this->page_main_content->generate_floating_controls_if_required();
            $this->component_markup .= $this->page_main_content->page_floating_controls->provide_markup();
            $this->component_styles .= $this->page_main_content->page_floating_controls->provide_styles();
         };

         if($this->components_to_render["sidebar"] === true)
         {
            $this->page_main_content->generate_sidebar_if_required();
            $this->component_markup .= $this->page_main_content->page_sidebar->provide_markup();
            $this->component_styles .= $this->page_main_content->page_sidebar->provide_styles();
         };

         if($this->components_to_render["aside"] === true)
         {
            $this->page_main_content->generate_aside_if_required();
            $this->component_markup .= $this->page_main_content->page_aside->provide_markup();
            $this->component_styles .= $this->page_main_content->page_aside->provide_styles();
         };
      }
   }
?>