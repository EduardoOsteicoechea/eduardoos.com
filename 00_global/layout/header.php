<?php
    function print_header($root_folder) 
    {       
        $links = '
            <a href="'.$root_folder.'home">Profile</a>
            <a href="'.$root_folder.'certifications">Certifications</a>
            <a href="'.$root_folder.'cover_letter">Cover Letter</a>
            <a href="#contact">Contact</a>
        '; 
        $component =  '
            <div id="header">
                <a href="'.$root_folder.'home">
                    <!--<img src="'.$root_folder.'00_global/media/image/brand/favicon.svg" alt="Eduardo Osteicoechea foto" height="40px">      -->
                    <h3 id="section_1_title">eduardoos.com</h3>
                </a>
                <div id="header_menu_button">
                    <div></div>
                    <div></div>
                </div>
                <nav id="header_nav">'.$links.'</nav>
                <div class="bottom_border"></div>
            </div>
            <nav id="header_mobile_menu" class="hide_mobile_menu">'.$links.'</nav>
        ';

        return $component;
    };
?>