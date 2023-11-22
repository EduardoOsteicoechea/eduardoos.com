<?php 
    include 'head.php';
    function print_page_start($root_folder, $title)
    {
        $component = 
        '
        <!DOCTYPE html>
        <html lang="es">
            <head id="head">
                '.print_head_tipical_tags( $root_folder ).'
                <title>'.$title.'</title>
        '; 
        return $component;
    };
?>