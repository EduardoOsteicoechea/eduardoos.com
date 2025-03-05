<?php
   include $root_folder . "_/components/_base_component/base_component.php";

   class login_form_001 extends base_component
   {
      public function __construct
      (
         string $root_folder, 
         array | null $session, 
         string $page_title,
         string $page_name,
         string $page_description,
         string $color_mode,
         string $parent_component_id,
         string $parent_component_class,
      )
      {
         parent::__construct
         (
            $root_folder, 
            $session, 
            $page_title,
            $page_name,
            $page_description,
            $color_mode,
            $parent_component_id,
            $parent_component_class,
         );
      }

      protected function generate_component_markup_and_styles()
      {
         $this->add_component("form","login_form_element",[
            ["","
               display: flex;
               flex-direction:column;
               align-items:center;
               gap:.5rem;
               background:var(--c1);
               box-shadow:0em 0em 4em rgba(0,0,0,.15);
               padding:2.5rem 1.75rem;
               margin: 2rem 0 0 0;
            "],
            ["login_form_item","display:flex; align-items:center; justify-content:center; height: 2rem; width:200px; color:var(--c7)"],
            ],[
               $this->add_subcomponent("h2","form_heading","login_form_element",["Inicia sesión"],[
                  ["","font-size:1.5rem; font-family:f1bl; letter-spacing:0px; margin: 0 0 1.75rem 0;"],
               ],[],[]),
               $this->add_subcomponent("label","username_label","login_form_element",["Nombre de Usuario"],[
                  ["","display: flex; font-size:1rem;"],
               ],["login_form_item"],[]),
               $this->add_subcomponent("input","username_input","login_form_element",["Nombre de Usuario"],[
                  ["","display: flex; font-size:1rem;"],
               ],["login_form_item"],["type='text'"]),
               $this->add_subcomponent("label","password_label","login_form_element",["Contraseña"],[
                  ["","display: flex; font-size:1rem;"],
               ],["login_form_item"],[]),
               $this->add_subcomponent("input","password_input","login_form_element",["Nombre de Usuario"],[
                  ["","display: flex; font-size:1rem;"],
               ],["login_form_item"],["type='text'"]),
               $this->add_subcomponent("input","submit_button","login_form_element",["Acceder"],[
                  ["","display: flex; font-size:1rem; margin: 2.75rem 0 0 0; background:var(--c2); color:var(--c1) !important; font-family:f1b; height:2.25rem !important;"],
               ],["login_form_item"],["type='submit'"]),
            ],[],["method='post'", "action='".$this->root_folder."_/components/form/login_form_001/login_action.php'"]
         );
      }
   }
?>