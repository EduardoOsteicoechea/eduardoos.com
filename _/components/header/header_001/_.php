<?php
   class header_001
   {
      public $root_folder;
      public $session;
      public $page_title;
      public $page_name;
      public $component_id;
      public $component_class;
      public $page_description;
      public $color_mode;
      public $html;
      public $menu_outer_container_id;

      public function __construct
      (
         string $root_folder, 
         array | null $session, 
         string $page_title,
         string $page_name,
         string $component_id,
         string $component_class,
         string $color_mode,
         string $menu_outer_container_id
      )
      {
         $this->root_folder = $root_folder;
         $this->session = $session;
         $this->page_title = $page_title;
         $this->page_name = $page_name;
         $this->component_class = static::class;
         $this->component_id = $this->page_name . "_" . $this->component_class;
         $this->color_mode = $color_mode;
         $this->menu_outer_container_id = $menu_outer_container_id;

         $this->html .= '
            <div
            id="' . $this->component_id . "_" . 'outer_container"
            class="' . $this->component_class . "_" . 'outer_container"
            >
               <div
               id="' . $this->component_id . "_" . 'logo_container"
               class="' . $this->component_class . "_" . 'logo_container"
               >eduardoos.com</div>

               <button
               id="' . $this->component_id . "_" . 'button"
               class="' . $this->component_class . "_" . 'button"
               data-target-checkbox="'.$this->menu_outer_container_id.'"
               >Menú</button>
            </div>

            <script type="module">
               import ' . $this->component_id. "_" . 'class from "'.$root_folder.'_/components/header/header_001/_.js";                  
               new ' . $this->component_id. "_" . 'class
               (
                  "' . $this->root_folder . '",
                  "' . $this->page_name . '",
                  "' . $this->component_id . '",
                  "' . $this->component_class . '",
                  "' . $this->component_id . "_" . 'outer_container",
                  "' . $this->menu_outer_container_id . '",
               );
            </script>            
         ';
      }

      public function print_markup()
      {
         return $this->html;
      }
      

      public function print_styles()
      {
         return '
            .'.$this->component_class.'_outer_container
            {
               display:flex;
               justify-content:center;
               padding: 0rem 1rem 0rem 1rem;
               height:3.5rem;
               width:100%;
            }

            .'.$this->component_class.'_logo_container
            {
               display:flex;
               align-items:center;
               justify-content:center;
               font-family:f1b;
               font-size: 1.5rem
            }

            .'.$this->component_class.'_button
            {
               padding: 1rem 2.25rem;
               height: 2rem;
               margin: auto 0 auto auto;
            }

             @media only screen and (max-width: 650px) 
             { 
               .'.$this->component_class.'_logo_container
               {
                  font-size: 1rem;
                  font-family:f1b;
                  height:100% !important;
               }

               .'.$this->component_class.'_button
               {
                  padding: 0.95rem 1.25rem;
                  height: 1.35rem;
                  font-size: .8rem;
               }
            }
         ';
      }
   }
?>