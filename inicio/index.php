<?php
  $root_folder = "../";
  include $root_folder . "_/global.php";

  
  $get = count($_GET) > 0 ? $_GET : null;
  redirect_if_variable_is_populated($root_folder, $_POST);
  redirect_if_variable_is_populated($root_folder, $_FILES);
  $session = isset($_SESSION) ? $_SESSION : null;

  $page_title = "eduardoos.com";
  $page_name = "inicio";
  $page_description = "El sitio web oficial de Eduardo Osteicoechea.";
  $page_color_scheme = "light";

  include $root_folder . "_/components/hero/hero_002/hero_002.php";

  $hero_002 = new hero_002(
    $root_folder,
    $root_folder . "_/components/hero/hero_002/",
    $page_title,
    $page_name,
    $page_description,
    "","",null,
    $page_color_scheme,
    $session,null,null,null,
    "Eduardo Osteicoechea",
    "Salvo por Jesucristo, siervo de iglesias, arquitecto, programador, artista, escritor, docente y eticista venezolano",
    [
      ["Foto Personal","fotoPersonal3840x2160.jpg"],
      ["Foto Personal","fotoPersonal1080x1920.jpg"],
    ],
    [
      ["Servicios", "servicios"],
      ["Conversemos","contacto"],
    ],
  );


  new public_page(
    $root_folder,
    $page_title,
    $page_name,
    $page_description,
    [
      [
        "markup" => $hero_002->provide_markup(),
        "styles" => $hero_002->provide_styles()
      ],
    ],
    $get,
    $session,
    null,
    null,
    "",
    $page_color_scheme
  );
?>