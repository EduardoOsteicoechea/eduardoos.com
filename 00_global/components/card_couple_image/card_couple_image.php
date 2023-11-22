<?php
    function print_card_couple_image($root_folder,$i1,$i2) 
    {        
        $component =  '
        <div id="card_couple_image">
            <div>
                <img src="assets/'.$i1.'" alt="Architecture or Interior Design Image">
                <div class="bottom_border"></div>
            </div>
            <div>
                <img src="assets/'.$i2.'" alt="Architecture or Interior Design Image">
                <div class="bottom_border"></div>
            </div>
        </div>
        ';

        return $component;
    };
?>

















