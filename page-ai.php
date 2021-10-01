<?php 
/*
    Template Name: Pagina de inteligencia artificial
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php do_action('redtech_page_soluciones_content'); ?>
    <div class="soluciones-electronica">
        <?php
            $args = array(
                'post_type' => 'tec_solu',
                'posts_per_page' => 100,
                'orderby' => 'title',
                'order'   => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type_sol',
                        'field'    => 'slug',
                        'terms'    => 'inteligencia_artificial',
                    ),
                ),
            );
            $avisos = new WP_Query($args);
            if($avisos):?>
                <div class="pruebas_pc">
                <?php
                while($avisos->have_posts()): $avisos->the_post();
                ?>
                <div>
                    <?php
                        $titulo1 = get_field('primer_titulo_pequeno');
                        $titulo2 = get_field('segundo_titulo_grande');
                    ?>
                    <div class="content-solucion">
                        <div class="info-solucion">
                            <div class="content-title">
                                <?php 
                                    if($titulo1):
                                        ?><h4><?php echo $titulo1; ?></h4><?php
                                ?>
                                <?php endif; ?>
                                <h1><?php echo $titulo2; ?></h1>
                            </div>
                            <div class="justify text-solucion">
                                <?php the_content();?>
                            </div>
                        </div>
                        <div class="media-solucion">
                            <div class="slider-solution-computo">
                                <?php
                                $custom_fields = get_post_custom();
                                if ( isset( $custom_fields['_galeria'] ) ):
                                    $galeria_ids = explode( ',', $custom_fields['_galeria'][0] );
                                    foreach ( $galeria_ids as $attachment_id ):
                                        $img = wp_get_attachment_image_src( $attachment_id, 'full' );
                                        $title = get_post($attachment_id)->post_title;
                                        ?>
                                        <div class="img-slider">
                                            <img src="<?php echo esc_url($img[0]); ?>" alt="img_solucion" title="<?php echo esc_attr($title);?>">
                                        </div>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
                ?>
                </div>
                <?php
            endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>