<?php
/**
 * Funciones del tema
 */
/**
 * Funciones del header
 */
if ( ! function_exists( 'redtech_theme_get_nav' ) ) {
    function redtech_theme_get_nav($theme_location){
        $nav_menus = get_theme_mod( 'nav_menu_locations' );
        foreach ($nav_menus as $key => $value):
            if ($key == $theme_location):
                return $value;
            endif;
        endforeach;
    }
}
if ( ! function_exists( 'redtech_button_menu_phone' ) ) {
    /**
     * Funcion del logo
     */
    function redtech_button_menu_phone(){
        ?>
        <div class="menu-icon">
            <button class="hamburger hamburger--slider" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_custom_logo_theme' ) ) {
    /**
     * Funcion del logo
     */
    function redtech_custom_logo_theme(){
        ?>
        <div class="logo">
            <?php echo get_custom_logo(); ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_nav_menu_principal_portafolio' ) ) {
    /**
     * Funcion de menú principal de las paginas del portafolio
     */
    function redtech_nav_menu_principal_portafolio(){
        $terms_data_by = wp_get_nav_menu_items(get_term(redtech_theme_get_nav("menu-principal")));
        /* Array vacio para adicionar los id de los items del menu en orden jerarquico */
        $id_items = array();
        /* Array vacio para adicionar los items completos en orden jerarquico */
        $menu_nav_items = array();
        /* Iteracion de items del menu */
        if (is_array($terms_data_by) || is_object($terms_data_by)):
            foreach ( $terms_data_by as $value ):
                $item_nav = get_object_vars($value);
                /* Validacion si el item de menu es de nivel superior */
                if( $value->menu_item_parent == "0" ):
                    /* Se agrega el id del item en el array vacio de items */
                    array_push( $id_items, $value->ID );
                    /* Se agrega en el array vacio de items el id, item, array vacio, array vacio */
                    array_push( $menu_nav_items, array( $value->ID, $item_nav, array( ), array( ) ) );
                    /* Validacion de item de menu tipo categoria woocommerce */
                endif;
                if($item_nav["menu_item_parent"] !== "0"):
                    $index = array_search($item_nav["menu_item_parent"], $id_items);
                    array_push($menu_nav_items[$index][2], $item_nav);
                endif;
            endforeach;
        endif;
        if (is_array($menu_nav_items) || is_object($menu_nav_items)):
            ?>
            <nav class="menu-principal">
                <ul class="ul-menu-principal">
                <?php
                foreach( $menu_nav_items as $menu_item ):
                    ?>
                    <li class="menu-item">
                        <?php
                        if (count($menu_item[2]) == 0):
                            ?>
                            <a href="<?php echo esc_html($menu_item[1]["url"]) ?>"><?php echo esc_html($menu_item[1]["title"]) ?></a>
                            <?php
                        else:
                            ?>
                            <span><?php echo esc_html($menu_item[1]["title"]) ?></span>
                            <?php
                        endif;
                        if (count($menu_item[2]) > 0):
                            ?>
                            <div class="sub-menu-nav">
                                <div class="sub-menu-items-nav">
                                    <ul class="sub-menu-ul">
                                    <?php
                                    $count = 1;
                                    foreach($menu_item[2] as $sub_item):
                                        ?>
                                        <li class="sub-menu-item">
                                            <?php 
                                            $post_obj = get_post($sub_item["object_id"]);
                                            ?>
                                            <a href="<?php echo esc_url($sub_item["url"]) ?>">
                                                <div id="<?php echo esc_attr($post_obj->post_name); ?>" class="icon"></div>
                                                <span><?php echo esc_html($sub_item["title"]) ?></span>
                                            </a>
                                        </li>
                                        <?php
                                        if($count == 6):
                                            $count = 0;
                                            ?>
                                            </ul>
                                            <ul class="sub-menu-ul">
                                            <?php   
                                        endif;
                                        $count += 1;
                                    endforeach;
                                    ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        endif;
                        ?>
                    </li>
                    <?php
                endforeach;
                ?>
                </ul>
            <?php
            ?>
            </nav>
            <?php
        endif;
    }
}
/**
 * Funciones del template home
 */
if ( ! function_exists( 'redtech_home_page_portada' ) ) {
    /**
     * Funcion de portada del pagina de inicio
     */
    function redtech_home_page_portada(){
        ?>
        <div class="sect-portada">
            <?php
                $img_portada_grande = wp_get_attachment_image_src(get_field('img_portada_grande')["ID"], 'full')[0];
                $img_portada_pequeña = wp_get_attachment_image_src(get_field('img_portada_pequeña')["ID"], 'full')[0];
            ?>
            <div class="sect-img-portada">
                <script>
                    var widthWindow = jQuery(window).width()
                    if ( widthWindow < 768 ){
                        jQuery('div.sect-img-portada').prepend('<img src="<?php echo esc_attr($img_portada_pequeña); ?>" alt="portada">')
                    }else if ( widthWindow >= 768 ){
                        jQuery('div.sect-img-portada').prepend('<img src="<?php echo esc_attr($img_portada_grande); ?>" alt="portada">')
                    }
                </script>
                <div class="slider-frases">
                    <div class="slid-frase">
                        <?php
                            $frase_1 = get_field("frase_1");
                        ?>
                        <h2><?php echo esc_html($frase_1) ?></h2>
                    </div>
                    <div class="slid-frase">
                        <?php
                            $frase_2 = get_field("frase_2");
                        ?>
                        <h2><?php echo esc_html($frase_2) ?></h2>
                    </div>
                    <div class="slid-frase">
                        <?php
                            $frase_3 = get_field("frase_3");
                        ?>
                        <h2><?php echo esc_html($frase_3) ?></h2>
                    </div>
                </div>
            </div>
            <div class="items-sec-portada">
                <div class="item-sect">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="tec-educativa" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("TECNOLOGIA EDUCATIVA"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-sect">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="educacion-steam" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("EDUCACION STEAM"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-sect">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="espacios-steam" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("ESPACIOS DE APRENDIZAJE"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-sect">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="innovacion-edu" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("INNOVACION EDUCATIVA"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-sect">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="recursos-digitales" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("PLATAFORMAS DIGITALES"); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="title-entornos">
                <h2><?php echo esc_html("ENTORNOS DE APRENDIZAJE PARA LA EDUCACION DEL SIGLO XXI"); ?></h2>
            </div>
            <div class="items-entornos">
                <div class="item-entorno">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="aprendizaje-inter" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("APRENDIZAJE INTERDISCIPLINARIO"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-entorno">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="aprendizaje-aplicado" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("APRENDIZAJE APLICADO"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-entorno">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="competencias-xxi" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("COMPETENCIAS DEL SIGLO XXI"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-entorno">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="cultura-digital" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("CULTURA DIGITAL"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-entorno">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="alfa-digital" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("ALFABETIZACION DIGITAL"); ?></span>
                        </div>
                    </div>
                </div>
                <div class="item-entorno">
                    <div class="content-item">
                        <div class="icon-item">
                            <div id="aprendizaje-perso" class="icon"></div>
                        </div>
                        <div class="text-item">
                            <span><?php echo esc_html("APRENDIZAJE PERSONALIZADO"); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_tag_open_section_page_portada' ) ) {
    /**
     * Funcion de apertura de etiqueta de portada
     */
    function redtech_tag_open_section_page_portada(){
        ?>
        <div class="sect-soluciones-portada">
            <ul class="list-soluciones">
        <?php
    }
}
if ( ! function_exists( 'redtech_tag_close_section_page_portada' ) ) {
    /**
     * Funcion de cierre de etiqueta de portada
     */
    function redtech_tag_close_section_page_portada(){
        ?>
            </ul>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_section_page_portada' ) ) {
    /**
     * Funcion de seccion de pagina portada
     */
    function redtech_section_page_portada($img, $titulo, $descripcion, $url, $id_icon=""){
        ?>
        <li class="item-solucion">
            <div class="content-solucion">
                <div class="img-solucion">
                    <img class="img-solucion" src="<?php echo esc_attr($img); ?>" alt="img_solucion">
                </div>
                <div class="info-content-solucion">
                    <div class="icon-solucion">
                        <div class="img-icon" id="<?php echo esc_attr($id_icon); ?>"></div>
                    </div>
                    <h2 class="titulo"><?php echo $titulo; ?></h2>
                    <p class="descripcion"><?php echo $descripcion; ?></p>
                    <div class="btn-solucion">
                        <button>
                            <a href="<?php echo $url; ?>">SABER MÁS</a>
                        </button>
                    </div>
                </div>
            </div>
        </li>
        <?php
    }
}
if ( ! function_exists( 'redtech_tec_robotica' ) ) {
    /**
     * Funcion de robotica educativa
     */
    function redtech_tec_robotica(){
        $img = wp_get_attachment_image_src(get_field('img_robotica'), 'full')[0];
        $titulo = get_field('titulo_robotica_educativa');
        $descripcion = get_field('descripcion_robotica');
        $url = get_field('pagina_detalle_robotica');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "robotica");
    }
}
if ( ! function_exists( 'redtech_tec_pensamiento_computacional' ) ) {
    /**
     * Funcion de robotica educativa
     */
    function redtech_tec_pensamiento_computacional(){
        $img = wp_get_attachment_image_src(get_field('img_pensamiento_computacional'), 'full')[0];
        $titulo = get_field('titulo_pensamiento_computacional');
        $descripcion = get_field('descripcion_pensamiento_computacional');
        $url = get_field('pagina_detalle_pensamiento_computacional');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "pensamiento-comp");
    }
}
if ( ! function_exists( 'redtech_tec_impresion_3d' ) ) {
    /**
     * Funcion de robotica educativa
     */
    function redtech_tec_impresion_3d(){
        $img = wp_get_attachment_image_src(get_field('img_impresion_3d'), 'full')[0];
        $titulo = get_field('titulo_impresion_3d');
        $descripcion = get_field('descripcion_impresion_3d');
        $url = get_field('pagina_detalle_impresion_3d');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "impresion-3d");
    }
}
if ( ! function_exists( 'redtech_tec_energias' ) ) {
    /**
     * Funcion de energias renovables
     */
    function redtech_tec_energias(){
        $img = wp_get_attachment_image_src(get_field('img_energias'), 'full')[0];
        $titulo = get_field('titulo_energias');
        $descripcion = get_field('descripcion_energias');
        $url = get_field('pagina_detalle_energias');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "energias");
    }
}
if ( ! function_exists( 'redtech_tec_electronica' ) ) {
    /**
     * Funcion de electronica educativa
     */
    function redtech_tec_electronica(){
        $img = wp_get_attachment_image_src(get_field('img_electronica'), 'full')[0];
        $titulo = get_field('titulo_electronica');
        $descripcion = get_field('descripcion_electronica');
        $url = get_field('pagina_detalle_electronica');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "electronica");
    }
}
if ( ! function_exists( 'redtech_tec_drones' ) ) {
    /**
     * Funcion de drones educativos
     */
    function redtech_tec_drones(){
        $img = wp_get_attachment_image_src(get_field('img_drones'), 'full')[0];
        $titulo = get_field('titulo_drones');
        $descripcion = get_field('descripcion_drones');
        $url = get_field('pagina_detalle_drones');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "drones");
    }
}
if ( ! function_exists( 'redtech_tec_pantallas' ) ) {
    /**
     * Funcion de pantallas interactivas
     */
    function redtech_tec_pantallas(){
        $img = wp_get_attachment_image_src(get_field('img_pantallas'), 'full')[0];
        $titulo = get_field('titulo_pantallas');
        $descripcion = get_field('descripcion_pantallas');
        $url = get_field('pagina_detalle_pantallas');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "pantallas");
    }
}
if ( ! function_exists( 'redtech_tec_contenido_digital' ) ) {
    /**
     * Funcion de contenido digital
     */
    function redtech_tec_contenido_digital(){
        $img = wp_get_attachment_image_src(get_field('img_contenido_digital'), 'full')[0];
        $titulo = get_field('titulo_cotenido_digital');
        $descripcion = get_field('descripcion_contenido_digital');
        $url = get_field('pagina_detalle_contenido_digital');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "ar-vr");
    }
}
if ( ! function_exists( 'redtech_tec_biblioteca_digital' ) ) {
    /**
     * Funcion de biblioteca digital
     */
    function redtech_tec_biblioteca_digital(){
        $img = wp_get_attachment_image_src(get_field('img_biblioteca_digital'), 'full')[0];
        $titulo = get_field('titulo_biblioteca_digital');
        $descripcion = get_field('descripcion_biblioteca_digital');
        $url = get_field('pagina_detalle_biblioteca_digital');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "bi-digital");
    }
}
if ( ! function_exists( 'redtech_tec_laboratorios_digitales' ) ) {
    /**
     * Funcion de laboratorios digitales
     */
    function redtech_tec_laboratorios_digitales(){
        $img = wp_get_attachment_image_src(get_field('img_laboratorios_digitales'), 'full')[0];
        $titulo = get_field('titulo_laboratorios_digitales');
        $descripcion = get_field('descripcion_laboratorios_digitales');
        $url = get_field('pagina_detalle_laboratorios_digitales');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "lab-digital");
    }
}
if ( ! function_exists( 'redtech_tec_ingenieria' ) ) {
    /**
     * Funcion de Ingeniería en el aula
     */
    function redtech_tec_ingenieria(){
        $img = wp_get_attachment_image_src(get_field('img_ingenieria'), 'full')[0];
        $titulo = get_field('titulo_ingenieria');
        $descripcion = get_field('descripcion_ingenieria');
        $url = get_field('pagina_detalle_ingenieria');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "ing");
    }
}
if ( ! function_exists( 'redtech_tec_iot' ) ) {
    /**
     * Funcion de Internet de las cosas
     */
    function redtech_tec_iot(){
        $img = wp_get_attachment_image_src(get_field('img_iot')["ID"], 'full')[0];
        $titulo = get_field('titulo_iot');
        $descripcion = get_field('descripcion_iot');
        $url = get_field('pagina_detalle_iot');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "iot");
    }
}
if ( ! function_exists( 'redtech_tec_ia' ) ) {
    /**
     * Funcion de Inteligencia Artificial
     */
    function redtech_tec_ia(){
        $img = wp_get_attachment_image_src(get_field('img_ia')["ID"], 'full')[0];
        $titulo = get_field('titulo_ia');
        $descripcion = get_field('descripcion_ia');
        $url = get_field('pagina_detalle_ia');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "ia");
    }
}
if ( ! function_exists( 'redtech_tec_aulas' ) ) {
    /**
     * Funcion de aulas STEAM
     */
    function redtech_tec_aulas(){
        $img = wp_get_attachment_image_src(get_field('img_aulas'), 'full')[0];
        $titulo = get_field('titulo_aulas');
        $descripcion = get_field('descripcion_aulas');
        $url = get_field('pagina_detalle_aulas');
        redtech_section_page_portada($img, $titulo, $descripcion, $url, "aulas-maker");
    }
}
/**
 * Funciones de template footer
 */
if ( ! function_exists( 'redtech_footer_container_open' ) ) {
    /**
     * Funcion para etiqueta de apertura de footer
     */
    function redtech_footer_container_open(){
        ?>
        <div class="container-footer">
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_widget_area_top' ) ) {
    /**
     * Funcion para mostrar widgets en el encabezado del footer
     */
    function redtech_footer_widget_area_top(){
        ?>
        <div class="widgets-top-footer">
            <?php
            dynamic_sidebar( 'top-footer' );
            ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_widget_area_columns_open' ) ) {
    /**
     * Funcion de apretura de widgets de columna
     */
    function redtech_footer_widget_area_columns_open(){
        ?>
        <div class="columns-widget-footer">
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_widget_area_column_1' ) ) {
    /**
     * Funcion para mostrar widgets en la columna 1
     */
    function redtech_footer_widget_area_column_1(){
        ?>
        <div class="widget-column-1">
            <?php
            dynamic_sidebar( 'column-1' );
            ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_widget_area_column_2' ) ) {
    /**
     * Funcion para mostrar widgets en la columna 2
     */
    function redtech_footer_widget_area_column_2(){
        ?>
        <div class="widget-column-2">
            <?php
            dynamic_sidebar( 'column-2' );
            ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_widget_area_columns_close' ) ) {
    /**
     * Funcion de cierre de widgets de columna
     */
    function redtech_footer_widget_area_columns_close(){
        ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_container_close' ) ) {
    /**
     * Funcion de cierre de container en footer
     */
    function redtech_footer_container_close(){
        ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_container_open_last' ) ) {
    /**
     * Funcion de apertura de ultimo container en footer
     */
    function redtech_footer_container_open_last(){
        ?>
        <div class="container-tag-footer-pol">
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_container_politicas' ) ) {
    /**
     * Funcion de contenedor de politicas
     */
    function redtech_footer_container_politicas(){
        ?>
        <div class="container-footer-politicas">
            <?php dynamic_sidebar( 'bottom-footer' ); ?>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_container_creditos' ) ) {
    /**
     * Funcion de contenedor de creditos
     */
    function redtech_footer_container_creditos(){
        ?>
        <div class="container-footer-creditos">
            <?php
            $year = date('Y');
            $name = get_bloginfo("name");;
            ?>
            <span>© Copyright <?php echo $year . " " . $name; ?></span>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_button_top' ) ) {
    /**
     * Funcion para boton top 
     */
    function redtech_footer_button_top(){
        ?>
        <div class="button-top-page">
            <a href="#header-site">
            </a>
        </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_footer_container_close_last' ) ) {
    /**
     * Funcion de cierre de ultimo container en footer
     */
    function redtech_footer_container_close_last(){
        ?>
        </div>
        <?php
    }
}
/**
 * Funciones del template de paginas
 */
if ( ! function_exists( 'redtech_solucion_portada' ) ) {
    /**
     * Funcion de portada de solucion
     */
    function redtech_solucion_portada(){
        ?>
        <div class="content-portada-page">
            <div class="img-portada-pagina">
                <?php
                    $img_portada = wp_get_attachment_image_src(get_field('img_portada'), 'full')[0];
                    $img_portada_phone = wp_get_attachment_image_src(get_field('img_portada_phone'), 'full')[0];
                ?>
                <div class="sect-portada-phone">
                    <div class="title-portada-phone">
                        <h1><?php the_title(); ?></h1>
                    </div>
                    <script>
                        var widthWindow = jQuery(window).width()
                        if ( widthWindow < 768 ){
                            jQuery("div.sect-portada-phone").append('<img class="img-portada img-portada-phone" src="<?php echo esc_attr($img_portada_phone); ?>" alt="img_portada_phone">')
                        }
                    </script>
                </div>
                <script>
                    var widthWindow = jQuery(window).width()
                    if ( widthWindow > 768 ){
                        jQuery("div.img-portada-pagina").append('<img class="img-portada img-portada-big" src="<?php echo esc_attr($img_portada); ?>" alt="img_portada">')
                    }
                </script>
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
        <script>
            var widthWindow = jQuery(window).width()
            if ( widthWindow < 768 ){
                jQuery( ".slider-<?php echo $increment; ?> > .img-fondo" ).append('<img src="<?php echo get_field('imagenes')["imagen_pequena"]["sizes"]["mythemew-fullscreen"]; ?>" alt="fondo-slider-<?php echo $increment; ?>">')
                console.log('Pequeño')
            }else if ( widthWindow >= 768 ){
                jQuery( ".slider-<?php echo $increment; ?> > .img-fondo" ).append('<img src="<?php echo get_field('imagenes')["imagen_grande"]["sizes"]["mythemew-fullscreen"]; ?>" alt="fondo-slider-<?php echo $increment; ?>">')
                console.log('Grande')
            }
        </script>
        <?php
    }
}
if ( ! function_exists( 'redtech_solucion_beneficios' ) ) {
    /**
     * Funcion de beneficios de solucion
     */
    function redtech_solucion_beneficios(){
        ?>
            <div class="sect-beneficios">
                <?php
                    $titulo_beneficios = get_field('titulo_beneficios');
                    $img_beneficios = wp_get_attachment_image_src(get_field('imagen_fondo_beneficios'), 'full')[0];
                ?>
                <div class="img-beneficios">
                    <img src="<?php echo esc_attr($img_beneficios); ?>" alt="imagen-beneficios">
                </div>
                <div class="beneficios-items">
                    <h2><?php echo esc_html( $titulo_beneficios )?></h2>
                    <?php
                        $beneficios_array = array();
                        $beneficios_array[0] = get_field('beneficio_1');
                        $beneficios_array[1] = get_field('beneficio_2');
                        $beneficios_array[2] = get_field('beneficio_3');
                        $beneficios_array[3] = get_field('beneficio_4');
                        $beneficios_array[4] = get_field('beneficio_5');
                    ?>
                    <ul>
                        <?php
                            foreach ($beneficios_array as $item) {
                                ?><li><span><?= $item ?></span></li><?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        <?php
    }
}
if ( ! function_exists( 'redtech_soluciones_simple_template' ) ) {
    /**
     * Funcion para mostrar soluciones normales
     */
    function redtech_soluciones_simple_template($term){
        ?>
        <div class="soluciones-robotica-educativa">
            <?php
                $args = array(
                    'post_type' => $term,
                    'posts_per_page' => 100,
                    'orderby' => 'title',
                    'order'   => 'ASC',
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
                                        $gallery = get_field('galeria_multimedia');
                                        foreach ($gallery as $value):
                                            if (isset($value['tipo'])):
                                                if($value['tipo'] == 'youtube'):?>
                                                    <div class="video-full-adap">
                                                        <iframe src="https://www.youtube.com/embed/<?php echo $value['youtube']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div><?php
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
                                            else:
                                                if($value):
                                                    $img = wp_get_attachment_image_src($value, 'full')[0];
                                                    $title = get_post($value)->post_title;?>
                                                    <div class="img-slider">
                                                        <img class="img-solucion" src="<?php echo esc_attr($img); ?>" alt="img_solucion" title="<?php echo $title;?>">
                                                    </div><?php
                                                endif;
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
        <?php
    }
}
/**
 * Llamados a la acción Redtech
 */

if(!function_exists('llamado_accion_redtech')){
    function llamado_accion_redtech(){
    ?>
        <div class="seccion-call-to-action">
            <button class="get-call">AGENDA UNA VISITA</button>
            <div class="llamado-accion">
                <div class="text-accion">
                    <h3>DATOS DE CONTACTO</h3>
                </div>
                <div class="form-accion">
                    <?php 
                    $short_form = get_field('shortcode_accion');
                    echo do_shortcode($short_form); 
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
}
/*if ( ! function_exists( '' ) ) {
    /**
     * 
     */
/*    function (){
        ?>
        <?php
    }
}*/
?>