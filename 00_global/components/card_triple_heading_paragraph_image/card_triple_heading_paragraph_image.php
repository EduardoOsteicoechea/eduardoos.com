<?php
    function print_card_triple_heading_paragraph_image($root_folder,$h1,$p1,$i1,$a1,$h2,$p2,$i2,$a2,$h3,$p3,$i3,$a3) 
    {        
        $component =  '
        <div id="card_triple_heading_paragraph_image">
            <a href="'.$a1.'" target="_blank">
                <h3>'.$h1.'</h3>
                <p>'.$p1.'</p>
                '.$i1.'
                <div class="bottom_border"></div>
            </a>
            <a href="'.$a2.'" target="_blank">
                <h3>'.$h2.'</h3>
                <p>'.$p2.'</p>
                '.$i2.'
                <div class="bottom_border"></div>
            </a>
            <a href="'.$a3.'" target="_blank">
                <h3>'.$h3.'</h3>
                <p>'.$p3.'</p>
                '.$i3.'
                <div class="bottom_border"></div>
            </a>
        </div>
        ';

        return $component;
    };
?>