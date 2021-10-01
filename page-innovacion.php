<?php 
/*
    Template Name: Innovacion educativa
*/
?>
<?php get_header(); ?>

<main class="main-content">
    <div class="portada-aulas">
        <div class="content-portada-page portada-computo-edu">
            <div class="img-portada-pagina">
                <?php
                    $id_img_portada = get_field('portada');
                    $img_portada = wp_get_attachment_image_src($id_img_portada, 'full')[0];
                    $id_img_portada_phone = get_field('img_portada_phone');
                    $img_portada_phone = wp_get_attachment_image_src($id_img_portada_phone, 'full')[0];
                ?>
                <div class="sect-portada-phone">
                    <div class="title-portada-phone">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <img class="img-portada img-portada-phone" src="<?php echo esc_attr($img_portada_phone); ?>" alt="img_portada_phone">
                </div>
                <img class="img-portada img-portada-big" src="<?php echo esc_attr($img_portada); ?>" alt="img_portada">
            </div>
            <div class="text-portada-pagina">
                <div class="item-content-portada">
                    <div class="title-portada-pagina">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <div class="animate-part">
                        <div class="animate-1"></div>
                        <div class="animate-2"></div>
                    </div>
                    <div class="descrip-portada-computo">
                        <?php
                            $descr_portada = get_field('texto_portada');
                        ?>
                        <p class="justify"><?php echo $descr_portada; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="soluciones-innovacion">
        <?php
            $args = array(
                'post_type' => 'soluciones_innov',
                'posts_per_page' => 100,
                'orderby' => 'title',
                'order'   => 'ASC',
            );
            $avisos = new WP_Query($args);
            if($avisos):?>
                <div class="soluciones-innovacion pruebas_pc">
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
                ?>
                </div>
                <?php
            endif;
        ?>
    </div>
</main>
<?php get_footer(); ?>