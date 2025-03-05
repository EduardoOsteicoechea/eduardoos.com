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
         $this->add_component("form","form_element",[
            ["","display: flex; flex-direction:column; background: yellow; width: 300px;"],
            ],[
               $this->add_subcomponent("p","paragraph","form_element",["This is a subcomponent"],[
                  ["","display: flex; background: red; width: 100px; height: 100px;"],
               ],[],[]),
               $this->add_subcomponent("a","anchor_1","form_element",["This is second a subcomponent"],[
                  ["","display: flex; background: blue; width: 100px; height: 100px;"],
                  ["asdasd","font-family: f1bl;"],
               ],["asdasd"],["href='https://eduardoos.com'"]),
            ],[],[]
         );
      }
   }
?>