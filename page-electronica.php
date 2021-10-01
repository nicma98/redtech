<?php 
/*
    Template Name: Pagina de electronica
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php 
        do_action('redtech_page_soluciones_content'); 
        do_action('redtech_soluciones_simple', 'soluciones_el_post');
    ?>
</main>

<?php get_footer(); ?>