<?php 
/*
    Template Name: Pagina de aulas steam
*/
?>

<?php get_header(); ?>
<main class="main-content">
    <div class="portada-aulas">
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
    <div class="section-page ventajas-aulas">
        <div class="title-sect-aulas-borde text-center">
            <h3>VENTAJAS DE LAS AULAS STEAM</h3>
        </div>
        <div class="items-ventajas">
            <div class="item-1-ventajas">
                <div class="text-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/chatbot.png" alt="">
                </div>
                <ul class="list-mj">
                    <li>Acercar las nuevas tecnologías en el entorno educativo</li>
                    <li>Aplicación del conocimiento</li>
                    <li>Impulsa la creatividad y la innovación</li>
                    <li>Enseña el trabajo en equipo, la colaboración y la comunicación</li>
                    <li>Genera un proceso de aprendizaje completo</li>
                </ul>
            </div>
            <div class="item-2-ventajas">
                <div class="text-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/learn.png" alt="">
                </div>
                <ul class="list-mj">
                    <li>Mejora las habilidades de resolución de problemas</li>
                    <li>Mayor comprensión de los conceptos</li>
                    <li>Impulsa la creatividad y la innovación</li>
                    <li>Permite el uso innovador de pedagogías (ABP-ABR-otros)</li>
                    <li>Permite el uso innovador de la tecnología en el aula</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section-page caracteristicas-aulas">
        <div class="content-caract">
            <div class="img-caract">
                <div class="text-center">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/cogwheels.png" alt="">
                </div>
                <div class="text-center title-sect-aulas">
                    <h3>CARACTERÍSTICAS DE LAS AULAS STEAM</h3>
                </div>
            </div>
            <div class="text-caract">
                <ul class="list-mj">
                    <li>Espacios flexibles y multifuncionales</li>
                    <li>Espacios para el aprendizaje activo</li>
                    <li>Incorporación de distintas tecnologías</li>
                    <li>Nuevos enfoques pedagógicos</li>
                    <li>Fomentan la curiosidad e imaginación</li>
                    <li>Educación 4.0</li>
                    <li>Fomentan el pensamiento crítico y analítico</li>
                    <li>Desarrollo habilidades del siglo XXI</li>
                </div>
            </div>
        </div>
    </div>
    <div class="section-page ambientes-aulas">
        <div class="title-ambientes">
            <h3>AMBIENTES DE LAS AULAS STEAM</h3>
        </div>
        <div class="content-ambientes">
            <div class="content-items-ambientes">
                <?php
                    $args = array(
                        'post_type' => 'ambientes',
                        'posts_per_page' => 100,
                        'orderby' => 'title',
                        'order'   => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'espacio_steam',
                                'field'    => 'slug',
                                'terms'    => 'aula-steam',
                            ),
                        ),
                    );
                    $soluciones = new WP_Query($args);
                    if($soluciones):
                        while($soluciones->have_posts()): $soluciones->the_post();
                            echo '<div class="ambiente">';
                                echo '<div class="img-ambiente">';
                                    the_post_thumbnail('full', '');
                                echo '</div>';
                                echo '<div class="title-ambiente">';
                                    echo '<p>'.get_the_title().'</p>';
                                echo '</div>';
                            echo '</div>';
                        endwhile;
                        wp_reset_postdata();
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="section-page tipos-aulas">
        <div class="items-tips-aulas aulas-primaria">
            <div class="title-ambientes">
                <h3><?php echo get_field('titulo_aulas_primaria');?></h3>
            </div>
            <div class="slider-imgs slider-aulas-primaria">
                <?php
                    $formGroup = get_field('aulas_primaria');
                    if( $formGroup ):
                        for( $i = 1; $i <= 20; $i++ ):
                            if($formGroup['proyecto_'.$i]['imagen']):
                                $groupProyect = $formGroup[ 'proyecto_' . $i ];
                                echo '<div class="proyecto-aula">';
                                if(is_array($groupProyect['imagen'])):
                                    echo '<img src="'.esc_attr(wp_get_attachment_image_src($groupProyect['imagen']['id'], 'full')[0]).'" alt="img_aula">';
                                else:
                                    echo '<img src="'.esc_attr(wp_get_attachment_image_src($groupProyect['imagen'], 'full')[0]).'" alt="img_aula">';
                                endif;
                                echo '<div class="text-proyecto"><p>'.$groupProyect['descripcion'].'</p></div>';
                                echo '</div>';
                            endif;
                        endfor;
                    endif;
                ?>
            </div>
        </div>
        <div class="items-tips-aulas aulas-secundaria">
            <div class="title-ambientes">
                <h3><?php echo get_field('titulo_aulas_secundaria');?></h3>
            </div>
            <div class="slider-imgs slider-aulas-secundaria">
                <?php
                    $formGroupSecundaria = get_field('aulas_secundaria');
                    if($formGroupSecundaria):
                        for( $i = 1; $i <= 20; $i++ ):
                            if($formGroupSecundaria['proyecto_'.$i]['imagen']):
                                $groupProyect = $formGroupSecundaria[ 'proyecto_' . $i ];
                                echo '<div class="proyecto-aula">';
                                if(is_array($groupProyect['imagen'])):
                                    echo '<img src="'.esc_attr(wp_get_attachment_image_src($groupProyect['imagen']['id'], 'full')[0]).'" alt="img_aula">';
                                else:
                                    echo '<img src="'.esc_attr(wp_get_attachment_image_src($groupProyect['imagen'], 'full')[0]).'" alt="img_aula">';
                                endif;
                                echo '<div class="text-proyecto"><p>'.$groupProyect['descripcion'].'</p></div>';
                                echo '</div>';
                            endif;
                        endfor;
                    endif;
                ?>
            </div>
        </div>
    </div>
    <div class="section-page servicios-aulas">
        <div class="text-servi">
            <div class="title-sect-aulas title-text-servi">
                <h3>NUESTROS SERVICIOS EN AULAS STEAM</h3>
            </div>
            <div class="items-text-servi">
                <ul>
                    <li>Capacitación a docentes</li>
                    <li>Análisis para el montaje del Aula STEAM</li>
                    <li>Diseño del Aula STEAM</li>
                    <li>Dotación de Tecnología</li>
                    <li>Diseño del mobiliario</li>
                </ul>
            </div>
            <?php do_action('accion_redtech_mp'); ?>
        </div>
        <div class="img-servi">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/servi-aulas.png" alt="aulas primaria">
        </div>
    </div>
</main>

<?php get_footer(); ?>