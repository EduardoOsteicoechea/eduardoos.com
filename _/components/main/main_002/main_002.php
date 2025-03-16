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
         return '<h1 class="article_main_heading">'.$content.'</h1>';
      }

      protected function generate_article_body_idea_biblical_passage_markup(array $line): string
      {
         $markup = "";         
         $markup .= '<p class="'.$line[1].'">';
         $markup .= '"' . $line[0] . '".';   
         if(isset($line[2]))
         {
            $markup .= '<span class="biblical_reference_small">'. $line[2] .'</span>';
         };
         $markup .= '</p>';
         return $markup;
      }

      protected function generate_article_body_idea_regular_list_markup(array $line): string
      {
         $markup = "";
         if(isset($line[2]))
         {
            $markup .= '<ul class="'.$line[1].'">';
            foreach ($line[2] as $list_element) 
            {
               # code...
               $markup .= '<li>'. $list_element . "." .'</li>';
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
            if(isset($line[1]))
            {

               if($line[1] === "biblical_passage")
               {
                  $markup .= $this->generate_article_body_idea_biblical_passage_markup($line);
               }
               else if($line[1] === "article_body_regular_list")
               {
                  $markup .= $this->generate_article_body_idea_regular_list_markup($line);
               }
               else
               {  
                  $markup .= '<p class="'.$line[1].'">';
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
         if($content === "") return "";

         return '<h2>'. $counter . ". " . $content .'</h2>';
      }

      protected function generate_article_body(array $content): string
      {
         $markup = "";
         for ($i=0; $i < count($content); $i++) 
         { 
            $idea = $content[$i];
            $idea_heading = $this->generate_article_idea_heading($idea[0], ($i + 1));
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
            width:100%;
            transition: none;
         "],["@media only screen and (max-width: 950px)","
            width:calc(100% - 3.25rem);
         "]],[
            $this->location_tracker_markup,
            $this->article_content,
         ],[],[],[""]);
      }
   }
?>