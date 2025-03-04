<?php 
   class page_head
   {
      public function __construct
      (
         string $root_folder, 
         array | null $session, 
         string $page_title, 
         string $page_description, 
         array $page_styles
      )
      {
         include "global_styles.php";

         $html = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
               <title>'.$page_title.'</title>
               <style>'. global_styles() . implode(" ", $page_styles) .'</style>
               <meta description="'.$page_description.'">
            </head>
            <body>
         ';
         echo $html;
      }
   }
?>