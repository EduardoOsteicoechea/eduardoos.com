<?php
    include "data/sanitaze_input.php";
    
    include "components/section_separator_heading/section_separator_heading.php";
    include "components/print_json/print_json.php";

    include "layout/page_start.php";
    include "layout/page_end.php";
    include "layout/content.php";

    $styles_folder = $root_folder . "00_global/css/";
    $components_folder = $root_folder . "00_global/components/";
    
    $local_host="localhost/eduardoos.com/";
    $web_address="https://eduardoos.com/";
    $environment = $web_address;

    function handle_error($path,$error_message)
    {
        $_GET['error_message'] = $error_message;
        header("Location: " . $path . "?error_message=". $_GET['error_message']);
        exit;
    };

    function insert_without_fetchAll($connection, $sql)
    {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
    }

    function query_and_return_fetchAll($connection, $sql)
    {
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>