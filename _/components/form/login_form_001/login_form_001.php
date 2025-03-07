<?php
class login_form_001 extends base_component
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
      "form",
      "login_form_element",
      [
        ["", "
               display: flex;
               flex-direction:column;
               align-items:start;
               gap:.5rem;
               background:var(--c2);
               color:var(--c1);
               padding:2.5rem 1.85rem;
               margin: 1.25rem 1.25rem 4rem 1.25rem;
               width:100%;
               max-width:19rem;
            "],
        ["@media only screen and (max-width: 950px)", " max-width:1000px; width:calc(100% - 2.5rem); min-width:calc(350px- 2.5rem);"],
        ["login_form_item", "display:flex; align-items:center; justify-content:start; height: 2rem; width:100%;  color:var(--c1); font-family:f1b; padding: 0rem .5rem;"],
        ["login_form_input", "color:var(--c2) !important; padding: 0rem .5rem;"],
      ],
      [
        $this->add_subcomponent("h2", "form_heading", "login_form_element", [
          ["", "font-size:1.5rem; font-family:f1bl; letter-spacing:0px; margin: 0 0 3rem 0; color:var(--c1)"],
          ["@media only screen and (max-width: 450px)", "width:100% !important;"],
        ],["Inicia sesión"]),

        $this->add_subcomponent("label", "username_label", "login_form_element", [
          ["", "display: flex; font-size:1rem;"],
        ], ["Nombre de Usuario"], ["login_form_item"]),

        $this->add_subcomponent("input", "username_input", "login_form_element", [
          ["", "display: flex; font-size:1rem;"],
        ], ["Nombre de Usuario"], ["login_form_item", "login_form_input"], ["type='text'"]),

        $this->add_subcomponent("label", "password_label", "login_form_element", [
          ["", "display: flex; font-size:1rem;"],
        ], ["Contraseña"], ["login_form_item"]),

        $this->add_subcomponent("input", "password_input", "login_form_element", [
          ["", "display: flex; font-size:1rem;"],
        ], ["Nombre de Usuario"], ["login_form_item", "login_form_input"], ["type='password'"]),

        $this->add_subcomponent("input", "submit_button", "login_form_element", [
          [
            "",
            "
                  display: flex; 
                  font-size:1rem; 
                  margin: 3.5rem 0 0 0; 
                  background:var(--c1); 
                  color:var(--c2) !important; 
                  font-family:f1bl; 
                  height:2.25rem !important;
                  cursor:pointer;"
          ],
        ], ["Acceder"], ["login_form_item"], ["type='submit'"]),

      ],
      [],
      ["method='post'", "action='" . $this->root_folder . "_/components/form/login_form_001/login_action.php'"]
    );
  }
}
?>
