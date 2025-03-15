<?php
   class page_top extends base_component
   {
      private header_002 | null $page_header;
      private menu_001 | null $page_menu = null;
      private string $page_styles = "";

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
         string $page_styles = "",
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

         $this->page_styles = $page_styles;

         $this->generate_page_menu();
         $this->generate_page_header();

         echo '
            <!DOCTYPE html>
            <html lang="es">
            <head>
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <title>'.$this->page_title.'</title>
               <meta description="'.$page_description.'">
               <link rel="icon" type="image/x-icon" href="'.$this->root_folder.'_/media/favicon.ico">
               <style>'. 
                  $this->generate_page_styles(
                     $this->root_folder,
                     $color_mode
                  )
               .'</style>
            </head>
            <body>
               '.$this->page_header->provide_markup().'
               '.$this->page_menu->provide_markup().'
            ';
      }

      private function generate_page_menu()
      {
         include $this->root_folder . "_/components/menu/menu_001/menu_001.php";

         $this->page_menu = new menu_001(
            $this->root_folder, 
            $this->page_title,
            $this->page_name,
            $this->page_description,
            $this->color_mode,
            $this->environment_variables["session"], 
         );
      }

      private function generate_page_header()
      {
         include $this->root_folder."_/components/header/header_002/header_002.php";
         
         $this->page_header = new header_002(
            $this->root_folder,
            $this->root_folder."_/components/header/header_002",
            $this->page_title,
            $this->page_name,
            $this->page_description,
            "","",
            [$this->page_menu->provide_outer_container_id()],
            $this->color_mode,
            $this->environment_variables["session"],
         );
      }

      private function generate_page_styles(string $root_folder, string $color_mode)
      {
         $styles = '';
         
         if($color_mode == "light")
         {
            $styles .= $this->generate_global_styles(
               $this->generate_fonts_styles($root_folder), 
               $this->styles_root_base, 
               $this->styles_light_color_scheme, 
               $this->styles_common_elements
            );
         }
         else
         {
            $styles .= $this->generate_global_styles(
               $this->generate_fonts_styles($root_folder), 
               $this->styles_root_base, 
               $this->styles_dark_color_scheme, 
               $this->styles_common_elements
            );
         };

         $styles .= $this->page_header->provide_styles();
         $styles .= $this->page_menu->provide_styles();
         $styles .= $this->page_styles;

         return $styles;
      }
      
      private function generate_global_styles($fonts, $root_base, $color_scheme, $common_elements)
      {
         return $fonts . $root_base . $color_scheme . $common_elements;
      }

      private function generate_fonts_styles($root_folder) 
      {
         return '
         @font-face{ font-family:  f1t    ; src: url(	'.$this->root_folder.'_/fonts/Raleway-Thin.ttf             ); }
         @font-face{ font-family:  f1ti   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-ThinItalic.ttf       ); }
         @font-face{ font-family:  f1el   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-ExtraLight.ttf       ); }
         @font-face{ font-family:  f1eli  ; src: url(	'.$this->root_folder.'_/fonts/Raleway-ExtraLightItalic.ttf ); }
         @font-face{ font-family:  f1l    ; src: url(	'.$this->root_folder.'_/fonts/Raleway-Light.ttf            ); }
         @font-face{ font-family:  f1li   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-LightItalic.ttf      ); }
         @font-face{ font-family:  f1m    ; src: url(	'.$this->root_folder.'_/fonts/Raleway-Medium.ttf           ); }
         @font-face{ font-family:  f1mi   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-MediumItalic.ttf     ); }
         @font-face{ font-family:  f1r    ; src: url(	'.$this->root_folder.'_/fonts/Raleway-Regular.ttf          ); }
         @font-face{ font-family:  f1ri   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-RegularItalic.ttf    ); }
         @font-face{ font-family:  f1sb   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-SemiBold.ttf         ); }
         @font-face{ font-family:  f1sbi  ; src: url(	'.$this->root_folder.'_/fonts/Raleway-SemiBoldItalic.ttf   ); }
         @font-face{ font-family:  f1b    ; src: url(	'.$this->root_folder.'_/fonts/Raleway-Bold.ttf             ); }
         @font-face{ font-family:  f1bi   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-BoldItalic.ttf       ); }
         @font-face{ font-family:  f1eb   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-ExtraBold.ttf        ); }
         @font-face{ font-family:  f1ebi  ; src: url(	'.$this->root_folder.'_/fonts/Raleway-ExtraBoldItalic.ttf  ); }
         @font-face{ font-family:  f1bl   ; src: url(	'.$this->root_folder.'_/fonts/Raleway-Black.ttf            ); }
         @font-face{ font-family:  f1bli  ; src: url(	'.$this->root_folder.'_/fonts/Raleway-BlackItalic.ttf      ); }
         ';
      }

      private string $styles_root_base = '
      :root {
         font-size: 16px;
         letter-spacing:0;
         line-height: 1.25rem;
         font-family: f1r, system-ui;
         scroll-behavior: smooth;
         --b1: solid .1rem red;
         --b2: solid .1rem rgb(0, 0, 0);
         --shadow_1: 1rem 1rem 1rem rgba(255,255,255,.25);
         --sh1: 1rem 1rem 1rem rgba(255,255,255,.25);
         --sh2: .0rem .0rem 1rem rgba(0,0,0, 0.15);
         --sh3: .15rem .15rem 1rem rgba(0,0,0, 0.1);
         --sh4: .25rem .25rem .25rem rgba(0,0,0, 0.5);
         --sh5: .25rem .25rem .5rem rgba(0,0,0, 0.25);
         --tr1: all ease 1000ms;
         --tr2: all ease 200ms;
         --header_height: 4rem;
         --header_item_height: 2.25rem;
         --header_item_padding: 0rem 1.25rem;
         --margin_common: 1.25rem;
         --main_content_sidebar_width: 33rem;
         --main_content_aside_width: 33rem;
         --right_side_small_control: 3.75rem;
      ';

      private string $styles_light_color_scheme = '
            --c1:#fff;
            --c2:#000;
            --c3:#f0f0f0;
            --c4:#fafafa;
            --c5: rgb(255, 255, 255);
            --c6: rgb(226, 226, 226);
            --c7: rgb(119, 119, 119);
            --c8: #f8f8f8;
            --c9: #cdcdcd;
            --c10: rgb(194, 194, 194);
            --c11:rgb(0, 255, 128);
            --c_whatsapp: #25D366;

            --success_1:rgb(0, 200, 73);
            --success_1_dark:rgb(0, 185, 68);
            --button_1:rgb(0, 110, 255);
            --inactive_1:rgb(215, 215, 215);
            --disabled_1:rgb(230, 230, 230);
            --failure_1:rgb(230, 43, 80);
         }
      ';

      private string $styles_dark_color_scheme = '
            --c1:#000;
            --c2:#fff;
            --c3:#f0f0f0;
            --c4:#fcf7cb;
            --c5: rgb(255, 255, 255);
            --c6: rgb(226, 226, 226);
            --c7: rgb(119, 119, 119);
            --c10: rgb(194, 194, 194);
            --c8: #f8f8f8;
            --c9: #cdcdcd;
            --c_whatsapp: #25D366;

            --success_1:rgb(0, 200, 73);
            --success_1_dark:rgb(0, 185, 68);
            --button_1:rgb(0, 110, 255);
            --inactive_1:rgb(215, 215, 215);
            --disabled_1:rgb(230, 230, 230);
            --failure_1:rgb(230, 43, 80);
         }
      ';

      private string $styles_common_elements = '

      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         border:none;
         position: relative;
         transition: var(--tr1);
         color: var(--c2);
         font-family: var(--f1l);
      }
      
      button {
         font-weight: 900;
         background: var(--c2);
         color: var(--c1);
         border:none;
         display:flex;
         align-items:center;
         justify-content:center;
         cursor:pointer;
         border-radius:.2rem !important;
      }
         
      a { font-size: 1rem; cursor: pointer; text-decoration:none; }
      p { font-size: 1rem; }
      b { font-family:f1bl; }
      h1{
         font-family: f1b; 
         font-size: 2rem;
         line-height: 2.5rem;
      }
      h2{
         font-family: f1b; 
         font-size: 1.5rem;
         line-height: 1.5rem;
      }
      h3{font-family: f1b; font-size: 1.5rem;}
      h4{font-family: f1b; font-size: 1rem;}
      


      body
      {
         max-width:1920px;
         display:flex;
         flex-direction:column;
         align-items:center;
         width:100%;
         overflow-x: hidden;
         overflow-y: auto;
         transition: none;
         margin: 0 auto;
      }      
      
      .article_abstract
      {
         background: var(--c3);
         padding:1rem;
         margin-bottom:.5rem;
      }
      .article_abstract > *
      {
         font-size:.75rem !important;
      }
      
      .biblical_passage
      {
         font-family:f1b;
      }
      
      .biblical_reference_small
      {
         display:block;
         font-size:.75rem;
         font-family:f1b;
         color:var(--c7);
      }
      
      .article_idea
      {
         display:flex;
         flex-direction:column;
         gap:1.35rem;
         width:100%;
         transition: none;
         padding: 0 0 1.25rem 0;
      }

      @media only screen and (max-width: 950px) and (min-width: 451px) {}
      
      @media only screen and (max-width: 450px) {}

      @media only screen and (max-width: 350px) {  
         body
         {
            display:block;
            width:345px;
         }
      }
               
      ';
   }
?>