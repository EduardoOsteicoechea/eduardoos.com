<?php
   function anchors_001($root_folder, $session, $page_name)
   {
      include "generate_application_anchors.php";

      $html = '';
      $html .= '
         <nav>
            <ul>
               '.generate_application_anchors($root_folder, $session, $page_name).'
            </ul>
         </nav>
      ';
      echo $html;
   }
?>