<?php
get_template_part ('function/scripts', 'functions');
get_template_part ('function/nav', 'menu');
//get_template_part('function/add', 'filters');
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}
