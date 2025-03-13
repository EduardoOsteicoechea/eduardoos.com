<?php
   class main_002 extends base_component
   {
      private bool $must_print_floating_controls = false;
      private bool $must_print_sidebar = false;
      private bool $must_print_aside = false;
      public floating_controls_001 | null $page_floating_controls = null;
      public sidebar_001 | null $page_sidebar = null;
      public aside_001 | null $page_aside = null;

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
         array | null $components_to_render = null,
         $content_data,
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

         $this->content_data = $content_data;
         $this->generate_component_markup_and_styles();
      }

      protected function generate_component_markup_and_styles()
      {
         $title = "<h1>" . $this->content_data["el_senor_es_mi_pastor"]["title"] . "</h1>";
         $content = "";
         $passages = "";

         foreach ($this->content_data["el_senor_es_mi_pastor"]["article"] as $line) 
         {
            $content .= "<p>" . $line . "</p>";
         };

         foreach ($this->content_data["el_senor_es_mi_pastor"]["passages"] as $passage) 
         {
            $passages .= "<p>" . $passage . "</p>";
         };         

         $this->add_component("main","main",[["","
            display:flex;
            flex-direction:column;
            gap:1.35rem;
            width:100%;
            transition: none;
            padding:1.25rem 3rem 1.25rem 0rem;
         "]],[
            $title . $content . $passages,
         ],[],[],[""]);
      }
   }
?>