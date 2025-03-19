// called from "./hero_002.php";

export default class 
{
   header_height = 16 * 4;
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
      let outer_container_background_image_container = outer_container.children[0];
      let outer_container_background_image_container_image = outer_container_background_image_container.children[0];

      if (window.innerWidth < 950)
         {
            let image_path = root_folder + "_/media/fotoPersonal1080x1920.jpg";
            if (outer_container_background_image_container_image.src !== image_path) 
            {
               outer_container_background_image_container_image.src = image_path;
            };
         }
         else
         {
            let image_path = root_folder + "_/media/fotoPersonal3840x2160.jpg";
            if (outer_container_background_image_container_image.src !== image_path) 
            {
               outer_container_background_image_container_image.src = image_path;
            };
         };

      // window.addEventListener("resize", () => this.change_background_image_if_required(root_folder, outer_container_background_image_container_image, outer_container_background_image_container));
      // window.addEventListener("load", () => this.change_background_image_if_required(root_folder, outer_container_background_image_container_image, outer_container_background_image_container));
   }

   change_background_image_if_required(root_folder, image_element, image_container_element)
   {
      console.log("Run event")
      if (window.innerWidth < 950)
      {
         let image_path = root_folder + "_/media/fotoPersonal1080x1920.jpg";
         // let ideal_image_width_pixel_number = window.innerWidth;
         // let proportional_image_height_pixel_number = (window.innerWidth * 1.7) ;
         // image_container_element.style.right = "0";
         if (image_element.src !== image_path) 
         {
            image_element.src = image_path;
            // if((proportional_image_height_pixel_number - (this.header_height)) > (window.innerHeight - (this.header_height)))
            // {
            //    image_element.style.width = ideal_image_width_pixel_number + "px";
            //    image_element.style.height = proportional_image_height_pixel_number  + "px";
            // };
         };
      }
      else
      {
         let image_path = root_folder + "_/media/fotoPersonal3840x2160.jpg";
         // let proportional_image_height_pixel_number = window.innerHeight - this.header_height;
         // let ideal_image_width_pixel_number = window.innerHeight * 1.6;
         // image_container_element.style.right = "0";
         if (image_element.src !== image_path) 
         {
            image_element.src = image_path;
            // image_element.style.width = ideal_image_width_pixel_number + "px";
            // image_element.style.height = proportional_image_height_pixel_number + "px";
            // image_container_element.style.right = "0";
               // if(window.innerWidth < 950)
               // {
               //    image_container_element.style.right = "-10rem";
               // };
         };
      };
   }
}