<?php
   class menu_001
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
         string $color_mode
      )
      {
         $this->root_folder = static::class;
         $this->session = $session;
         $this->page_name = $page_name;
         $this->component_class = static::class;
         $this->component_id = $this->page_name . "_" . $this->component_class;
         $this->is_outer_container_id = $this->component_id . "_" . "outer_container";
         
         include $root_folder . "_/components/anchors/anchors_001/_.php";
         
         $this->application_anchors = new anchors_001($root_folder, $session, $page_name, $this->component_id, $this->component_class);

         $this->html .= '
            <div
            id="' . $this->is_outer_container_id . '"
            class="
               ' . $this->component_class . "_" . 'outer_container 
               closed_menu
            "
            >

               <nav
               id="' . $this->component_id . "_" . 'navigation"
               class="' . $this->component_class . "_" . 'navigation"
               >
                  <ul
                  id="' . $this->component_id . "_" . 'navigation_list"
                  class="' . $this->component_class . "_" . 'navigation_list"
                  >
                     '.$this->application_anchors->print_markup().'
                  </ul>
               </nav>
            </div>

            <script type="module">
               import ' . $this->component_id. "_" . 'class from "'.$root_folder.'_/components/menu/menu_001/menu_001.js";                  
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

      public function provide_outer_container_id()
      {
         return $this->is_outer_container_id;
      }      

      public function print_styles()
      {
         return '
            .'.$this->component_class.'_outer_container
            {
               display:flex;
               height:100dvh;
               overflow-y:auto;
               width:100%;
               background:var(--c1);
               position:absolute;
               top:var(--header_height);
               left:0%;
               transition:var(--tr2);
               z-index:10000;
            }

            .opened_menu
            {
               left:0%;
            }

            .closed_menu
            {
               left:-100%;
            }

            .'.$this->component_class.'_navigation
            {
               height:100%;
               width:100%;
               padding: 1.25rem 2.5rem 1.25rem 2.25rem;
            }

            .'.$this->component_class.'_navigation_list
            {
               list-style-type: none;
               display:flex;
               flex-direction: column;
               gap:.75rem;
            }

            '.$this->application_anchors->print_styles().'
         ';
      }
   }
?>