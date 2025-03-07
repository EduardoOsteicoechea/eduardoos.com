// called from "./header_002.php";

export default class 
{
   constructor
      (
         root_folder,
         component_folder,
         page_title,
         page_name,
         page_description,
         parent_component_id,
         parent_component_class,
         component_class,
         component_id,
         color_mode,
         external_elements_ids,
         session,
      ) 
   {
      let outer_container = document.getElementById(external_elements_ids[0]);
      let outer_container_button = outer_container.children[1];

      let menu_outer_container = document.getElementById(external_elements_ids[1]);

      outer_container_button.onpointerup = () =>
      {
         if (menu_outer_container.classList.contains("opened_menu"))
         {
            menu_outer_container.classList.remove("opened_menu");
            menu_outer_container.classList.add("closed_menu");
         }
         else
         {
            menu_outer_container.classList.remove("closed_menu");
            menu_outer_container.classList.add("opened_menu");
         };
      };
   }
}