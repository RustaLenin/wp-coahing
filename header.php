<?php ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/form.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/test.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/comments.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css">

    <?php wp_head(); ?>

</head>

<body class="white">

<?php include 'templates/header/header-content.php'; ?>
