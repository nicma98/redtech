<?php 
/*
    Template Name: Pagina de maker space
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <div class="portada-electronica">
        <div class="content-portada-page">
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
    <div class="beneficios-maker">
        <div class="img-beneficios-maker">
            <div class="text-center">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/manufacture-maker.png" alt="">
            </div>
            <div class="text-center">
                <h2>BENEFICIOS DE MAKER SPACE EN LA EDUCACIÓN</h2>
            </div>
        </div>
        <div class=items-beneficios-maker>
            <ul>
                <li>Fomenta el aprendizaje activo y práctico</li>
                <li>Desarrolla una cultura emprendedora desde el aula</li>
                <li>Pensamiento lógico y la experimentación</li>
                <li>Estimula el trabajo en equipo</li>
                <li>Contacto con nuevos dispositivos y tecnología</li>
                <li>Aprendizaje y acercamiento carretas STEAM</li>
                <li>Aplicación del construccionismo / constructivismo</li>
                <li>Desarrollo de las habilidades del siglo XXI</li>
            </ul>
        </div>
    </div>
    <div class="section-page ambientes-aulas">
        <div class="title-ambientes">
            <h3>CATEGORIAS DE UN MAKERSPACE</h3>
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
                                'terms'    => 'makerspace',
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
        <div class="items-tips-aulas aulas-primaria proyectos-makerspaces">
            <div class="title-ambientes">
                <h3><?php echo get_field('titulo_galerias');?></h3>
            </div>
            <div class="slider-imgs slider-proyectos-makerspaces">
                <?php
                    $formGroup = get_field('galeria_makerspace');
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
    </div>
    <div class="section-page servicios-aulas">
        <div class="text-servi">
            <div class="title-sect-aulas title-text-servi">
                <h3>NUESTROS SERVICIOS EN MAKERSPACE</h3>
            </div>
            <div class="items-text-servi">
                <ul>
                    <li>Asesoría del proyecto</li>
                    <li>Diseño makerspace</li>
                    <li>Montaje del proyecto</li>
                    <li>Dotación de tecnologías y equipos</li>
                    <li>Capacitación</li>
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