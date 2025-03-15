<?php
function provide_global_styles($root_folder)
{
   return '
         @font-face{ font-family:  f1t    ; src: url(	' . $root_folder . '_/fonts/Raleway-Thin.ttf             ); }
         @font-face{ font-family:  f1ti   ; src: url(	' . $root_folder . '_/fonts/Raleway-ThinItalic.ttf       ); }
         @font-face{ font-family:  f1el   ; src: url(	' . $root_folder . '_/fonts/Raleway-ExtraLight.ttf       ); }
         @font-face{ font-family:  f1eli  ; src: url(	' . $root_folder . '_/fonts/Raleway-ExtraLightItalic.ttf ); }
         @font-face{ font-family:  f1l    ; src: url(	' . $root_folder . '_/fonts/Raleway-Light.ttf            ); }
         @font-face{ font-family:  f1li   ; src: url(	' . $root_folder . '_/fonts/Raleway-LightItalic.ttf      ); }
         @font-face{ font-family:  f1m    ; src: url(	' . $root_folder . '_/fonts/Raleway-Medium.ttf           ); }
         @font-face{ font-family:  f1mi   ; src: url(	' . $root_folder . '_/fonts/Raleway-MediumItalic.ttf     ); }
         @font-face{ font-family:  f1r    ; src: url(	' . $root_folder . '_/fonts/Raleway-Regular.ttf          ); }
         @font-face{ font-family:  f1ri   ; src: url(	' . $root_folder . '_/fonts/Raleway-RegularItalic.ttf    ); }
         @font-face{ font-family:  f1sb   ; src: url(	' . $root_folder . '_/fonts/Raleway-SemiBold.ttf         ); }
         @font-face{ font-family:  f1sbi  ; src: url(	' . $root_folder . '_/fonts/Raleway-SemiBoldItalic.ttf   ); }
         @font-face{ font-family:  f1b    ; src: url(	' . $root_folder . '_/fonts/Raleway-Bold.ttf             ); }
         @font-face{ font-family:  f1bi   ; src: url(	' . $root_folder . '_/fonts/Raleway-BoldItalic.ttf       ); }
         @font-face{ font-family:  f1eb   ; src: url(	' . $root_folder . '_/fonts/Raleway-ExtraBold.ttf        ); }
         @font-face{ font-family:  f1ebi  ; src: url(	' . $root_folder . '_/fonts/Raleway-ExtraBoldItalic.ttf  ); }
         @font-face{ font-family:  f1bl   ; src: url(	' . $root_folder . '_/fonts/Raleway-Black.ttf            ); }
         @font-face{ font-family:  f1bli  ; src: url(	' . $root_folder . '_/fonts/Raleway-BlackItalic.ttf      ); }

         :root {
            font-size: 16px;
            letter-spacing:0;
            line-height: 1.25rem;
            font-family: f1r, system-ui;
            scroll-behavior: smooth;
            --b1: solid .1rem red;
            --b2: solid .1rem rgb(0, 0, 0);
            --shadow_1: 1rem 1rem 1rem rgba(255,255,255,.25);
            --sh1: 1rem 1rem 1rem rgba(255,255,255,.25);
            --sh2: .0rem .0rem 1rem rgba(0,0,0, 0.15);
            --sh3: .15rem .15rem 1rem rgba(0,0,0, 0.1);
            --sh4: .25rem .25rem .25rem rgba(0,0,0, 0.5);
            --sh5: .25rem .25rem .5rem rgba(0,0,0, 0.25);
            --tr1: all ease 1000ms;
            --tr2: all ease 200ms;
            --header_height: 4rem;
            --header_item_height: 2.25rem;
            --header_item_padding: 0rem 1.25rem;
            --margin_common: 1.25rem;
            --main_content_sidebar_width: 33rem;
            --main_content_aside_width: 33rem;
            --right_side_small_control: 2.5rem;

            --c1:#fff;
            --c2:#000;
            --c3:#f0f0f0;
            --c4:#fafafa;
            --c5: rgb(255, 255, 255);
            --c6: rgb(226, 226, 226);
            --c7: rgb(119, 119, 119);
            --c8: #f8f8f8;
            --c9: #cdcdcd;
            --c10: rgb(194, 194, 194);
            --c11:rgb(0, 255, 128);
            --c_whatsapp: #25D366;

            --success_1:rgb(0, 200, 73);
            --success_1_dark:rgb(0, 185, 68);
            --button_1:rgb(0, 110, 255);
            --inactive_1:rgb(215, 215, 215);
            --disabled_1:rgb(230, 230, 230);
            --failure_1:rgb(230, 43, 80);
         }

         * 
         {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border:none;
            position: relative;
            transition: var(--tr1);
            color: var(--c2);
            font-family: var(--f1l);
         }
         
         button 
         {
            font-weight: 900;
            background: var(--c2);
            color: var(--c1);
            border:none;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            border-radius:.2rem !important;
         }
            
         a,b,p { font-size: .9rem;}
         a { cursor: pointer; text-decoration:none; }
         p {  }
         b { font-family:f1bl; }
         h1{
            font-family: f1b; 
            font-size: 3rem;
            line-height: 3rem;
         }
         h2{
            font-family: f1b; 
            font-size: 1.5rem;
            line-height: 2rem;
         }
         h3{
            font-family: f1b; 
            font-size: 1rem;
            line-height: 1.5rem;
         }
         h4{font-family: f1b; font-size: 1rem;}

         body
         {
            max-width:1920px;
            display:flex;
            flex-direction:column;
            align-items:center;
            width:100%;
            overflow-x: hidden;
            overflow-y: auto;
            transition: none;
            margin: 0 auto;
         } 
         
         .header_button_bar
         {
            height:.1rem;
            width:40%;
            background:var(--c1);
            border-radius:2rem;
         }
         
         .biblical_passage
         {
            font-family:f1b;
         }         
         .biblical_reference_small
         {
            display:block;
            font-size:.75rem;
            font-family:f1b;
            color:var(--c7);
         }



                  
         .article_abstract
         {
            background: var(--c3);
            padding:1rem;
            margin:2rem 0 2.5rem 0;
         }
         .article_abstract > *
         {
            font-size:.75rem !important;
         }
         .article_main_heading
         {
            margin-top:1.75rem;
         }
         .articles_links_container
         {
            display:flex;
            flex-direction:column;
            gap:1.35rem;
            width:100%;
            transition: none;
            padding: 0 0 1.25rem 0;
         }         
         .article_card
         {
            display:flex;
            flex-direction:column;
            gap:.5rem;
            width:100%;
            transition: none;
            padding: 1.25rem 1rem;
            box-shadow: .5rem .5rem .5rem rgba(0,0,0,.15);
         }         
         .article_card_heading
         {
            margin-bottom:.5rem;
         }         
         .article_card_abstract
         {
            background: var(--c3);
            padding:1rem;
            font-size:.8rem !important;
            margin:0rem 0 .75rem 0;
         }         
         .article_card_author
         {
            font-size:.75rem;
            line-height:.75rem;
         }         
         .article_card_date
         {
            font-size:.75rem;
            color:var(--c7)
         }         
         .article_idea
         {
            display:flex;
            flex-direction:column;
            gap:1.15rem;
            width:100%;
            transition: none;
            padding: 0 0 1.25rem 0;
         }


         .vertical_arrow_bar
         {
            width:.15rem;
            height:50%;
            background:var(--c2);
            border-radius:1rem;
         }
         .horizontal_arrow_bar
         {
            width:25%;
            height:.1rem;
            background:var(--c2);
            border-radius:1rem;
         }
         .top_arrow_top_bar
         {
            transform: rotate(135deg);
            left:2%;
            top:10%
         }
         .top_arrow_bottom_bar
         {
            transform: rotate(-135deg);
            left:2%;
            top:-10%;
         }
         .top_arrow_left_bar
         {
            transform: rotate(45deg);
            left:-7%;
         }
         .top_arrow_right_bar
         {
            transform: rotate(-45deg);
            left:7%;
         }
         .down_arrow_left_bar
         {
            transform: rotate(135deg);
            left:-7%;
         }
         .down_arrow_right_bar
         {
            transform: rotate(-135deg);
            left:7%;
         }


         .location_tracker_outer_container
         {
            display:flex;
            flex-direction: row;
            flex-wrap: wrap;
            column-gap:.5rem;
            row-gap:.5rem;
            width:100%;
         }
         .location_tracker_outer_container_item
         {
            display:flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap:1rem;
            width:100%;
         }
         .location_tracker_outer_container_arrow_container
         {
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            background:var(--c3);
            width: 1.25rem;
            height: 1.25rem;
            font-size:inherit;
         }
         .location_tracker_outer_container_anchor
         {
            display:flex;
            align-items:center;
            justify-content:center;
            color:var(--c7);
            font-size:.65rem;
            padding:0 .5rem;
            height: 1.25rem;
            background:var(--c3) !important;
         }

         @media only screen and (max-width: 950px) and (min-width: 451px) {}
         
         @media only screen and (max-width: 450px) {}

         @media only screen and (max-width: 350px) {  
            body
            {
               display:block;
               width:345px;
            }
         }
      ';
}
