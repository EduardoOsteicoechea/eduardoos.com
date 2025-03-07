<?php
  $root_folder = "../";
  include $root_folder . "_/global.php";

  $get = count($_GET) > 0 ? $_GET : null;
  redirect_if_variable_is_populated($root_folder, $_POST);
  redirect_if_variable_is_populated($root_folder, $_FILES);
  $session = isset($_SESSION) ? $_SESSION : null;

  $page_title = "Inicia Sesión";
  $page_name = "sesion_iniciar";
  $page_description = "Inicia sesión y accede a los servicios disponibles.";
  $page_color_scheme = "light";

  include $root_folder . "_/components/form/login_form_001/login_form_001.php";
  $login_form_001 = new login_form_001(
    $root_folder,
    $root_folder . "_/components/form/login_form_001/",
    $page_title,
    $page_name,
    $page_description,
    "",
    "",
    null,
    $page_color_scheme,
    $session,
  );

  new public_page(
    $root_folder,
    $page_title,
    $page_name,
    $page_description,
    [
      [
        "markup" => $login_form_001->provide_markup(),
        "styles" => $login_form_001->provide_styles()
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