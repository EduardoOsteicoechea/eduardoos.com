<?php
   class floating_controls_001 extends base_component
   {
      public function __construct
      (
         string $root_folder, 
         string $component_folder, 
         string $page_title,
         string $page_name,
         string $page_description,
         string $parent_component_id = "",
         string $parent_component_class = "",
         array | null $external_elements_ids = null,
         string $color_mode = "",
         array | null $session = null,
         array | null $get = null,
         array | null $post = null,
         array | null $files = null,
         $content_data,
      )
      { 
         parent::__construct
         (
            $root_folder, 
            $component_folder, 
            $page_title,
            $page_name,
            $page_description,
            $parent_component_id,
            $parent_component_class,
            $external_elements_ids,
            $color_mode,
            $session,
            $get,
            $post,
            $files,
         );

         $this->content_data = $content_data;
         $this->generate_component_markup_and_styles();
      }

      protected function generate_article_control_points(): string
      {
         $markup = "";
         
         if(isset($this->content_data["article"]))
         {  
            $markup .= '
               <div
               class="floating_controls_items_container"
               >
            ';

            $button_styles_markup = '
               display:flex;
               align-items:center;
               justify-content:center;
               background:var(--c3);
               color:var(--c2);
               width: var(--square_arrow_button_dimension);
               height: var(--square_arrow_button_dimension);
               font-size:inherit;
            ';

            if(is_array($this->content_data["article"][0]) === false)
            { 
               for ($i=0; $i < count($this->content_data["article"]); $i++) 
               {
                  $subcomponent_id = $this->content_data["article"][$i]."_button";
                  $article_idea_id = $this->content_data["article"][$i];
                  
                  if($i > 0)
                  {
                     $button_styles_markup .= 'margin-top:7px;';
                  };

                  $markup .= $this->add_subcomponent(
                     "button",$subcomponent_id,"",[
                     ["",$button_styles_markup]],[($i+1)],[],[
                        'onclick="
                           const element = document.getElementById(\''.$article_idea_id.'\');
                           element.scrollIntoView();
                        "'
                     ]
                  );
               };
            }
            else
            {
               for ($i=0; $i < count($this->content_data["article"]); $i++) 
               { 
                  $subcomponent_id = $this->content_data["article"][0][1]."_button";
                  $article_idea_id = $this->content_data["article"][0][1];
                  
                  if($i > 0)
                  {
                     $button_styles_markup .= 'margin-top:7px;';
                  };

                  $markup .= $this->add_subcomponent(
                     "button",$subcomponent_id,"",[
                     ["",$button_styles_markup]],[($i+1)],[],[
                        'onclick="
                           const element = document.getElementById(\''.$article_idea_id.'\');
                           element.scrollIntoView();
                        "'
                     ]
                  );
               };
            }; 

            $markup .= '
               </div>
            ';           
         };         

         return $markup;
      }

      // box-shadow: .5rem .5rem .5rem rgba(0,0,0,.15);
      protected function generate_component_markup_and_styles()
      {
         $articles_control_points = $this->generate_article_control_points();

         $this->add_component("div","floating_controls",[["","
            grid-column: 8;
            top:3px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            height:fit-content;
            padding:0rem 0rem;
            z-index:0;
            border-radius:.2rem;
            background:var(--c1);
            color:var(--c1);
            transition: none;
            font-size:.6rem;
         "],
         ["@media only screen and (max-width: 950px)", "
            position:fixed;
            top:65px;
            right:var(--common_margin_mobile);
            
         "],
      ],[
            $this->add_subcomponent("button","scroll_to_top_button","floating_controls",[
            ["","
               background:var(--c3);
                  width: var(--square_arrow_button_dimension);
                  height: var(--square_arrow_button_dimension);
               font-size:inherit;
            "]],[
               '<div class="vertical_arrow_bar top_arrow_left_bar"></div>',
               '<div class="vertical_arrow_bar top_arrow_right_bar"></div>',
            ],[],[
               'onclick="window.scroll({
                  top: 0,
                  left: 0,
                  behavior: \'smooth\'
                  });
               "',
            ]),
            $articles_control_points,
            $this->add_subcomponent("button","scroll_to_top_button","floating_controls",[
               ["","
                  background:var(--c3);
                  width: var(--square_arrow_button_dimension);
                  height: var(--square_arrow_button_dimension);
                  font-size:inherit;
               "]],[
                  '<div class="vertical_arrow_bar down_arrow_left_bar"></div>',
                  '<div class="vertical_arrow_bar down_arrow_right_bar"></div>',
               ],[],[
                  'onclick="
                  window.scroll({
                     top: 100000,
                     left: 0,
                     behavior: \'smooth\'
                  });
                  "',
               ])
         ],[],[],[""]);
      }
   }
?>