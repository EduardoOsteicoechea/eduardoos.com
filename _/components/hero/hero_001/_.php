<?php
   class hero_001
   {
      public $root_folder;
      public $session;
      public $component_id;
      public $component_class;
      public $page_name;
      public $html;
      public $is_outer_container_id;
      public $application_anchors;

      public function __construct
      (
         string $root_folder, 
         array | null $session, 
         string $page_title,
         string $page_name,
         string $page_description,
         string $color_mode,
         string $image_name,
         string $image_description
      )
      {
         $this->root_folder = static::class;
         $this->session = $session;
         $this->page_name = $page_name;
         $this->component_class = static::class;
         $this->component_id = $this->page_name . "_" . $this->component_class;

         $this->html .= '
            <div
            id="' . $this->is_outer_container_id . "_" . "outer_container" .'"
            class="' . $this->component_class . "_" . "outer_container" .'"
            >
               <div
               id="' . $this->is_outer_container_id . "_" . "background_container" .'"
               class="' . $this->component_class . "_" . "background_container" .'"
               >
                  <img
                  id="' . $this->is_outer_container_id . "_" . "background_container_image" .'"
                  class="' . $this->component_class . "_" . "background_container_image" .'"
                  src="'.$root_folder.'_/media/'.$image_name.'"
                  alt="'.$image_description.'"
                  >
               </div>

               <div
               id="' . $this->is_outer_container_id . "_" . "buttons_container" .'"
               class="' . $this->component_class . "_" . "buttons_container" .'"
               >
                  <button
                  id="' . $this->is_outer_container_id . "_" . "buttons_container_button_1" .'"
                  class="' . $this->component_class . "_" . "buttons_container_button" .' ' . $this->component_class . "_" . "buttons_container_button_1" .'"
                  >
                     Menú
                  </button>
                  <button
                  id="' . $this->is_outer_container_id . "_" . "buttons_container_button_2" .'"
                  class="' . $this->component_class . "_" . "buttons_container_button" .' ' . $this->component_class . "_" . "buttons_container_button_2" .'"
                  >
                     Conoce más
                  </button>
               </div>
            </div>

            <script type="module">
               import ' . $this->component_id. "_" . 'class from "'.$root_folder.'_/components/hero/hero_001/_.js";                  
               new ' . $this->component_id. "_" . 'class
               (
                  "' . $this->root_folder . '",
                  "' . $this->page_name . '",
                  "' . $this->component_id . '",
                  "' . $this->component_class . '",
                  "' . $this->component_id . "_" . 'outer_container",
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
               flex-direction:column;
               align-items:center;
               justify-content:flex-end;
               height:100dvh;
               width:100%;
               overflow:hidden;
            }
            .'.$this->component_class.'_background_container
            {
               height:100%;
               width:100%;
               display:flex;
               position:absolute;
               top:0;
               left:0;
               overflow:hidden;
            }
            .'.$this->component_class.'_background_container_image
            {
               height:115%;
               position:absolute;
               top:0;
               left:0;
               display:flex;
            }
            .'.$this->component_class.'_buttons_container
            {
               display:flex;
               align-items:center;
               justify-content:center;
               gap:1rem;
               margin: 0 0 1.5rem 0;
            }
            .'.$this->component_class.'_buttons_container_button
            {
               height: 3rem;
               width: 9rem;
               font-size:1rem;
               font-family:f1bl;
            }
            .'.$this->component_class.'_buttons_container_button_1
            {
            }
            .'.$this->component_class.'_buttons_container_button_2
            {
            }
         ';
      }
   }
?>