<?php
   class main_content_001 extends base_component
   {
      private bool $must_print_floating_controls = false;
      private bool $must_print_sidebar = false;
      private bool $must_print_aside = false;
      public floating_controls_001 | null $page_floating_controls = null;
      public sidebar_001 | null $page_sidebar = null;
      public aside_001 | null $page_aside = null;
      public main_002 | null $page_main = null;
      public array | null $location_tracker_elements = null;
      public string $location_tracker_markup = "";

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
         string $main_content_json_file_path = "",
         array | null $location_tracker_elements = null,
         string $current_set_containing_directory = "",
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
            $main_content_json_file_path,
            $location_tracker_elements,
         );

         $this->current_set_containing_directory = $current_set_containing_directory;
         $this->location_tracker_elements = $location_tracker_elements;
         $this->articles_directory_path = $main_content_json_file_path;
         
         $this->determine_required_elements($components_to_render);

         $this->register_component_styles('
            .main_content_001
            {
               grid-row:6;
               display:grid;
               grid-template-columns: var(--common_margin_desktop) 22% var(--common_margin_desktop) var(--common_margin_desktop) var(--common_margin_desktop) auto var(--common_margin_desktop) var(--common_margin_desktop) var(--common_margin_desktop) 22% var(--common_margin_desktop);
               width:100%;
               overflow: hidden;
            }
            @media only screen and (max-width: 950px)
            {
               .main_content_001 
               {
                  grid-template-columns: var(--common_margin_mobile) 0% 0% 0% 0% auto var(--common_margin_mobile) var(--square_arrow_button_dimension) 0% 0% var(--common_margin_mobile);
               }
            }
         ');         
         
         $this->register_component_markup('
            <div
            id="main_content"
            class="main_content_001"
            >
         ');

         $this->get_content_data_from_json_file($this->root_folder . $main_content_json_file_path);

         $this->generate_sidebar_if_required();
         $this->generate_main();
         $this->generate_floating_controls_if_required();
         $this->generate_aside_if_required();

         $formated_external_elements_ids = "";
         foreach ($this->elements_ids as $id) 
         {
            $formated_external_elements_ids .= '"'.$id.'",';
         };
         
         $this->register_component_markup('
            </div>
            <script
            id="main_content_001"
            type="module"
            >
               import main_content_class from "'.$this->root_folder.'_/components/main_content/main_content_001/main_content_001.js";
               new main_content_class(
                  "'.$this->root_folder.'", 
                  "'.$this->component_folder.'", 
                  "'.$this->page_title.'",
                  "'.$this->page_name.'",
                  "'.$this->page_description.'",
                  ['.$formated_external_elements_ids.'],
               );
            </script>
         ');
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
            $this->environment_variables["files"],
            null,
            $this->content_data,
            $this->articles_directory_path,
            $this->location_tracker_elements,
            $this->current_set_containing_directory
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
               $this->environment_variables["files"],
               $this->content_data
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