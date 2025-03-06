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

   protected array | null $session = null;
   protected array | null $external_elements_ids = null;

   public function __construct
   (
      string $root_folder, 
      string $component_folder, 
      string $page_title,
      string $page_name,
      string $page_description,
      string $color_mode,
      string $parent_component_id,
      string $parent_component_class,
      array | null $session = null,
      array | null $external_elements_ids = null,
   )
   {
      $this->set_component_base_properties(
         $root_folder, 
         $component_folder,
         $page_title,
         $page_name,
         $page_description,
         $color_mode,
         $parent_component_id,
         $parent_component_class,
         $session, 
         $external_elements_ids
      );
      $this->validate_session();
      $this->generate_component_markup_and_styles();
   }
   
   private function set_component_base_properties
   (
      string $root_folder, 
      string $component_folder, 
      string $page_title,
      string $page_name,
      string $page_description,
      string $color_mode,
      string $parent_component_id,
      string $parent_component_class,
      array | null $session = null,
      array | null $external_elements_ids = null,
   )
   {
      $this->root_folder = $root_folder;
      $this->component_folder = $component_folder;
      $this->page_title = $page_title;
      $this->page_name = $page_name;
      $this->page_description = $page_description;
      $this->parent_component_id = $parent_component_id;
      $this->parent_component_class = $parent_component_class;
      $this->component_class = static::class;
      $this->component_id = $this->page_name . "_" . $this->component_class;
      $this->color_mode = $color_mode;
      $this->session = $session;
      $this->external_elements_ids = $external_elements_ids;
   }

   protected function generate_component_markup_and_styles()
   {

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
      $formatted_id = $this->component_id . "_" . $component_name;
      $formatted_class = $this->component_class . "_" . $component_name;
      $formatted_classes = $this->component_class . "_" . $component_name . " " . implode(" ", $component_classes);
      $formatted_attributes = implode(" ", $component_attributes);
      $formatted_styles_class = $this->generate_formated_component_styles($formatted_class, $component_styles);
      $formatted_content = implode(" ", $component_content);
      $formatted_javascript = $this->generate_formated_component_javascript($formatted_id,$component_name, $external_elements_ids);

      $new_component = '<'.$component_tag.' id="'.$formatted_id.'" class="'.$formatted_classes.'" '.$formatted_attributes;
      if(!$this->tag_is_simple($component_tag)) $new_component .= ">".$formatted_content."</".$component_tag;
      $new_component .= ">";
      $new_component .= $formatted_javascript;

      $this->component_markup .= $new_component;
      $this->component_styles .= $formatted_styles_class;
   }

   protected function add_subcomponent
   (
      string $component_tag,
      string $component_name,
      string $parent_component_name,
      array $component_content,
      array $component_styles,
      array $component_classes = [],
      array $component_attributes = [],
   ): string
   {
      $formatted_id = $this->component_id . "_" . $parent_component_name . "_" . $component_name;
      $formatted_class = $this->component_class . "_" . $parent_component_name . "_" . $component_name;
      $formatted_classes = $this->component_class . "_" . $parent_component_name . "_" . $component_name . " " . implode(" ", $component_classes);
      $formatted_attributes = implode(" ", $component_attributes);
      $formatted_styles_class = $this->generate_formated_component_styles($formatted_class, $component_styles);
      $formatted_content = implode(" ", $component_content);

      $new_component = '<'.$component_tag.' id="'.$formatted_id.'" class="'.$formatted_classes.'" '.$formatted_attributes;
      if(!$this->tag_is_simple($component_tag)) $new_component .= ">".$formatted_content."</".$component_tag;
      $new_component .= ">";

      $this->component_styles .= $formatted_styles_class;
      return $new_component;
   }

   private function generate_formated_component_javascript
   (
      $formatted_id,
      string $component_name, 
      array $external_elements_ids
   ): string
   {
      if($external_elements_ids[0] === "dont_trigger" ) return "";
      
      $component_base_javascript_path = $this->component_folder."/".static::class;
      
      $markup = "";

      $formated_external_elements_ids = "";
      foreach ($external_elements_ids as $id) 
      {
         $formated_external_elements_ids .= '"'.$id.'",';
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
               "'.$this->component_class.'",
               "'.$this->component_id.'",
               "'.$this->color_mode.'",
               "'.$this->session.'",
               ['.$formated_external_elements_ids.'],
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
      $formated_styles = "";
      foreach ($style_array as $style_properties) 
      {
         $particular_element_singular_name = $style_properties[0];
         $particular_element_styles = $style_properties[1];

         if($style_properties[0] === "")
         {
            $formated_styles .= "." . $component_class_name . "{\n" . $particular_element_styles . "\n}\n";
         }
         else if(str_contains($style_properties[0], "@media"))
         {
            $formated_styles .= $particular_element_singular_name.'{
   .'.$component_class_name.'{
      '.$style_properties[1].'
   }
}
';
         }
         else
         {
            $formated_styles .= "." . $particular_element_singular_name . "{\n" . $particular_element_styles . "\n}\n";
         };
      };
      return $formated_styles;
   }

   private function tag_is_simple
   (
      string $component_tag
   ):bool | null
   {
      $single_tags = ["img", "input", "br", "hr", "meta", "link", "area", "col", "embed", "source", "track", "wbr"];
      $compound_tags = ["div", "p", "span", "a", "ul", "ol", "li", "table", "tr", "td", "th", "h1", "h2", "h3", "h4", "h5", "h6", "form", "button", "select", "option", "textarea", "nav", "article", "section", "header", "footer", "aside", "main", "address", "time", "figure", "figcaption", "audio", "video"];

      if
      (
         !in_array($component_tag, $single_tags, true) 
            &&
         !in_array($component_tag, $compound_tags, true)
         )
      {
         return null;
      };

      return in_array($component_tag, $single_tags, true);
   }


   private function validate_session()
   {
      $this->session_is_active = $this->session !== null;
   }

   public function print_markup()
   {
      return $this->component_markup;
   } 

   public function print_styles()
   {
      return $this->component_styles;
   }
}
?>