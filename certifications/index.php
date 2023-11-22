<?php
    $root_folder = "../";
    include $root_folder . "00_global/global.php";
    include $components_folder . "hero/hero.php";
    include $components_folder . "card_triple_heading_paragraph_image/card_triple_heading_paragraph_image.php";
?>

<?php echo print_page_start($root_folder, "Certifications"); ?>


    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>section_separator_heading.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $styles_folder; ?>card_triple_heading_paragraph_image.css">
    
    <?php echo print_content($root_folder); ?>
    <div id="heading" class= "section_separator_heading">
        <h1>This are My Certifications</h1>
    </div>

    <div id="certifications_container">
        <?php echo print_card_triple_heading_paragraph_image(
            $root_folder,

            "Architecture Bachelor",
            "Full 5 year Bachelor degree in architecture from internationally recognized college \"Universidad De Los Andes\".",
            "<img src='assets/cert_1.png' alt='Certification Image'>",
            "#",

            "Architectonic Rethoric",
            "Course by ULA doctor Heberto Albornoz on how the architectonic elements comunicate meaninful messages to users.",
            "<img src='assets/cert_2.png' alt='Certification Image'>",
            "#",

            "Hand Drawing",
            "Second place in building hand drawing contest (loosing against an official graphic expresion preparer from ULA Venezuela).",
            "<img src='assets/cert_3.png' alt='Certification Image'>",
            "#"
            ); 
        ?>
        
        <?php echo print_card_triple_heading_paragraph_image(
            $root_folder,

            "Migrating From CAD to BIM",
            "Autodesk Authorized training center course on CAD to BIM paradigm shift.",
            "<img src='assets/cert_10.png' alt='Certification Image'>",
            "#",

            "Mastering Autodesk in Architecture Solutions.",
            "Autodesk Authorized training center course on AutoCAD, Revit & 3Ds Max Studio.",
            "<img src='assets/cert_11.png' alt='Certification Image'>",
            "#",

            "Advanced Revit Architecture 2012",
            "Autodesk Authorized training center course on Advanced use of Revit Architecture 2012.",
            "<img src='assets/cert_12.png' alt='Certification Image'>",
            "#"
            ); 
        ?>
        
        <?php echo print_card_triple_heading_paragraph_image(
            $root_folder,

            "3Ds Studio Max 2012 Essentials",
            "Autodesk Authorized training center course on 3Ds Max software for Architecture Rendering.",
            "<img src='assets/cert_13.png' alt='Certification Image'>",
            "#",

            "Fullstack Web Development.",
            "Web Development course using HTML, CSS, JavaScript, PHP, MySql & WordPress along with web design principles.",
            "<img src='assets/cert_20.png' alt='Certification Image'>",
            "#",

            "BIM Master Professional: BIM Specialist",
            "In depth Revit 2022 Tools and Procedures course for professional architecture BIM.",
            "<img src='assets/cert_21.png' alt='Certification Image'>",
            "#"
            ); 
        ?>
    </div>



<?php echo print_page_end($root_folder); ?>

