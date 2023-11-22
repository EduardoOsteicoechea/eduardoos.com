<?php
    function send_email($email,$subject,$message)
    {    
        $headers = array
        (
            'From' => 'eduardoosteicoechea.com@gmail.com',
            'Reply-To' => 'eduardoosteicoechea.com@gmail.com',
            'MIME-Version' => '1.0',
            'Content-type' => 'text/html; charset=iso-8859-1'
        );       
        mail($email, $subject, $message, $headers);
    };
?>