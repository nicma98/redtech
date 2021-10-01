<?php 
/*
    Template Name: Pagina de ingenieria en el aula
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <div class="portada-pantallas">
        <div class="content-portada-page portada-computo-edu">
            <div class="img-portada-pagina">
                <?php
                    $id_img_portada = get_field('img_portada');
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
                        <div class="animate-1" style="margin-left: 0px; opacity: 1;"></div>
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
    <div class="content-inge">
        <div class="item-content-1">
            <div class="abs gro12 text-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cogwheel.png" alt="">
            </div>
            <div class="abs gro10 der1">
                <h3>¿POR QUÉ LA INGENIERÍA EN EL COLEGIO?</h3>
            </div>
            <div class="justify abs gro10 der1">
                <p>El diseño de ingeniería es un vehículo para la integración de la ciencia, la tecnología, la ingeniería y las matemáticas (STEM) en las configuraciones K-12, así como una salida para la resolución creativa de problemas y el pensamiento de diseño. </p>
            </div>
        </div>
        <div class="item-content-2">
            <div class="abs gro10 der1">
                <h3>BENEFICIOS DE LA INSTRUCCIÓN DE INGENIERÍA EN EL AULA</h3>
            </div>
            <div class="abs gro10 der1">
                <ul>
                    <li>Involucrar activamente a los estudiantes</li>
                    <li>Mejorar el aprendizaje de los estudiantes</li>
                    <li>Mejorar el nivel de alfabetización tecnológica</li>
                    <li>Ampliar la participación en las áreas STEAM</li>
                    <li>Introducir emocionantes trayectorias profesionales</li>
                    <li>Desarrollar hábitos mentales ingeniería</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="soluciones-tecnologia soluciones-ing">
        <?php
            $args = array(
                'post_type' => 'ing',
                'posts_per_page' => 100,
                'orderby' => 'title',
                'order'   => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tipo_ing',
                        'field'    => 'slug',
                        'terms'    => 'solucion-destacada',
                    ),
                ),
            );
            $soluciones = new WP_Query($args);
            if($soluciones):?>
                <div class="sect-soluciones-destacadas">
                    <div class="title-sect">
                        <h3>NUESTRAS SOLUCIONES</h3>
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
                        'post_type' => 'ing',
                        'posts_per_page' => 100,
                        'orderby' => 'title',
                        'order'   => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo_ing',
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