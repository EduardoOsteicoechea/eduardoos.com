<?php
function get_directory_json_files_names($directory)
{
   $jsonFiles = [];

   if (is_dir($directory))
   {
      $handle = opendir($directory);
      if ($handle)
      {
         while (($file = readdir($handle)) !== false)
         {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'json')
            {
               $jsonFiles[] = $file;
            };
         };
         closedir($handle);
      };
   };
   return $jsonFiles;
}