<?php 
    include 'header.php';
    function print_content($root_folder)
    {
        $component = 
        '
        </head>
        <body>
            '.print_header($root_folder).'
            
            

            <main id="main">
            
            <div id="vertical_navigation_buttons">
                <div id="move_to_top">
                    <img src="'.$root_folder.'00_global/media/image/arrow.svg" height="25px">
                </div>
                <div id="move_to_bottom">
                    <img src="'.$root_folder.'00_global/media/image/arrow.svg" height="25px">
                </div>
            </div>
        '; 
        return $component;
    };
?>