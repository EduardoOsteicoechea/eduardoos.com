<?php
   class main_003 extends base_component
   {
      private bool $must_print_floating_controls = false;
      private bool $must_print_sidebar = false;
      private bool $must_print_aside = false;
      public floating_controls_001 | null $page_floating_controls = null;
      public sidebar_001 | null $page_sidebar = null;
      public aside_001 | null $page_aside = null;
      public string $articles_directory_path = "";
      public string $articles_cards = "";

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
         $articles_directory_path,
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
         $this->articles_directory_path = $this->root_folder . $articles_directory_path;
         $this->generate_component_markup_and_styles();
      }

      protected function get_articles_directories_paths():array
      {
         $directories_paths = [];
         $current_directory = getcwd();

         if (is_dir($current_directory))
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

      protected function get_directories_article_data(array $directories_paths):array
      {
         $directories_article_data = [];

         foreach ($directories_paths as $directory_path) 
         {
            $file_path = $directory_path . "/" . "article_data.json";

            if (file_exists($file_path))
            {
               $contents = file_get_contents($file_path);
               $directories_article_data[] = [$directory_path, json_decode($contents, true)];
            };
         };
         return $directories_article_data;
      }

      protected function generate_articles_cards_markup():string
      {
         $markup = "";         
         $directories_paths = $this->get_articles_directories_paths();
         $directories_articles_data = $this->get_directories_article_data($directories_paths);

         for ($i=0; $i < count($directories_articles_data); $i++) 
         { 
            $article_data = $directories_articles_data[$i];
            $markup .= '
            <a 
            id="'.$article_data[1]["id"].'"
            class="article_card"
            href="'.$this->articles_directory_path . "/" . $article_data[0].'"
            >
            ';
            // $markup .= '<h3 class="article_card_heading">' . ($i + 1) . ". " . $article_data[1]["title"] . '</h3>';
            $markup .= '<h3 class="article_card_heading">' . $article_data[1]["title"] . '</h3>';
            $markup .= '<p class="article_card_abstract">' . $article_data[1]["abstract"] . '</p>';
            $markup .= '<p class="article_card_author">' . $article_data[1]["author"] . '</p>';
            $markup .= '<p class="article_card_date">' . $article_data[1]["date"] . '</p>';
            $markup .= '<button class="article_card_button">Leer</button>';
            $markup .= '</a>';
         };
         foreach ($directories_articles_data as $article_data) 
         {
         };
         
         return $markup;
      }

      protected function generate_component_markup_and_styles()
      {
         $this->articles_cards = $this->generate_articles_cards_markup();
         $this->generate_and_register_location_tracker_markup();

         $this->add_component("main","main",[["","
            display:flex;
            flex-direction:column;
            gap:1.35rem;
            width:100%;
            transition: none;
            padding: 0 0 1.25rem 0rem;
         "],["@media only screen and (max-width: 950px)","
            grid-column:2;
            padding: 0 0 1.25rem 0rem;
            width:100%;
         "]],[
            
            $this->location_tracker_markup,

            $this->add_subcomponent("h1","articles_links_container_heading","main",[
            ["","
            "]],[
               "Conoce al Dios Verdadero"
            ]),

            $this->add_subcomponent("div","articles_links_container","main",[
            ["","
               display:flex;
               flex-wrap:wrap;
               row-gap:.75rem;
               column-gap:.75rem;
               width:100%;
               transition: none;
            "],["@media only screen and (max-width: 950px)","
               margin-bottom:1rem;
            "]],[
               $this->articles_cards
            ]),
            
            $this->location_tracker_markup,

         ],[],[],[""]);
      }
   }
?>