<?php
class footer_001 extends base_component
{
   public function __construct(
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
      parent::__construct(
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
   }

   protected function generate_component_markup_and_styles()
   {

      $this->add_component(
         "div",
         "outer_container",
         [
            ["", "
                  display:flex;
                  flex-direction: column;
                  align-items:start;
                  padding: 0rem 1.25rem 0rem 0rem;
                  z-index:1000;
                  background:var(--c2);
                  color:var(--c1);
                  border-radius:0px !important;
                  width:100%;
                  min-height:100dvh;
               "]
         ],
         [
            ""
         ],
         [],[],[$this->component_id . "_outer_container"]
      );
   }
}
?>
