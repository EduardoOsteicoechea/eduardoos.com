<?php
   class floating_controls_001 extends base_component
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
         $this->add_component("div","floating_controls",[["","
            height:200px;
            width:5rem;
            overflow-y:auto;
            overflow-x:hidden;
            z-index:12000;
            border-radius:.2rem;
            background:var(--c1);
            box-shadow: .5rem .5rem .5rem rgba(0,0,0,.15);
            transition: none;
            padding:1.25rem;
         "],
         ["@media only screen and (max-width: 950px)", " 
            position:fixed;
            width:3rem;
            right: var(--margin_common);
            bottom: var(--margin_common);
         "],
      ],[
            "This are the floating controls"
         ],[],[],[""]);
      }
   }
?>