<?php 
/*
    Template Name: Pagina de impresion 3D
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php do_action('redtech_page_soluciones_content'); ?>
    <div class="soluciones-robotica-educativa">
        <?php
            $terms = array(
                'PRIMARIA Y SECUNDARIA' => 'soluciones-primaria-y-secundaria',
                'EDUCACIÓN TÉCNICA' => 'educacion-tecnica',
                'EDUCACIÓN SUPERIOR' => 'educacion-superior'
            );
            foreach ($terms as $kay_term => $value_term):
                ?>
                <div class="sect-soluciones soluciones-primaria-y-secundaria">
                    <div class="title-sect">
                        <h3><?php echo $kay_term; ?></h3>
                    </div>
                    <?php
                    $args = array(
                        'post_type' => 'soluciones_3d',
                        'posts_per_page' => 100,
                        'orderby' => 'title',
                        'order'   => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'nivel_edu_3d',
                                'field'    => 'slug',
                                'terms'    => $value_term,
                            ),
                        ),
                    );
                    ?>
                    <div class="pruebas_pc">
                    <?php
                    $soluciones = new WP_Query($args);
                    if($soluciones):
                        while($soluciones->have_posts()): $soluciones->the_post();
                            ?>
                            <?php
                                $titulo1 = get_field('primer_titulo_pequeno');
                                $titulo2 = get_field('segundo_titulo_grande');
                            ?>
                            <div>
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
                                                $gallery = get_field('galeria_multimedia');
                                                $inc_int = 1;
                                                foreach ($gallery as $key => $value):
                                                    if($value['tipo'] == 'youtube'):
                                                        ?>
                                                            <div class="video-full-adap">
                                                                <iframe src="https://www.youtube.com/embed/<?php echo $value['youtube']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                            </div>
                                                        <?php
                                                    elseif($value['tipo'] == 'img'):
                                                        $img = wp_get_attachment_image_src($value['imagen'], 'full')[0];
                                                        $title = get_post($value['imagen'])->post_title;
                                                        ?>
                                                            <div class="img-slider">
                                                                <img class="img-solucion" src="<?php echo esc_attr($img); ?>" alt="img_solucion" <?php 
                                                                if($title):
                                                                    echo 'title="'.$title.'"';
                                                                endif;
                                                                ?>>
                                                            </div>
                                                        <?php
                                                    endif;
                                                endforeach;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                    </div>
                </div>
                <?php
            endforeach;
        ?>
    </div>
</main>

<?php get_footer(); ?>