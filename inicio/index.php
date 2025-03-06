<?php
   $root_folder = "../";
   include $root_folder . "_/global.php";
   include $root_folder . "_/components/hero/hero_001/_.php";
   
   $hero_001 = new hero_001(
      $root_folder,
      null,
      "Inicio",
      "inicio",
      "Eduardo Osteicoechea", 
      "light",
      "fotoPersonal1080x1920.jpg",
      "Personal Image"
   );
   
   new page_top(
      $root_folder,
      null,
      "Inicio",
      "inicio",
      "La cosmovisión de Eduardo Osteicoechea.",  
      [$hero_001->print_styles()], 
      "light"
   );

   echo $hero_001->print_markup();
   
   new page_bottom($root_folder);
?>