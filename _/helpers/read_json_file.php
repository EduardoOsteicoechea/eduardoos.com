<?php
function read_json_file($directory, $filename)
{
   $filepath = $directory . "/" . $filename;

   if (file_exists($filepath))
   {
      $contents = file_get_contents($filepath);
      return json_decode($contents, true);
   };
}
?>