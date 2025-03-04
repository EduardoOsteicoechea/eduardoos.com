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

         $this->html .= '
            <div
            id="' . $this->is_outer_container_id . '"
            class="
               ' . $this->component_class . "_" . 'outer_container 
               closed_menu
            "
            >
            aaaaaa
            </div>

            <script type="module">
               import ' . $this->component_id. "_" . 'class from "'.$root_folder.'_/components/menu/menu_001/_.js";                  
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
               justify-content:center;
               padding: 1rem 1rem 1rem 1rem;
               height:8.5rem;
               width:100%;
               background:red;
               position:absolute;
               top:3.5rem;
               left:0%;
               transition:var(--tr2)
            }
            .opened_menu
            {
               left:0%;
            }
            .closed_menu
            {
               left:-100%;
            }
         ';
      }
   }
?>