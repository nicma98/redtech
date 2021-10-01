<?php 
/*
    Template Name: Pagina de pantallas interactivas
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php do_action('redtech_page_soluciones_content'); ?>
    <?php do_action('redtech_soluciones_simple', 'pantallas'); ?>
</main>

<?php get_footer(); ?>