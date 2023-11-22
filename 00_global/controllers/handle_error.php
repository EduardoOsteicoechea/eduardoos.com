<?php
    function handle_error()
    {
        unset($GET["error_message"]);
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?error_message=error");
        exit;
    };
?>