<?php
    function print_section_separator_heading($root_folder,$i,$t,$h) 
    {        
        $component =  '
        <div id="'.$i.'" class= "section_separator_heading">
            <'.$t.'>'.$h.'</'.$t.'>
        </div>
        ';
        return $component;
    };
?>

















