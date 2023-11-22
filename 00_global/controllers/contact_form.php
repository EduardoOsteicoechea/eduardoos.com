<?php
    include "controllers.php";

    $name = htmlspecialchars(sanitaze_string($_POST["first_name"]));
    $last_name = htmlspecialchars(sanitaze_string($_POST["last_name"]));
    $email = htmlspecialchars(sanitaze_string($_POST["email"]));
    $message = htmlspecialchars(sanitaze_string($_POST["message"]));

    if(input_is_correct([$name, $last_name, $email, $message]))
    {
        $sql = "

        INSERT INTO contact_form_message
        (
            first_name,
            last_name,
            email,
            message
        ) 
        VALUES 
        (
            '".$name."',
            '".$last_name."',
            '".$email."',
            '".$message."'
        )
        ";
        
        insert_without_fetchAll($connection, $sql);

        $email_message_for_user = '
            Thanks for writting '.$name.'! I\'ll contact you as soon as possible.
        ';
        send_email($email,$email_message_for_user,$email_message_for_user);

        $connection = null;

        header("Location: " . $_SERVER['HTTP_REFERER'] . "?success_message=success");
        exit;   
    }
    else
    {
        $connection = null;
        handle_error();
    };

?>