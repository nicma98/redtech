<?php 
/*
    Template Name: Pagina de robotica educativa
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php 
        do_action('redtech_page_soluciones_content');
        do_action('redtech_soluciones_simple', 'soluciones_robot');
    ?>
</main>

<?php get_footer(); ?>