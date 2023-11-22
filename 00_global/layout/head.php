<?php
    function print_head_tipical_tags($root_folder)
    {
        $component = 
        '
        <meta charset="UTF-8">
        <meta name="keywords" content="Enterpryse, Management, Professional">
        <meta name="theme-color" content="#4d4d4d">
        <meta name="description" content="Eduardo Osteicoechea\'s Professional Profile Website">
        <meta name="author" content="Eduardo Osteicoechea">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 
        <link rel="icon" type="image/x-icon" href="'.$root_folder.'00_global/media/image/brand/favicon.svg">
        <link rel="stylesheet" href="'.$root_folder.'00_global/css/global.css">
        <link rel="stylesheet" href="'.$root_folder.'00_global/css/header.css">
        <link rel="stylesheet" href="'.$root_folder.'00_global/css/hero.css">
        <link rel="stylesheet" href="'.$root_folder.'00_global/css/section_separator_heading.css">
        <link rel="stylesheet" href="'.$root_folder.'00_global/css/article.css">
        
        <link rel="stylesheet" href="'.$root_folder.'00_global/css/footer.css">
        <script defer src="'.$root_folder.'00_global/js/header.js"></script> 

        ';
        return $component;
    };
?>