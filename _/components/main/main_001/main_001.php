<?php
   class main_001 extends base_component
   {
      private bool $must_print_floating_controls = false;
      private bool $must_print_sidebar = false;
      private bool $must_print_aside = false;
      public floating_controls_001 | null $page_floating_controls = null;
      public sidebar_001 | null $page_sidebar = null;
      public aside_001 | null $page_aside = null;
      public main_002 | null $page_main = null;

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

         $this->determine_required_elements($components_to_render);
         $this->generate_floating_controls_if_required();
         $this->generate_sidebar_if_required();
         $this->generate_main();
         $this->generate_aside_if_required();
      }
      
      public function determine_required_elements($components_to_render):void
      {
         $this->must_print_floating_controls = $components_to_render[0];
         $this->must_print_sidebar = $components_to_render[1];
         $this->must_print_aside = $components_to_render[2];
      }

      public function must_print_floating_controls():bool { return $this->must_print_floating_controls; }
      public function must_print_sidebar():bool { return $this->must_print_sidebar; }
      public function must_print_aside(): bool { return $this->must_print_aside; }

      public function generate_main():void
      {
         $subcomponent_directory = $this->root_folder . "_/components/main/main_002/";
         
         include $subcomponent_directory . "main_002.php";

         $this->page_main = new main_002
         (
            $this->root_folder, 
            $subcomponent_directory, 
            $this->page_title,
            $this->page_name,
            $this->page_description,
            $this->parent_component_id,
            $this->parent_component_class,
            $this->external_elements_ids,
            $this->color_mode,
            $this->environment_variables["session"],
            $this->environment_variables["get"],
            $this->environment_variables["post"],
            $this->environment_variables["files"]
         );
         
         $this->register_component_markup($this->page_main->provide_markup());
         $this->register_component_styles($this->page_main->provide_styles());
         $this->register_subcomponent_ids($this->page_main->elements_ids);
      }

      public function generate_floating_controls_if_required():void
      {
         if($this->must_print_floating_controls === true)
         {
            $subcomponent_directory = $this->root_folder . "_/components/controls/floating_controls_001/";
            
            include $subcomponent_directory . "floating_controls_001.php";

            $this->page_floating_controls = new floating_controls_001
            (
               $this->root_folder, 
               $subcomponent_directory, 
               $this->page_title,
               $this->page_name,
               $this->page_description,
               $this->parent_component_id,
               $this->parent_component_class,
               $this->external_elements_ids,
               $this->color_mode,
               $this->environment_variables["session"],
               $this->environment_variables["get"],
               $this->environment_variables["post"],
               $this->environment_variables["files"]
            );
            
            $this->register_component_markup($this->page_floating_controls->provide_markup());
            $this->register_component_styles($this->page_floating_controls->provide_styles());
            $this->register_subcomponent_ids($this->page_floating_controls->elements_ids);
         };
      }

      public function generate_sidebar_if_required():void
      {
         if($this->must_print_sidebar === true)
         {            
            $subcomponent_directory = $this->root_folder . "_/components/sidebar/sidebar_001/";
            
            include $subcomponent_directory . "sidebar_001.php";

            $this->page_sidebar = new sidebar_001
            (
               $this->root_folder, 
               $subcomponent_directory, 
               $this->page_title,
               $this->page_name,
               $this->page_description,
               $this->parent_component_id,
               $this->parent_component_class,
               $this->external_elements_ids,
               $this->color_mode,
               $this->environment_variables["session"],
               $this->environment_variables["get"],
               $this->environment_variables["post"],
               $this->environment_variables["files"]
            );
            
            $this->register_component_markup($this->page_sidebar->provide_markup());
            $this->register_component_styles($this->page_sidebar->provide_styles());
            $this->register_subcomponent_ids($this->page_sidebar->elements_ids);
         };
      }

      public function generate_aside_if_required():void
      {
         if($this->must_print_aside === true)
         {
            $subcomponent_directory = $this->root_folder . "_/components/aside/aside_001/";

            include $subcomponent_directory . "aside_001.php";

            $this->page_aside = new aside_001
            (
               $this->root_folder, 
               $subcomponent_directory, 
               $this->page_title,
               $this->page_name,
               $this->page_description,
               $this->parent_component_id,
               $this->parent_component_class,
               $this->external_elements_ids,
               $this->color_mode,
               $this->environment_variables["session"],
               $this->environment_variables["get"],
               $this->environment_variables["post"],
               $this->environment_variables["files"]
            );
            
            $this->register_component_markup($this->page_aside->provide_markup());
            $this->register_component_styles($this->page_aside->provide_styles());
            $this->register_subcomponent_ids($this->page_aside->elements_ids);
         };
      }
   }
?>