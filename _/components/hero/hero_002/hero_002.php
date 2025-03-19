<?php
class hero_002 extends base_component
{
  private string $main_heading = "";
  private string $main_text = "";
  private array $background_images_data = [];
  private array $action_buttons_data = [];

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
    string $main_heading,
    string $main_text,
    array $background_images_data,
    array $action_buttons_data,
  )
  {
    $this->main_heading = $main_heading;
    $this->main_text = $main_text;
    $this->background_images_data = $background_images_data;
    $this->action_buttons_data = $action_buttons_data;

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
      
      $this->generate_component_markup_and_styles();
  }

  protected function generate_component_markup_and_styles()
  {
    $this->add_component(
      "div",
      "outer_container",
      [
        ["", " 
        display:flex; 
        flex-direction:column; 
        align-items:center; 
        justify-content:flex-end; 
        height:calc(100dvh - var(--header_height)); 
        width:100%; 
        overflow:hidden; 
        border-radius:0px !important;
        transition:all ease 0ms !important;
        "]
      ],
      [
        $this->add_subcomponent("div","background_image_container","outer_container",[
          ["","
            position:absolute;
            top:0;
            height:100%;
            width:100%;
            display:flex;
            justify-content:end;
            transition:all ease 0ms !important;
          "]
        ],[$this->add_subcomponent("img","image","background_image_container",[
            ["","
               transition:all ease 0ms !important;
               height:110%;
            "]
          ],[],[],[])
        ],[],[])

      ],[],[],[$this->component_id . "_outer_container"]
    );
  }
}

?>
