<?php
    function print_card_triple_heading_paragraph($root_folder,$h1,$p1,$h2,$p2,$h3,$p3) 
    {        
        $component =  '
        <div id="card_triple_heading_paragraph">
            <div>
                <h3>'.$h1.'</h3>
                <p>
                '.$p1.'
                </p>
                <div class="bottom_border"></div>
            </div>
            <div>
                <h3>'.$h2.'</h3>
                <p>'.$p2.'</p>
                <div class="bottom_border"></div>
            </div>
            <div>
                <h3>'.$h3.'</h3>
                <p>'.$p3.'
                </p>
                <div class="bottom_border"></div>
            </div>
        </div>
        ';

        return $component;
    };
?>