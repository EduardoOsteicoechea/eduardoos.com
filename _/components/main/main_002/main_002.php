<?php
class main_002 extends base_component
{
   private bool $must_print_floating_controls = false;
   private bool $must_print_sidebar = false;
   private bool $must_print_aside = false;
   public floating_controls_001 | null $page_floating_controls = null;
   public sidebar_001 | null $page_sidebar = null;
   public aside_001 | null $page_aside = null;
   public string $article_content = "";
   public string $current_set_pagination = "";
   public string $current_set_containing_directory = "";

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
      array | null $components_to_render = null,
      $content_data,
      string $main_content_json_file_path = "",
      array | null $location_tracker_elements = null,
      string $current_set_containing_directory = "",
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
      $this->current_set_containing_directory = $current_set_containing_directory;
      $this->location_tracker_elements = $location_tracker_elements;
      $this->articles_directory_path = $main_content_json_file_path;
      $this->content_data = $content_data;
      $this->generate_current_set_pagination();
      $this->generate_article_content();
      $this->generate_and_register_location_tracker_markup();
      $this->generate_component_markup_and_styles();
   }

   protected function generate_article_abstract(string $content): string
   {
      return '
            <div class="article_abstract">
               <b>Idea clave:</b>
               <p>' . $content . '</p>
            </div>
         ';
   }

   protected function generate_article_title(string $content): string
   {
      return '<h1 class="article_main_heading">' . $content . '</h1>';
   }

   protected function generate_article_body_idea_biblical_passage_markup(array $line): string
   {
      $markup = "";
      $markup .= '<p class="' . $line[1] . '">';
      $markup .= '"' . $line[0] . '".';
      if (isset($line[2]))
      {
         $markup .= '<span class="biblical_reference_small">' . $line[2] . '</span>';
      };
      $markup .= '</p>';
      return $markup;
   }

   protected function generate_article_body_idea_regular_list_markup(array $line): string
   {
      $markup = "";
      if (isset($line[2]))
      {
         $markup .= '<ul class="' . $line[1] . '">';
         foreach ($line[2] as $list_element)
         {
            # code...
            $markup .= '<li>' . $list_element . "." . '</li>';
         }
         $markup .= '</ul>';
      };
      return $markup;
   }

   protected function generate_article_body_idea(array $content): string
   {
      $markup = "";
      foreach ($content as $line)
      {
         if (isset($line[1]))
         {

            if ($line[1] === "biblical_passage")
            {
               $markup .= $this->generate_article_body_idea_biblical_passage_markup($line);
            }
            else if ($line[1] === "article_body_regular_list")
            {
               $markup .= $this->generate_article_body_idea_regular_list_markup($line);
            }
            else
            {
               $markup .= '<p class="' . $line[1] . '">';
               $markup .= $line[0];
               $markup .= '</p>';
            };
         }
         else
         {
            $markup .= '<p>';
            $markup .= $line[0];
            $markup .= '</p>';
         };
      };
      return $markup;
   }

   protected function generate_article_idea_heading(string $content, int $counter): string
   {
      if ($content === "") return "";

      // return '<h2>' . $counter . ". " . $content . '</h2>';
      return '<h2>' . $content . '</h2>';
   }

   protected function generate_article_body(array $content): string
   {
      $markup = "";
      for ($i = 0; $i < count($content); $i++)
      {
         $idea = $content[$i];
         $idea_heading = $this->generate_article_idea_heading($idea[0], ($i + 1));
         $idea_id = $this->component_id . "_" . $idea[1];
         $idea_id = $idea[1];
         $idea_subideas = $this->generate_article_body_idea($idea[2]);
         $markup .= '
               <div
               id="' . $idea_id . '"
               class="article_idea"
               >
                  ' . $idea_heading . '
                  ' . $idea_subideas . '
               </div>
            ';
      };
      $markup .= '
            <a
            href="https://wa.me/584147281033?text="
            target="_blank"
            class="article_lets_talk_button_anchor"
            >
               <button class="article_lets_talk_button">Conversemos</button>
            </a>
         ';
      return $markup;
   }

   protected function generate_article_content()
   {
      $this->article_content = "";

      $title = $this->generate_article_title($this->content_data["title"]);
      $content = $this->generate_article_body($this->content_data["article"]);
      $abstract = $this->generate_article_abstract($this->content_data["abstract"]);

      $this->article_content = $abstract . $title . $content;
   }

   protected function get_current_set_items_urls()
   {
      $directories_paths = [];
      $current_directory = dirname(getcwd());

      if (is_dir($this->current_set_containing_directory))
      {
         $handle = opendir($current_directory);
         if ($handle)
         {
            while (($file = readdir($handle)) !== false)
            {
               if ($file != "." && $file != "..")
               {
                  $path = realpath($current_directory . DIRECTORY_SEPARATOR . $file);
                  if (is_dir($path))
                  {
                     $directories_paths[] .= $file;
                  };
               };
            };
            closedir($handle);
         };
      };

      return $directories_paths;
   }

   protected function generate_current_set_pagination()
   {
      $current_set_urls = $this->get_current_set_items_urls();

      $current_location = $this->location_tracker_elements[count($this->location_tracker_elements) - 1][1];
      $current_location_parts = explode("/", $current_location);
      $current_set_parent_directory_name = $current_location_parts[count($current_location_parts) - 4];
      $current_set_directory_name = $current_location_parts[count($current_location_parts) - 3];
      $current_location_directory_name = $current_location_parts[count($current_location_parts) - 2];
      $current_set_base_location_path = $this->root_folder . $current_set_parent_directory_name . "/" . $current_set_directory_name . "/";

      $this->current_set_pagination .= '
         <div
         id="' . $this->component_id . '_current_set_pagination"
         class="current_set_pagination"
         >
            <h3
            class="current_set_pagination_heading"
            >
               Ubicación en la serie
            </h3>
            <div
            class="current_set_pagination_anchors_container"
            >
      ';

      $this->current_set_pagination .= '
         <a 
         href="' . $current_set_base_location_path . $current_set_urls[0] . '"
         >
            <div
            class="current_set_first_or_last_pagination_item current_set_pagination_item"
            >
               ...
            </div>
         </a>
      ';

      if (count($current_set_urls) > 5)
      {
         for ($i = 0; $i < count($current_set_urls); $i++)
         {
            $current_url = $current_set_urls[$i];

            if 
            (
               $current_url === $current_location_directory_name && 
               (
                  $current_url !== $current_set_urls[0] ||
                  $current_url !== $current_set_urls[count($current_set_urls) - 1]
               )
            )
            {
               if (isset($current_set_urls[$i - 1]))
               {
                  $this->current_set_pagination .= '
                     <a 
                     href="' . $current_set_base_location_path . $current_set_urls[$i - 1] . '"
                     >
                        <div
                        class="current_set_pagination_item"
                        >' . ($i) . '</div>
                     </a>
                  ';
               };

               $this->current_set_pagination .= '
                  <div 
                  class="current_set_pagination_item current_set_pagination_current_item"
                  >
                     ' . ($i + 1) . '
                  </div>
               ';

               if (isset($current_set_urls[$i + 1]))
               {
                  $this->current_set_pagination .= '
                  <a 
                  href="' . $current_set_base_location_path . $current_set_urls[$i + 1] . '"
                  >
                     <div
                     class="current_set_pagination_item"
                     >' . ($i + 2) . '</div>
                  </a>
                  ';
               };
            }
            else if
            (
               $current_url === $current_location_directory_name
            )
            {
               if ($i === 0)
               {
                  $this->current_set_pagination .= '
                     <a 
                     href="' . $current_set_base_location_path . $current_set_urls[$i + 1] . '"
                     >
                        <div
                        class="current_set_pagination_item"
                        >
                           ' . ($i + 2) . '
                        </div>
                     </a>
                  ';
               };

               if ($i === count($current_set_urls) - 1)
               {
                  $this->current_set_pagination .= '
                     <a 
                     href="' . $current_set_base_location_path . $current_set_urls[$i - 1] . '"
                     >
                        <div
                        class="current_set_pagination_item"
                        >
                           ' . ($i) . '
                        </div>
                     </a>
                  ';
               };
            };
         };
      }
      else if (count($current_set_urls) > 1)
      {
         for ($i = 1; $i < count($current_set_urls) - 1; $i++)
         {
            $current_url = $current_set_urls[$i];

            if ($current_url === $current_location_directory_name)
            {
               $this->current_set_pagination .= '
               <div 
               class="current_set_pagination_current_item"
               >
                  ' . ($i + 1) . '
               </div>
               ';
            }
         };
      }
      else
      {
         $this->current_set_pagination .= '
         <div 
         class="current_set_pagination_current_item"
         >
            current
         </div>';
      };


      $this->current_set_pagination .= '
         <a 
         href="' . $current_set_base_location_path . $current_set_urls[count($current_set_urls) - 1] . '"
         >
            <div
            class="current_set_first_or_last_pagination_item current_set_pagination_item"
            >
               ...
            </div>
         </a>
      ';

      $this->current_set_pagination .= '
            </div>
         </div>
      ';
   }

   protected function generate_component_markup_and_styles()
   {
      $this->add_component("main", "outer_container", [["", "
            grid-column:6;
            display:flex;
            flex-direction:column;
            gap:.75rem;
            width:100%;
            height:fit-content;
            transition: none;
            overflow: hidden;
         "]], [
         $this->location_tracker_markup,
         $this->current_set_pagination,
         $this->article_content,
         $this->current_set_pagination,
         $this->location_tracker_markup,
      ], [], [], [""]);
   }
}

?>
