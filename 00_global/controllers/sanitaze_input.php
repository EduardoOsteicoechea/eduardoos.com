<?php
    function sanitaze_string($data)
    {   
        $sanitazed_data = "";

        if ( filter_var($data , FILTER_SANITIZE_STRING) != false || filter_var($data , FILTER_SANITIZE_STRING) != null )
        {
            $sanitazed_data = $data;
            return $sanitazed_data;
        }
        else 
        {
            return false;
        }
    }

    function sanitaze_number($data)
    {   
        $sanitazed_data = "";
        $characters_of_data = str_split($data);
        $numbers = array("+","0","1","2","3","4","5","6","7","8","9",".");
        
        for($x = 0; $x < count($characters_of_data) ; $x++)
        {
            if 
            ( 
                in_array($characters_of_data[$x],$numbers)
            )
            {
                $sanitazed_data .= $characters_of_data[$x];
            }
        };
        if (count($characters_of_data) == count(str_split($sanitazed_data)))
        {
            return $sanitazed_data;
        }
        else 
        {
            return false;
        }
    }

    function sanitaze_email($data)
    {   
        $sanitazed_data = "";

        if 
        ( 
            (
            filter_var($data , FILTER_SANITIZE_EMAIL) != false || 
            filter_var($data , FILTER_SANITIZE_EMAIL) != null 
            )
            &&
            filter_var($data , FILTER_VALIDATE_EMAIL)
        )
        {
            $sanitazed_data = $data;
            return $sanitazed_data;
        }
        else 
        {
            return false;
        }
    }
?>