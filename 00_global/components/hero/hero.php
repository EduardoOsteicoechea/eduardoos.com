<?php
    function print_hero($root_folder) 
    {        
        $component =  '
        <div id="hero">
            <div id="hero_information_container">
                <h1 id="hero_title">Eduardo<br>Osteicoechea</h1>
                <p id="hero_paragraph">
                I\'m an Bilingual Architect, BIM modeler, Revit API - .Net Developer, Web Full Stack Developer & Renderer, with strong skills in Graphic Design, Teaching, Leadership and Artificial Intelligence use.<!-- I learn easily (especially software and technology) and enjoy teaching others.-->
                </p>
                <nav id="hero_information_container_nav">
                    <a href="#vision">Vision</a>
                    <a href="#habilities">Habilities</a>
                    <a href="#focus">Focus</a>
                    <a href="#aknowledgements">Aknowledgements</a>
                    <a href="#portfolio">Portfolio</a>
                    <a href="#experience">Experience</a>
                    <a href="#contact">Let\'s Talk</a>
                </nav>
            </div>
            <img src="'.$root_folder.'00_global/media/image/brand/personal_photo_425x550_lighted_and_trimmed.png" alt="Eduardo Osteicoechea foto" height="550px">
            <div class="bottom_border"></div>
        </div>
        ';

        return $component;
    };
?>