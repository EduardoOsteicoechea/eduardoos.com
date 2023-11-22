<?php 
    function print_json($root_folder,$path,$file_name){
        $json = file_get_contents
        (
            $root_folder. "00_json/" . $path, 
            $file_name
        );
        
        $decoded_json = json_decode($json, true);

        $article = '<div class="article">';

        foreach($decoded_json as $a => $b)
        {
            $article .= "<h2>".ucfirst($a)."</h2>";
            $article .= "<p>".ucfirst($b)."</p>";
        };

        $article .= '</div>';

        return $article;
    };
?>