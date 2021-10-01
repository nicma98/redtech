<?php 
/*
    Template Name: Pagina de energias renovables
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php do_action('redtech_page_soluciones_content'); ?>
    <div class="soluciones-robotica-educativa">
        <?php
            ?>
            <div class="pruebas_pc">
            <?php
            $args = array(
                'post_type' => 'energias',
                'posts_per_page' => 100,
                'orderby' => 'title',
                'order'   => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tipo_energias',
                        'field'    => 'slug',
                        'terms'    => 'solucion-destacada',
                    ),
                ),
            );
            $soluciones = new WP_Query($args);
            if($soluciones):?>
                <div class="title-sect">
                    <h3>NUESTRAS SOLUCIONES DE ENERGÍAS RENOVABLES</h3>
                </div>
                <?php
                while($soluciones->have_posts()): $soluciones->the_post();
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
            ?></div><?php
        ?>
        <div class="sect-otras-soluciones">
            <div class="title-sect">
                <h3>OTRAS SOLUCIONES</h3>
            </div>
            <div class="otras-soluciones-style">
                <?php
                    $args = array(
                        'post_type' => 'energias',
                        'posts_per_page' => 100,
                        'orderby' => 'title',
                        'order'   => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo_energias',
                                'field'    => 'slug',
                                'terms'    => 'otras-soluciones',
                            ),
                        ),
                    );
                    $soluciones = new WP_Query($args);
                    if($soluciones):
                ?>
                <?php
                    while($soluciones->have_posts()): $soluciones->the_post();
                        $titulo2 = get_field('segundo_titulo_grande');
                        $estilo = get_field('style');
                ?>
                    <div class="content-solucion-style <?php echo $estilo;?>">
                        <div class="info-solucion-style">
                            <div class="content-title-style">
                                <?php 
                                    echo '<span>' . $titulo2 . '</span>';
                                ?>
                            </div>
                        </div>
                        <div class="media-solucion-style">
                            <?php
                                $img = wp_get_attachment_image_src(get_field('imagen_solucion'), 'full')[0];
                            ?>
                            <img class="img-solucion-style" src="<?php echo esc_attr($img); ?>" alt="img_solucion">
                            <div class="text-solucion-style">
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                    endif;?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>