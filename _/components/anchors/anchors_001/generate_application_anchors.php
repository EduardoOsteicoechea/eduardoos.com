<?php
   function generate_application_anchors($root_folder, $session, $page_name)
   {
      include $root_folder . "_/helpers/" . "read_json_file.php";

      $anchors_data = read_json_file($root_folder . "_/api/json_data", "application_routes.json");

      $html = '';
      foreach ($anchors_data["non_authenticated"] as $item) 
      {
         $current_page_markup = '';

         if($item == $page_name)
         {

            $current_page_markup = "current_page";
         };

         $html .= '
            <li>
               <a
               id=""
               class="'.$current_page_markup.'"
               href="'. $root_folder. $item[0] .'"
               >
               '. $item[1] .'
               </a>
            </li>
         ';
      }
      return $html;
   }
?>