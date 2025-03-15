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
         $content_data,
         string $main_content_json_file_path = "",
         array | null $location_tracker_elements = null,
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
         $this->location_tracker_elements = $location_tracker_elements;
         $this->articles_directory_path = $main_content_json_file_path;
         $this->content_data = $content_data;
         $this->generate_article_content();
         $this->generate_and_register_location_tracker_markup();
         $this->generate_component_markup_and_styles();
      }

      protected function generate_article_abstract(string $content): string
      {
         return '
            <div class="article_abstract">
               <b>Idea clave:</b>
               <p>'.$content.'</p>
            </div>
         ';
      }

      protected function generate_article_title(string $content): string
      {
         return "<h1>".$content."</h1>";
      }

      protected function generate_article_body_idea(array $content): string
      {
         $markup = "";
         foreach ($content as $line) 
         {
            $markup .= '<p class="'.$line[1].'">';

            if($line[1] === "biblical_passage")
            {
               $markup .= '"' . $line[0] . '".';

               if(isset($line[2]))
               {
                  $markup .= '<span class="biblical_reference_small">'. $line[2] .'</span>';
               };
   
               $markup .= '</p>';
            }
            else
            {
               $markup .= $line[0];
               $markup .= '</p>';
            };
         };
         return $markup;
      }

      protected function generate_article_idea_heading(string $content): string
      {
         if($content === "") return "";

         return "<h2>".$content."</h2>";
      }

      protected function generate_article_body(array $content): string
      {
         $markup = "";
         foreach ($content as $idea) 
         {
            $idea_heading = $this->generate_article_idea_heading($idea[0]);
            $idea_id = $this->component_id . "_" . $idea[1];
            $idea_id = $idea[1] . "_article_idea";
            $idea_subideas = $this->generate_article_body_idea($idea[2]);
            $markup .= '
               <div
               id="'.$idea_id.'"
               class="article_idea"
               >
                  '.$idea_heading.'
                  '.$idea_subideas.'
               </div>
            ';
         };
         return $markup;
      }

      protected function generate_article_content()
      {
         $this->article_content = "";
         
         $title = $this->generate_article_title($this->content_data["title"]);
         $content = $this->generate_article_body($this->content_data["article"]);
         $abstract = $this->generate_article_abstract($this->content_data["abstract"]);

         $this->article_content = $title . $abstract . $content;
      }

      protected function generate_component_markup_and_styles()
      {
                 

         $this->add_component("main","main",[["","
            display:flex;
            flex-direction:column;
            gap:1.35rem;
            width:100%;
            transition: none;
            padding: 0 0 1.25rem 0rem;
         "],["@media only screen and (max-width: 950px)","
            padding: 0 0 1.25rem 0rem;
            width:calc(100% - 3.25rem);
         "]],[
            $this->location_tracker_markup,
            $this->article_content,
         ],[],[],[""]);
      }
   }
?>