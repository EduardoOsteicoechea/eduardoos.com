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
            if(is_array($this->content_data["article"][0]) === false)
            {
               for ($i=0; $i < count($this->content_data["article"]); $i++) 
               { 
                  $subcomponent_id = $this->content_data["article"][$i]."_button";
                  $article_idea_id = $this->content_data["article"][$i];

                  $markup .= $this->add_subcomponent(
                     "button",$subcomponent_id,"",[
                     ["","
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        background:var(--c3);
                        color:var(--c2);
                        width: 1.5rem;
                        height: 1.5rem;
                        font-size:inherit;
                     "]],[($i+1)],[],[
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

                  $markup .= $this->add_subcomponent(
                     "button",$subcomponent_id,"",[
                     ["","
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        background:var(--c3);
                        color:var(--c2);
                        width: 1.5rem;
                        height: 1.5rem;
                        font-size:inherit;
                     "]],[($i+1)],[],[
                        'onclick="
                           const element = document.getElementById(\''.$article_idea_id.'\');
                           element.scrollIntoView();
                        "'
                     ]
                  );
               };
            };            
         };         

         return $markup;
      }

      // box-shadow: .5rem .5rem .5rem rgba(0,0,0,.15);
      protected function generate_component_markup_and_styles()
      {
         $articles_control_points = $this->generate_article_control_points();

         $this->add_component("div","floating_controls",[["","
            position: sticky;
            top: 1.25rem;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            gap:.5rem;
            height:fit-content;
            padding:0rem 0rem;
            overflow-y:auto;
            overflow-x:hidden;
            z-index:0;
            border-radius:.2rem;
            background:var(--c1);
            color:var(--c1);
            transition: none;
            font-size:.6rem;
         "],
         ["@media only screen and (max-width: 950px)", "
            grid-column:4;
         "],
      ],[
            $this->add_subcomponent("button","scroll_to_top_button","floating_controls",[
            ["","
               background:var(--c3);
               width: 1.5rem;
               height: 1.5rem;
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
                  width: 1.5rem;
                  height: 1.5rem;
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