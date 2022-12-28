<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head();?>
</head>
<body>
<header>
    <div class="wrapper">
        <header>
            <a href="/"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" class="logo"></a>
            <?php get_search_form(); ?>
        </header>
    </div>

<nav class="main-navigation">
	<?php wp_nav_menu(array('menu' => 'top-menu', 'menu_class' => 'top-menu')); ?>
    </nav>
