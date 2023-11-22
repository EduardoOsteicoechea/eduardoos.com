<?php
    function print_card_triple_final_double_image($root_folder,$i1,$i2,$i3,$i4) 
    {        
        $component =  '
        <div id="card_triple_final_double_image">
            <div>
                <img src="assets/'.$i1.'" alt="design Image">
                <div class="bottom_border"></div>
            </div>
            <div class="small_couple_image">
                <div>
                    <img src="assets/'.$i3.'" alt="design Image">
                    <div class="bottom_border"></div>
                </div>
                <div>
                    <img src="assets/'.$i4.'" alt="design Image">
                    <div class="bottom_border"></div>
                </div>
            </div>
            <div>
                <img src="assets/'.$i2.'" alt="design Image">
                <div class="bottom_border"></div>
            </div>
        </div>
        ';

        return $component;
    };
?>

















