<?php
class base_component
{
   protected string $root_folder = "";
   protected string $component_folder = "";
   protected bool $session_is_active = false;
   protected string $parent_component_id = "";
   protected string $parent_component_class = "";
   protected string $component_id = "";
   protected string $component_class = "";
   protected string $page_title = "";
   protected string $page_name = "";
   protected string $page_description = "";
   protected string $color_mode = "";
   protected string $component_markup = "";
   protected string $component_styles = "";
   protected array | null $environment_variables = null;
   protected array | null $external_elements_ids = null;
   protected array | null $elements_ids = null;
   protected array | null $content_data = null;
   public array | null $location_tracker_elements = null;
   public string $location_tracker_markup = "";
   public string $articles_directory_path = "";


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
      string $articles_directory_path = "",
      array | null $location_tracker_elements = null,
   )
   {
      $this->set_component_base_properties(
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
         $articles_directory_path,
         $location_tracker_elements,
      );
      
      $this->external_elements_ids = $external_elements_ids === null ? [] : $external_elements_ids;
      $this->validate_session();
   }

   private function validate_session()
   {
      $this->session_is_active = $this->environment_variables["session"] !== null;
   }

   protected function generate_component_markup_and_styles()
   {

   }
   
   private function set_component_base_properties
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
      $this->root_folder = $root_folder;
      $this->component_folder = $component_folder;
      $this->page_title = $page_title;
      $this->page_name = $page_name;
      $this->page_description = $page_description;
      
      $this->parent_component_id = $parent_component_id;
      $this->parent_component_class = $parent_component_class;
      
      if($parent_component_class !== "" && $parent_component_class !== null)
      {
         $this->parent_component_class = $parent_component_class;
         $this->component_class = $this->page_name . "_" . $this->parent_component_class . "_" . $this->component_class;
      }
      else
      {
         $this->component_class = static::class;
      };
      
      if($parent_component_id !== "" && $parent_component_id !== null)
      {
         $this->parent_component_id = $parent_component_id;
         $this->component_id = $this->page_name . "_" . $this->parent_component_id . "_" . $this->component_class;
      }
      else
      {
         $this->component_id = $this->page_name . "_" . $this->component_class;
      };
      
      $this->external_elements_ids = $external_elements_ids;
      
      $this->color_mode = $color_mode;

      $this->environment_variables = ["session"=>$session,"get"=>$get,"post"=>$post,"files"=>$files];
   }

   protected function add_component
   (
      string $component_tag,
      string $component_name,
      array $component_styles,
      array $component_content,
      array $component_classes = [],
      array $component_attributes = [],
      array $external_elements_ids = ["dont_trigger"],
   ): void
   {
      ///////////////////////////////
      // Generate component markup parts
      ///////////////////////////////

      $formatted_id = $this->component_id . "_" . $component_name;
      $formatted_class = $this->component_class . "_" . $component_name;
      $formatted_classes = $this->component_class . "_" . $component_name . " " . implode(" ", $component_classes);
      $formatted_attributes = implode(" ", $component_attributes);
      $formatted_content = implode(" ", $component_content);

      ///////////////////////////////
      // Register the component id to make it globally avaiable for external components and internal Javascript
      ///////////////////////////////

      $this->register_component_id($component_name, $formatted_id);
      
      ///////////////////////////////
      // "$this->generate_formated_component_javascript" must occur after "$this->register_component_id($component_name, $formatted_id)", because it uses the ids provide by the above.
      ///////////////////////////////

      $component_javascript_markup = $this->generate_formated_component_javascript(
         $formatted_id,
         $component_name,
         $external_elements_ids,
      );

      ///////////////////////////////
      // Compose component markup
      ///////////////////////////////

      $new_component_markup = '<'.$component_tag.' id="'.$formatted_id.'" class="'.$formatted_classes.'" '.$formatted_attributes;

      if(!$this->tag_is_simple($component_tag)) $new_component_markup .= ">".$formatted_content."</".$component_tag;
      
      $new_component_markup .= ">";

      $new_component_markup .= $component_javascript_markup;

      ///////////////////////////////
      // Register component markup and styles
      ///////////////////////////////
      
      $this->generate_formated_component_styles($formatted_class,$component_styles); 
      $this->register_component_markup($new_component_markup);
   }

   protected function add_subcomponent
   (
      string $component_tag,
      string $component_name,
      string $parent_component_name,
      array $component_styles,
      array $component_content,
      array $component_classes = [],
      array $component_attributes = [],
   ): string
   {
      ///////////////////////////////
      // Generate component markup parts
      ///////////////////////////////
      
      $formatted_id = $this->component_id . "_" . $parent_component_name . "_" . $component_name;
      $formatted_class = $this->component_class . "_" . $parent_component_name . "_" . $component_name;
      $formatted_classes = $this->component_class . "_" . $parent_component_name . "_" . $component_name . " " . implode(" ", $component_classes);
      $formatted_attributes = implode(" ", $component_attributes);
      $formatted_content = implode(" ", $component_content);

      ///////////////////////////////
      // Register the component id to make it globally avaiable for external components and internal Javascript
      ///////////////////////////////

      $this->register_component_id($component_name, $formatted_id);

      ///////////////////////////////
      // Compone component markup
      ///////////////////////////////

      $new_component_markup = '<'.$component_tag.' id="'.$formatted_id.'" class="'.$formatted_classes.'" '.$formatted_attributes;
      
      if(!$this->tag_is_simple($component_tag)) $new_component_markup .= ">".$formatted_content."</".$component_tag;
      
      $new_component_markup .= ">";

      ///////////////////////////////
      // Register component data and return it if required
      ///////////////////////////////
      
      $this->generate_formated_component_styles($formatted_class, $component_styles);
      return $new_component_markup;
   }

   protected function register_component_id(string $component_name, string $formatted_id):void 
   {
      $this->elements_ids[$component_name] = $formatted_id;
   }

   protected function register_subcomponent_ids(array $elements_ids):void 
   {            
      foreach ($elements_ids as $component_name => $id) 
      {
         $this->register_component_id($component_name, $id);
      }
   }

   protected function register_component_markup(string $new_component_markup):void 
   {
      $this->component_markup .= $new_component_markup;
   }

   protected function register_component_styles(string $formatted_styles):void 
   {
      $this->component_styles .= $formatted_styles;
   }

   private function generate_formated_component_javascript
   (
      string $formatted_id,
      string $component_name, 
      array $external_elements_ids
   ): string
   {
      if($external_elements_ids[0] === "dont_trigger" ) return "";
      
      $component_base_javascript_path = $this->component_folder."/".static::class;
      
      $markup = "";

      $formated_external_elements_ids = "";
      if($external_elements_ids !== null)
      {
        foreach ($external_elements_ids as $id) 
        {
           $formated_external_elements_ids .= '"'.$id.'",';
        };
      }
      else
      {
        $formated_external_elements_ids = [];
      };

      $markup = '<script
         id="'.$formatted_id.'_script"
         type="module"
         >
            import '.$component_name.'_class from "'.$component_base_javascript_path.'.js";                  
            new '.$component_name.'_class
            (
               "'.$this->root_folder.'",
               "'.$this->component_folder.'",
               "'.$this->page_title.'",
               "'.$this->page_name.'",
               "'.$this->page_description.'",
               "'.$this->parent_component_id.'",
               "'.$this->parent_component_class.'",
               "'.$this->component_id.'",
               "'.$this->component_class.'",
               "'.$this->color_mode.'",
               ['.$formated_external_elements_ids. implode(", ", $this->elements_ids).'],
               ['.implode($this->environment_variables).'],
            );
      </script>';
      
      return $markup;
   }

   private function generate_formated_component_styles
   (
      string $component_class_name, 
      array $style_array
   )
   {
      $formatted_styles = "";
      foreach ($style_array as $style_properties) 
      {
         $particular_element_singular_name = $style_properties[0];
         $particular_element_styles = $style_properties[1];

         if($style_properties[0] === "")
         {
            $formatted_styles .= "." . $component_class_name . "{\n" . $particular_element_styles . "\n}\n";
         }
         else if(str_contains($style_properties[0], "@media"))
         {
            $formatted_styles .= $particular_element_singular_name.'{
   .'.$component_class_name.'{
      '.$style_properties[1].'
   }
}
';
         }
         else
         {
            $formatted_styles .= "." . $particular_element_singular_name . "{\n" . $particular_element_styles . "\n}\n";
         };
      };

      $this->register_component_styles($formatted_styles);
   }

   private function tag_is_simple
   (
      string $component_tag
   ):bool | null
   {
      $single_tags = ["img", "input", "br", "hr", "meta", "link", "area", "col", "embed", "source", "track", "wbr"];
      $compound_tags = ["div", "p", "span", "a", "ul", "ol", "li", "table", "tr", "td", "th", "h1", "h2", "h3", "h4", "h5", "h6", "form", "button", "select", "option", "textarea", "nav", "article", "section", "header", "footer", "aside", "main", "address", "time", "figure", "figcaption", "audio", "video"];

      if(!in_array($component_tag, $single_tags, true) && !in_array($component_tag, $compound_tags, true))
      {
         return null;
      };

      return in_array($component_tag, $single_tags, true);
   }

   public function provide_markup() { return $this->component_markup; } 
   public function provide_styles() { return $this->component_styles; }
   public function provide_elements_ids() { return $this->elements_ids; }
   public function get_content_data_from_json_file(string $filepath, array $files_names = null) : void
   {
      if (file_exists($filepath))
      {
         $contents = file_get_contents($filepath);
         $this->content_data = json_decode($contents, true);
      };
   }
      
   public function generate_and_register_location_tracker_markup():void
   {
      $this->location_tracker_markup .= '
      <div
      id="location_tracker"
      class="location_tracker_outer_container"
      >
      ';

      $location_tracker_elements_count = count($this->location_tracker_elements);

      for ($i=0; $i < $location_tracker_elements_count; $i++) 
      { 
         $location_tracker_element = $this->location_tracker_elements[$i];

         $this->location_tracker_markup .= '
            <a
            href="'.$this->root_folder . $location_tracker_element[1].'"
            class="location_tracker_outer_container_anchor"
            >
               '.$location_tracker_element[0].'
            </a>
         ';

         if($i < $location_tracker_elements_count - 1)
         {
            $this->location_tracker_markup .= '
            <div
            class="location_tracker_outer_container_arrow_container"
            >
               <div class="horizontal_arrow_bar top_arrow_top_bar"></div>
               <div class="horizontal_arrow_bar top_arrow_bottom_bar"></div>
            </div>
         ';
         };
      }

      $this->location_tracker_markup .= '</div>';      
   }
}
?>