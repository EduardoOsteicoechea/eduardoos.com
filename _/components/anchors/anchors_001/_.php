<?php
class anchors_001
{
  private $styles;
  private $html;
  private $root_folder;
  private $session;
  private $page_name;
  private $component_id;
  private $component_class;

  public function __construct($root_folder, $session, $page_name, $component_id, $component_class)
  {
    $this->root_folder = $root_folder;
    $this->session = $session;
    $this->root_folder = $root_folder;
    $this->page_name = $page_name;
    $this->component_id = $component_id . "_" . static::class;
    $this->component_class = $component_class . "_" . static::class;
    $this->generate_styles();

    include $root_folder . "_/helpers/" . "read_json_file.php";
    $anchors_data = read_json_file($root_folder . "_/api/json_data", "application_routes.json");

    $this->html = '';
    foreach ($anchors_data["non_authenticated"] as $item)
    {
      $current_page_markup = '';

      if ($item[0] == $page_name)
      {
        $current_page_markup = "current_page_anchor";
      }
      else
      {
        $current_page_markup = "non_current_page_anchor";
      };

      $this->html .= '
               <li
               id="' . $this->component_id . "_" . "li" . "_" . $item[0] . '"
               class="' . $this->component_class . "_" . "li" . " " . $current_page_markup . '"
               >
            ';

      if (count($item) > 2)
      {
        $this->html .= '
                     <button
                     id="' . $this->component_id . "_" . "li" . "_" . "expand_button" . '"
                     class="' . $this->component_id . "_" . "li" . "_" . "expand_button" . '"
                     onclick="
                        let ' . $this->component_id . "_" . "li" . "_" . "subitems_container" . "_" . $item[0] . ' = document.getElementById(\'' . $this->component_id . "_" . "li" . "_" . "subitems_container" . "_" . $item[0] . '\');

                        if(
                           ' . $this->component_id . "_" . "li" . "_" . "subitems_container" . "_" . $item[0] . '.style.height === \'0px\'
                        )
                        {
                           ' . $this->component_id . "_" . "li" . "_" . "subitems_container" . "_" . $item[0] . '.style.height=\'auto\'
                        }
                        else
                        {
                           ' . $this->component_id . "_" . "li" . "_" . "subitems_container" . "_" . $item[0] . '.style.height=\'0px\'
                        }
                     "
                     >
                        ' . $item[1] . '
                     </button>
                  </li>
                  <div
                  id="' . $this->component_id . "_" . "li" . "_" . "subitems_container" . "_" . $item[0] . '"
                  class="' . $this->component_id . "_" . "li" . "_" . "subitems_container" . '"
                  style="height:0px"
                  >
                     ' . $this->generate_anchor_subitems($item[2], $item[0]) . '
                  </div>
               ';
      }
      else
      {
        $this->html .= '
                     <a
                     id="' . $this->component_id . "_" . 'li"
                     class="' . $this->component_class . "_" . "li" . "_" . "anchor" . '"
                     href="' . $this->root_folder . $item[0] . '"
                     >
                     ' . $item[1] . '
                     </a>
                  </li>
               ';
      };
    }
  }


  public function generate_anchor_subitems(array $subitems, string $base_path)
  {
    $markup = "";

    foreach ($subitems as $subitem)
    {
      $markup .= '
               <a
                  id="' . $this->component_id . "_" . "li" . "_" . "subitem" . "_" . $subitem[0] . '"
                  class="' . $this->component_class . "_" . "li" . "_" . "subitem" . '"
                  href="' . $this->root_folder . $base_path . "/" . $subitem[0] . '"
                  >
                  ' . $subitem[1] . '
               </a>
            ';
    };

    return $markup;
  }


  public function print_markup()
  {
    return $this->html;
  }


  public function print_styles()
  {
    return $this->styles;
  }

  private function generate_styles()
  {
    $this->styles = '
            .' . $this->component_class . "_" . "li" . '
            {
               display:flex;
               align-items:center;
               justify-content:flex-start;
               height:2.25rem;
               width:15rem;
            }

            .' . $this->component_class . "_" . "li" . "_" . "anchor" . '
            {
               height:100%;
               width:100%;
               display:flex;
               align-items:center;
               justify-content:flex-start;
               text-decoration:none;
               background:none;
               font-size:1rem;
               padding: 0 .75rem;
               font-family: f1bl;
            }

            .' . $this->component_id . "_" . "li" . "_" . "subitems_container" . '
            {
               overflow:hidden;
               height:0px
               margin:0;
               padding:0;
               display:flex;
               flex-direction:column;
            }

            .current_page_anchor
            {
               background:var(--c3);
               color:var(--c10);
            }

            .non_current_page_anchor
            {
            }
         ';
  }
}
?>
