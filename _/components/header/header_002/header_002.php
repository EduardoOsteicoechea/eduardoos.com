<?php
   class header_002 extends base_component
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
         
         $this->add_component("div","outer_container",[
               ["","
                  display:flex;
                  align-items:center;
                  justify-content: space-between;
                  padding: 0rem 1.25rem 0rem 0rem;
                  width:100%;
                  z-index:12000;
                  height:var(--header_height);
               "]
            ],[
               $this->add_subcomponent("a","header_logo_anchor","outer_container",[],[
                  $this->add_subcomponent("h2","header_logo_h2","outer_container_header_logo_anchor",[
                     ["","
                        display:flex;
                        align-items:center;
                        font-family:f1bl;
                        padding: var(--header_item_padding);
                        height: var(--header_item_height);
                        font-size: 1.25rem;
                     "]
                  ],["eduardoos.com"]),
               ],[],["href='".$this->root_folder."inicio'"]),

               $this->add_subcomponent("button","menu_button","outer_container",[
               ["","
                  font-family:f1bl;
                  font-size: 1rem;
                  padding: 0 .75rem;
                  width: 4.5rem;
                  padding: var(--header_item_padding);
                  height: var(--header_item_height);
               "]],["menú"])

            ],[],[], array_merge([$this->component_id."_outer_container"], $this->external_elements_ids )
         );
      }
   }
?>