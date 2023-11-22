<?php
    function print_card_couple_paragraph_image($root_folder,$p1,$i1,$p2,$i2) 
    {        
        $component =  '
        <div id="print_card_couple_paragraph_image">
            <div>
                <p>'.$p1.'</p>
                <img src="assets/'.$i1.'" alt="Aknowledgement Image">
                <div class="bottom_border"></div>
            </div>
            <div>
                <p>'.$p2.'</p>
                <img src="assets/'.$i2.'" alt="Aknowledgement Image">
                <div class="bottom_border"></div>
            </div>
        </div>
        ';

        return $component;
    };
?>