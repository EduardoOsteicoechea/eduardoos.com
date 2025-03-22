// called from "./main_001.php";

import sidebar_actions from "./sidebar.js";
import main_actions from "./main.js";
import floating_controls_actions from "./floating_controls.js";
import aside_actions from "./aside.js";

export default class 
{
   constructor
      (
         root_folder,
         component_folder,
         page_title,
         page_name,
         page_description,
         external_elements_ids,
      ) 
   {
      // console.log("From main_content_001.js");
      
      const sidebar = document.getElementById(external_elements_ids[0]);
      const main = document.getElementById(external_elements_ids[1]);
      const floating_controls = document.getElementById(external_elements_ids[2]);
      const aside = document.getElementById(external_elements_ids[3]);

      // console.log(sidebar);
      // console.log(main);
      // console.log(floating_controls);
      // console.log(aside);

      sidebar_actions();
      main_actions();
      floating_controls_actions();
      aside_actions();
   }
}