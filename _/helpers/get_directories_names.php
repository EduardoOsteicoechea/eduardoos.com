<?php
   function get_directories_names($parent_directory)
   {
      $directories = [];

      if (is_dir($parent_directory))
      {
         $handle = opendir($parent_directory);
         if ($handle)
         {
            while (($file = readdir($handle)) !== false)
            {
               if ($file != "." && $file != "..")
               {
                  $path = $parent_directory . "/" . $file;
                  if (is_dir($path))
                  {
                     $directories[] = $file;
                  };
               };
            };
            closedir($handle);
         };
      };
      return $directories;
   }
?>