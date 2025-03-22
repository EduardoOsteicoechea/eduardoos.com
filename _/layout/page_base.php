<?php
   class page_base
   {
      private string $root_folder = "";
      private string $page_type = "";
      private string $page_title = "";
      private string $page_name = "";
      private string $page_description = "";
      private string $page_color_scheme = "";

      private page_top | null $page_top = null;
      private object | null $page_bottom = null;

      public string $page_styles = "";
      public string $page_main_content = "";

      public array $elements_ids = [];

      private array $environment_variables = [];

      private array $available_page_types = [
         "unauthenticated_user_001" => "unauthenticated_user_001",
         "unauthenticated_user_002" => "unauthenticated_user_002",
         "authenticated_user_001" => "authenticated_user_001",
         "authenticated_user_002" => "authenticated_user_002",
         "authenticated_user_003" => "authenticated_user_003",
         "authenticated_user_004" => "authenticated_user_004",
         "authenticated_user_005" => "authenticated_user_005",
         "authenticated_user_006" => "authenticated_user_006",
         "authenticated_user_007" => "authenticated_user_007",
         "form_action_001" => "form_action_001",
         "document_download_001" => "document_download_001",
      ];

      public array | null $page_main_components = null;

      public string $page_markup = "";

      public function __construct
      (
         string $root_folder,
         string $page_type,
         string $page_title,
         string $page_name,
         string $page_description,
         string $page_color_scheme,
         array $page_main_components = [["markup"=>null,"styles"=>null]],
         array | null $get = null,
         array | null $post = null,
         array | null $session = null,
         array | null $files = null,
      )
      {
         $this->set_component_base_properties(
            $root_folder,
            $page_type,
            $page_title,
            $page_name,
            $page_description,
            $page_color_scheme,
            $page_main_components,
            $get,
            $post,
            $session,
            $files,
         );

         if($this->client_credentials_are_valid())
         {
            $this->generate_page_markup();
            $this->print_page_markup();
         }
         else
         {
            header("location: inicio");
            exit();
         };         
      }
      
      private function set_component_base_properties
      (
         string $root_folder,
         string $page_type,
         string $page_title,
         string $page_name,
         string $page_description,
         string $page_color_scheme,
         array $page_main_components = [["markup"=>null,"styles"=>null]],
         array | null $get = null,
         array | null $post = null,
         array | null $session = null,
         array | null $files = null,
      )
      {
         $this->root_folder = $root_folder;
         $this->page_type = $page_type;
         $this->page_title = $page_title;
         $this->page_name = $page_name;
         $this->page_description = $page_description;
         $this->page_color_scheme = $page_color_scheme;
         $this->page_main_components = $page_main_components;
         $this->environment_variables = ["get"=>$get,"post"=>$post,"session"=>$session,"files"=>$files];
      }
   
      protected function client_credentials_are_valid(): bool
      {
         $page_type_by_determined_by_credentials = $this->available_page_types["unauthenticated_user_001"];

         if
         (
            empty($this->environment_variables) || 
            (
               (!isset($this->environment_variables["get"]) || $this->environment_variables["get"] === null) &&
               (!isset($this->environment_variables["post"]) || $this->environment_variables["post"] === null) &&
               (!isset($this->environment_variables["session"]) || $this->environment_variables["session"] === null) &&
               (!isset($this->environment_variables["files"]) || $this->environment_variables["files"] === null)
            )
         )
         {
            $page_type_by_determined_by_credentials = $this->available_page_types["unauthenticated_user_001"];
         };

         if(isset($this->environment_variables["session"]) && $this->environment_variables["session"] !== null)
         {
            $page_type_by_determined_by_credentials = $this->available_page_types["authenticated_user_007"];
         };

         return $page_type_by_determined_by_credentials === $this->page_type;
      }
   
      protected function generate_page_markup()
      {       
         $this->page_styles .= '
            body
            {
               grid-template-rows:    0% 0% 0% 5% 0% auto 0% 0% 0% 0% 2%;
            }               
            @media only screen and (max-width: 950px)
            {
               body
               {
                  grid-template-rows:    0% 0% 0% 4% 0% auto 0% 0% 0% 0% 2%;
               } 
            }
         ';

         foreach ($this->page_main_components as $component)
         {
            $this->page_styles .= $component["styles"];
            $this->page_main_content .= $component["markup"];
            if(isset($component["elements_ids"]) && $component["elements_ids"] !== null)
            {
               foreach ($component["elements_ids"] as $id)
               {
                  $this->elements_ids[] = $id;
               };
            };
         };

         require_once $this->root_folder . "_/layout/page_bottom.php";

         $this->page_bottom = new page_bottom(
            $this->root_folder,
            $this->root_folder . "_/layout/page_bottom.php",
            $this->page_title,
            $this->page_name,
            $this->page_description,
            "","",null,
            $this->page_color_scheme,
            $this->environment_variables["session"],
            $this->environment_variables["get"],
            $this->environment_variables["post"],
            $this->environment_variables["files"],
         );

         $this->page_styles .= $this->page_bottom->provide_styles();

         require_once $this->root_folder . "_/layout/page_top.php";

         $this->page_top = new page_top(
            $this->root_folder,
            $this->root_folder . "_/layout/page_top.php",
            $this->page_title,
            $this->page_name,
            $this->page_description,
            "","",null,
            $this->page_color_scheme,
            $this->environment_variables["session"],
            $this->environment_variables["get"],
            $this->environment_variables["post"],
            $this->environment_variables["files"],
            $this->page_styles,
         ); 

         $this->page_markup .= $this->page_top->provide_markup();
         $this->page_markup .= $this->page_main_content;
         $this->page_markup .= $this->page_bottom->provide_markup();
      }
   
      protected function print_page_markup()
      {
         echo $this->page_markup;
      }      
   }
   ?>