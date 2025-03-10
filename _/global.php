<?php
   include "layout/public_page.php";
   include "components/base_component.php";
   include "layout/page_content.php";
   include "components/main/main_001/main_001.php";

   function redirect_if_variable_is_populated(string $root_folder, array $variable)
   {
      if (count($variable) > 0) {
         if (isset($_SERVER['HTTP_REFERER'])) {
             header("Location: " . $_SERVER['HTTP_REFERER']);
             exit;
         } else {
             header("Location: " . $root_folder . "inicio");
             exit;
         };
     };
   };

   function start_session()
   {
      session_set_cookie_params([
         'lifetime' => 0,
         'path' => '/', 
         'domain' => $_SERVER['HTTP_HOST'],
         'secure' => true,
         'httponly' => true,
         'samesite' => 'Strict'
      ]);

      session_start();
   };

   function end_session()
   {
      $_SESSION = array();

      if (ini_get("session.use_cookies")) 
      {
         $cookie_params = session_get_cookie_params();
         
         setcookie(
            session_name(), 
            '', 
            time() - 42000,
            $cookie_params["path"], 
            $cookie_params["domain"],
            $cookie_params["secure"], 
            $cookie_params["httponly"]
         );
      };
      
      session_destroy();
      header("Location: https://eduardoos.com");
      exit;
   };
?>
