<?php
    function input_is_correct($i)
    {
        for($x = 0; $x < count($i); $x++)
        {
            if($i[$x] != true || $i[$x] == null || $i[$x] == "")
            {
                return false;
            }
        };
        return true;
    };
?>