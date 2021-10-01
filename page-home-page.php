<?php 
/*
    Template Name: Pagina de inicio
*/
?>
<?php get_header(); ?>
<main class="main-content">
    <?php do_action("redtech_home_page_site"); ?>
    <div class="call-action-sect">
        <h1><?php echo get_field('texto_llamado'); ?></h1>
        <?php do_action('accion_redtech_mp'); ?>
    </div>
    <div class="sect-clientes">
        <div class="slider-clientes">
            <div class="title-clientes">
                <h2><?php echo esc_html('INSTITUCIONES EDUCATIVAS');?></h2>
            </div>
            <div class="slider-imgs slider-logos-clientes">
                <?php
                $custom_fields = get_post_custom();
                if ( isset( $custom_fields['_galeria'] ) ):
                    $galeria_ids = explode( ',', $custom_fields['_galeria'][0] );
                    foreach ( $galeria_ids as $attachment_id ):
                        $img = wp_get_attachment_image_src( $attachment_id, 'full' );
                        ?>
                        <div class="logo-cliente">
                            <img src="<?php echo esc_url( $img[0] ) ?> ">
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>