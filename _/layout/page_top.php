<?php 
   class page_top
   {
      public $root_folder;
      public $session;
      public $page_title;
      public $page_name;
      public $color_mode;
      public $component_id;
      public $component_class;
      public $html;
      public $page_header;
      public $page_menu;
      public $page_description;

      public function __construct
      (
         string $root_folder, 
         array | null $session, 
         string $page_title,
         string $page_name,
         string $page_description, 
         array $page_styles,
         string $color_mode
      )
      {
         $this->root_folder = $root_folder;
         $this->session = $session;
         $this->page_title = $page_title;
         $this->page_name = $page_name;
         $this->component_class = static::class;
         $this->component_id = $this->page_name . "_" . $this->component_class;
         $this->color_mode = $color_mode;
         $this->page_description = $page_description;

         $this->generate_page_menu();
         $this->generate_page_header();

         $html = '
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
                     $page_styles, 
                     $color_mode
                  )
               .'</style>
            </head>
            <body>
               '.$this->page_header->print_markup().'
               '.$this->page_menu->print_markup().'
         ';

         echo $html;
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
            $this->component_id,
            $this->component_class,
            $this->color_mode,
            $this->session,
            [
               $this->page_menu->provide_outer_container_id()
            ]
         );
      }

      private function generate_page_menu()
      {
         include "../_/components/menu/menu_001/menu_001.php";

         $this->page_menu = new menu_001(
            $this->root_folder, 
            $this->session, 
            $this->page_title,
            $this->page_name,
            $this->page_description,
            $this->color_mode
         );
      }

      private function generate_page_styles(string $root_folder, array $page_styles,string $color_mode)
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

         $styles .= $this->page_header->print_styles();
         $styles .= $this->page_menu->print_styles();

         $styles .= implode(" ", $page_styles);

         return $styles;
      }
      
      private function generate_global_styles($fonts, $root_base, $color_scheme, $common_elements)
      {
         return $fonts . $root_base . $color_scheme . $common_elements;
      }

      private function generate_fonts_styles($root_folder) {
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
         line-height: 1.35rem;
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
            --c11:rgb(148, 255, 193);
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
         border-radius:.2rem !important;
      }
      
      b {
         font-weight: 900;
         padding: 1rem 1.25rem;
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
      }
      
      a { font-size: 1rem; cursor: pointer; text-decoration:none; }
      p { font-size: 1rem; }
      h1{font-family: f1b; font-size: 2.5rem;}
      h2{font-family: f1b; font-size: 2rem;}
      h3{font-family: f1b; font-size: 1.5rem;}
      h4{font-family: f1b; font-size: 1rem;}
      
      .active_button
      {
         pointer-events: all;
         background: var(--success_1) !important;
      }
      .disabled_button
      {
         pointer-events: none;
         background: var(--inactive_1) !important;
      }
      .active_input
      {
         pointer-events: all;
         background: var(--c1) !important;
      }
      .disabled_input
      {
         pointer-events: none;
         background: var(--disabled_1) !important;
      }
      
      .disabled_container
      {
         height: 0 !important;
         overflow: hidden;
         display: none !important;
         padding: 0 1rem !important;
      }
      
      .enabled_container
      {
         padding: 1rem !important;
      }
      
      .awaiter_screen
      {
         z-index: 5000;
         opacity: 1;
         display: flex;
         width: 100%;
         height: 100%;
         background: var(--c3);
         position: absolute;
         left: 0;
         top: 0;
         transition: opacity ease 1000ms;
         pointer-events: none;
      }
      
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
      
      
      @media only screen and (max-width: 950px) and (min-width: 451px) { 
      }
      
      
      
      @media only screen and (max-width: 450px) {
         body
         {
         }
      }

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