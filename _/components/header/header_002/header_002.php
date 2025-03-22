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
                  grid-row:4;                  
                  display:grid;
                  position:fixed;
                  background:var(--c1);
                  grid-template-columns: var(--common_margin_desktop) 22% var(--common_margin_desktop) var(--common_margin_desktop) var(--common_margin_desktop) auto var(--common_margin_desktop) var(--common_margin_desktop) var(--common_margin_desktop) 22% var(--common_margin_desktop);
                  align-items:center;
                  width:100%;
                  z-index:12000;
                  height:var(--header_height);
                  border-radius:0;
               "],["@media only screen and (max-width: 950px)", "

                  grid-template-columns: var(--common_margin_mobile) auto 0% 0% 0% auto 0 0% 0% var(--square_arrow_button_dimension) var(--common_margin_mobile);
               "]
            ],[
               $this->add_subcomponent("a","header_logo_anchor","outer_container",[["","
                  grid-column:2;
               "]],[
                  $this->add_subcomponent("h2","header_logo_h2","outer_container_header_logo_anchor",[
                     ["","
                        display:flex;
                        align-items:center;
                        font-family:f1bl;
                        font-size: 1.25rem;
                     "]
                  ],["eduardoos.com"]),
               ],[],["href='".$this->root_folder."inicio'"]),

               $this->add_subcomponent("button","menu_button","outer_container",[
               ["","
                  grid-column:10;
                  display:flex;
                  flex-direction:column;
                  align-items:center;
                  justify-content:center;
                  gap:.25rem;
                  width: var(--square_arrow_button_dimension);
                  height: var(--square_arrow_button_dimension);
                  background:var(--c3) !important;
               "],["@media only screen and (max-width: 950px)", "

               "]],[
                  '<div class="header_button_bar"></div>',
                  '<div class="header_button_bar"></div>',
               ])

            ],[],[], array_merge([$this->component_id."_outer_container"], $this->external_elements_ids )
         );
      }
   }
?>