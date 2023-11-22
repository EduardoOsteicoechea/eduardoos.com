<?php
    $root_folder = "../";
    include $root_folder . "00_global/global.php";
    include $components_folder . "hero/hero.php";
    include $components_folder . "card_couple_vertical_text/card_couple_vertical_text.php";
    include $components_folder . "card_triple_heading_paragraph/card_triple_heading_paragraph.php";
    include $components_folder . "card_couple_paragraph_image/card_couple_paragraph_image.php";
    include $components_folder . "card_triple_heading_paragraph_image/card_triple_heading_paragraph_image.php";
    include $components_folder . "card_triple_final_double_image/card_triple_final_double_image.php";
    include $components_folder . "card_couple_image/card_couple_image.php";
?>

<?php echo print_page_start($root_folder, "Eduardo Osteicoechea"); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_couple_vertical_text.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_triple_heading_paragraph.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_couple_paragraph_image.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_triple_heading_paragraph_image.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_triple_final_double_image.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_couple_image.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>section_separator_heading.css">
    
    <?php echo print_content($root_folder); ?>

<?php echo print_hero($root_folder); ?>

<?php echo print_card_couple_vertical_text($root_folder); ?>

<div id="focus" class= "section_separator_heading">
    <h2>I'm looking to Specialize in one of this Areas</h2>
</div>

<?php echo print_card_triple_heading_paragraph(
    $root_folder,
        "AEC Development",
        "Revit-Dynamo, Rhyno-Grasshoper & Python Script development.<br><br>NET, C#, Revit API, WPF, MYSQL & Web FullStack Plugin Development.",

        "BIM Management & Modeling",
        "NBIMS-US, NCS, COBIE, IFC, Building Smart Alliance & LEED BIM in Autodesk Suite, along with Revit Dynamo || Rynoceros GrassHoppern Parametric Modeling and documentation.",
        
        "Web Development",
        "Node JS, Next JS, Mongo DB, Tailwind, AWS, Full Stack Development.<br><br>.NET, C#, Blazor or .NET Maui, Azure, Full Stack Development."
    ); 
?>

<div id="aknowledgements" class= "section_separator_heading">
    <h2>Here are Some Relevant Aknowledgements</h2>
</div>

<?php echo print_card_couple_paragraph_image(
    $root_folder,
    "Linkedin\'s <b>Top 15% in PHP from 800.000</b> Programming Lanaguage Skills Assesment participants",
    "aknowledgement_1.png",
    "Linkedin\'s <b>Top 30% in C# from 1.000.000</b> Programming Lanaguage Skills Assesment participants",
    "aknowledgement_2.png"
    ); 
?>
<?php echo print_card_couple_paragraph_image(
    $root_folder,
    "Linkedin's <b>Top 5% in Autodesk Revit from 400.000</b> Software Knowledge Assesment participants",
    "aknowledgement_3.png",
    "Linkedin's <b>Top 5% in CSS from 1.800.000</b> Programming Lanaguage Skills Assesment participans",
    "aknowledgement_4.png"
    ); 
?>


<div id="portfolio" class= "section_separator_heading">
    <h2>This is my Development portfolio</h2>
</div>

    
<?php echo print_card_triple_heading_paragraph_image(
    $root_folder,

    "scalaa.com",
    "Branding, Web Design & Full Stack Development using HTML, CSS, JavaScript, PHP, MySql.",
    "<img src='assets/development_5.png' alt='development Image'>",
    "https://scalaa.com",

    "bimiqs.com Proposal",
    "Web Design & Full Stack Development using HTML, CSS, JavaScript, PHP, MySql.",
    "<img src='assets/development_2.png' alt='development Image'>",
    "https://eduardoosteicoechea.com/projects/bimiqs.com",

    "Revit 2024 Addin",
    ".Net, C#, WPF & Revit Api Plugin Planning and development for Building Modeling in Revit 2024.",
    "<video controls><source src='assets/bimiqs_modeling_plugin.mp4' type='video/mp4'></video>",
    "#portfolio"
    ); 
?>

<?php echo print_card_triple_heading_paragraph_image(
        $root_folder,

        "eduardoos.com",
        "Branding, Web Design & Full Stack Development using HTML, CSS, JavaScript, PHP, MySql.",
        "<img src='assets/development_3.png' alt='development Image'>",
        "https://eduardoos.com",

        "BIMIQs AutoCAD 2023 Addin",
        ".Net, C#, & AutoCAD Api 2023 Plugin Planning and development.",
        "<video controls><source src='assets/bimiqs_autocad_plugin.mp4' type='video/mp4'></video>",
        "#portfolio",

        "mypromanager.com",
        "Branding, Web Design & Full Stack Development using HTML, CSS, JavaScript, PHP, MySql.",
        "<img src='assets/development_4.png' alt='development Image'>",
        "https://mypromanager.com"
    ); 
?>

<div id="graphic_design" class= "section_separator_heading">
    <h2>This is my Logotype & Isotype Design Portfolio</h2>
</div>

<?php echo print_card_triple_final_double_image(
        $root_folder,
        "design_1.png",
        "design_2.png",
        "design_3.png",
        "design_4.png"
    );
?>

<?php echo print_card_triple_final_double_image(
        $root_folder,
        "design_5.png",
        "design_6.png",
        "design_7.png",
        "design_8.png"
    );
?>

<?php echo print_card_triple_final_double_image(
        $root_folder,
        "design_9.png",
        "design_10.png",
        "design_11.png",
        "design_12.png"
    );
?>

<div id="architecture" class= "section_separator_heading">
    <h2>This is my Architectural Design Portfolio</h2>
</div>

<?php echo print_card_couple_image(
        $root_folder,
        "arch_1.png",
        "arch_2.png"
    );
?>

<?php echo print_card_couple_image(
        $root_folder,
        "arch_3.png",
        "arch_4.png"
    );
?>

<div id="interior_design" class= "section_separator_heading">
    <h2>This is my Interior Design Portfolio</h2>
</div>

<?php echo print_card_couple_image(
            $root_folder,
            "arch_5.png",
            "arch_6.png"
        );
    ?>

<?php echo print_card_couple_image(
        $root_folder,
        "arch_7.png",
        "arch_8.png"
    );
?>

<?php echo print_card_couple_image(
        $root_folder,
        "arch_9.png",
        "arch_10.png"
    );
?>


<div id="experience" class= "section_separator_heading">
    <h2>This is my Organizational Work Experience</h2>
</div>

<?php echo print_card_triple_heading_paragraph(
    $root_folder,
        ".NET Develpoment for Revit's API (BIMIQs Miami) 4/2022  -  9/2023",
        "Planning and Develpoment of plugins and Scripts using ChatGPT, Bing AI, .NET, C#, 
        ADO.NET, MySql & WPF for Revit API.",

        "BIM Sheet Setter (VDC Works Miami)
        7/2022  -  2/2023",
        "Electrical Rooms and Kits BIM documentation in Revit 2022 along script development using C# & Dynamo-Python for process autotmation.",
        
        "Lindo Sol Suites Hotel (Galpón 5)
        4/2018 - 5/2018",
        "Full Building Image & Lobby interior design along with Full project modeling in Autocad + Project Rendering in 3Ds Max Studio 2017."
    ); 
?>
<?php echo print_card_triple_heading_paragraph(
    $root_folder,
        "Full Stack Developer (BIMIQs Miami)
        4/2022  -  9/2023",
        "Programming and Development of BIMIQs.com using HTML, CSS, JavaScript, PHP, MySql, ChatGPT & Bing AI, along with Hostinger deployment.",

        "BIM Modeler in Revit  (BIMIQs Miami)
        4/2022  -  9/2023",
        "Building and Parametric Families Modeling using native Revit tools along Revit API and Autocad API modeling and organization 
        scripts.",
        
        "Abilio's Bakery Image development (Galpón 5)
        4/2018 - 5/2018",
        "Full Building Image development & Project exterior modeling and rendering using Sketchup + Vray & Plan drawing in Autocad."
    ); 
?>
    

    




<?php echo print_page_end($root_folder); ?>