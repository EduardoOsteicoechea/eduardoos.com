// called from "./_.php";

export default class 
{
   constructor 
   (
      root_folder,
      page_name,
      component_id,
      component_class_name,
      outer_container_id,
      menu_outer_container_id,
   ) 
   {
      let outer_container = document.getElementById(outer_container_id);
      let outer_container_button = outer_container.children[1];
      
      let menu_outer_container = document.getElementById(menu_outer_container_id);
      let menu_outer_container_checkbox = menu_outer_container.children[0];

      console.log(outer_container);
      console.log(outer_container_button);
      console.log(menu_outer_container);
      console.log(menu_outer_container_checkbox);

      outer_container_button.onpointerup = ()=>{
         if(menu_outer_container.classList.contains("opened_menu"))
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