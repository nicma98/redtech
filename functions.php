<?php

// Requires
require 'inc/redtech-template-hooks.php';

//Activacion tema
function redtech_setup(){
    
    //Add la compatibilidad con las miniaturas en publicaciones y páginas.
    add_theme_support( 'post-thumbnails' );

    //Dimensiones de logo
    $logo_width  = 120;
    $logo_height = 90;
    add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
    );
    
    //Gestion de <title>
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'redtech_setup' );
// Creacion de menus
function redtech_menus(){
    register_nav_menus( array(
        'menu-principal' => 'Menu principal portafolio',
        'menu-redes' => 'Menu redes sociales',
    ) );
}
add_action('init', 'redtech_menus');
// Scripts y Styles
function redtech_scripts_styles(){
    // La hoja de estilos general
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    // La hoja de estilos slick
    wp_enqueue_style( 'slickStyle', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), '1.0.0' );
    // La hoja de estilos bxSlider
    wp_enqueue_style( 'hamburgersStyle', get_stylesheet_directory_uri() . '/assets/css/hamburgers.css', array(), '1.0.0' );
    // La hoja de estilos bxSlider
    wp_enqueue_style( 'bxSliderStyle', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.css', array(), '4.2.12' );
    // Hoja de estilos normalize
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '8.0.1' );
    // Fuente de Google Fonts
    wp_enqueue_style( 'googleFont', 'https://fonts.googleapis.com/css?family=Nunito:400,700,800,900&display=swap', array(), '1.0.0');
    wp_enqueue_style( 'googleFontTitle', 'https://fonts.googleapis.com/css?family=Fredoka+One&display=swap', array(), '1.0.0');
    // Script fitVids
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.8.1', true);
    // Script fitVids
    wp_enqueue_script( 'fitVids', get_stylesheet_directory_uri() . '/assets/js/jquery.fitvids.js', array('jquery'), '1.1', true);
    // Script bxSlider
    wp_enqueue_script( 'bxSlider', get_stylesheet_directory_uri() . '/assets/js/jquery.bxslider.min.js', array('jquery','fitVids'), '4.2.12', true);
    // Archivos JavaScript
    wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery', 'bxSlider', 'fitVids' ), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'redtech_scripts_styles' );
/**
 * Registro de widgets
 */
class politicas_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // widget ID
            'politicas_widget',
            // widget name
            "Políticas de sitio",
            // widget description
            array( 
                "description" => "Links de políticas del sitio web.",
                "classname"   => "politicas_widget",
            )
        );
    }
    public function widget( $args, $instance ) {
        //Widget en el frontend

        $widget_poli_privacidad = apply_filters( 'widget_text',  empty( $instance['poli_privacidad']  ) ? '' : $instance['poli_privacidad'],  $instance );
        $widget_poli_compra = apply_filters( 'widget_text',  empty( $instance['poli_compra']  ) ? '' : $instance['poli_compra'],  $instance );
        $widget_terminos = apply_filters( 'widget_text',  empty( $instance['terminos']  ) ? '' : $instance['terminos'],  $instance );
        ?>
        <div class="politicas-terminos-shop">
            <ul class="list-terms">
                <li class="item-terms"><a href="<?php echo esc_url( $widget_poli_privacidad ); ?>"><?php echo esc_html( "POLÍTICA DE CALIDAD" ); ?></a></li>
                <li class="item-terms"><a href="<?php echo esc_url( $widget_poli_compra ); ?>"><?php echo esc_html( "POLÍTICA DE TRATAMIENTO DE DATOS PERSONALES" ); ?></a></li>
                <li class="item-terms"><a href="<?php echo esc_url( $widget_terminos ); ?>"><?php echo esc_html( "POLÍTICA DE GARANTÍA" ); ?></a></li>
            </ul>
        </div>
        <?php
    }
    public function form( $instance ) {
        //Funcion que muestra el formulario en el admin de Wordpress

        //Creando variables
        $instance = wp_parse_args( (array) $instance, array( 
            "poli_privacidad" => "",
            "poli_compra" => "",
            "terminos" => ""
        ) );

        //Mostrando valores de base de datos
        $widget_poli_privacidad = !empty( $instance["poli_privacidad"] ) ? $instance["poli_privacidad"] : '';
        $widget_poli_compra = !empty( $instance["poli_compra"] ) ? $instance["poli_compra"] : '';
        $widget_terminos = !empty( $instance["terminos"] ) ? $instance["terminos"] : '';

        //Como se mostrara en el wordpress admin
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( "poli_privacidad" ); ?>"><?php echo esc_html("URL política de calidad."); ?></label>
            <input type="url" id="<?php echo $this->get_field_id( "poli_privacidad" ); ?>" name="<?php echo $this->get_field_name( "poli_privacidad" ); ?>" placeholder="<?php echo esc_url( "" ); ?>" value="<?php echo esc_attr( $widget_poli_privacidad ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( "poli_compra" ); ?>"><?php echo esc_html("URL política de tratamiento de datos personales."); ?></label>
            <input type="url" id="<?php echo $this->get_field_id( "poli_compra" ); ?>" name="<?php echo $this->get_field_name( "poli_compra" ); ?>" placeholder="<?php echo esc_url( "" ); ?>" value="<?php echo esc_attr( $widget_poli_compra ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( "terminos" ); ?>"><?php echo esc_html("URL política de garantía."); ?></label>
            <input type="url" id="<?php echo $this->get_field_id( "terminos" ); ?>" name="<?php echo $this->get_field_name( "terminos" ); ?>" placeholder="<?php echo esc_url( "" ); ?>" value="<?php echo esc_attr( $widget_terminos ); ?>">
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['poli_privacidad'] = !empty( $new_instance['poli_privacidad'] ) ? strip_tags( $new_instance['poli_privacidad'] ) : '';
        $instance['poli_compra'] = !empty( $new_instance['poli_compra'] ) ? strip_tags( $new_instance['poli_compra'] ) : '';
        $instance['terminos'] = !empty( $new_instance['terminos'] ) ? strip_tags( $new_instance['terminos'] ) : '';
        return $instance;
    }
};
class redes_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // widget ID
            'redes_widget',
            // widget name
            "Redes sociales",
            // widget description
            array( 
                "description" => "Iconos de redes sociales.",
                "classname"   => "redes_widget",
            )
        );
    }
    public function widget( $args, $instance ) {
        //Widget en el frontend
        ?>
        <div class="sect-widget">
            <h4 class="title-widget"><?php echo esc_html("SIGUENOS"); ?></h4>
            <div class="footer-social-media">
                <nav class="nav-icons-social">
                    <ul>
                    <?php
                    $nav_menus = get_theme_mod( 'nav_menu_locations' );
                    foreach ($nav_menus as $key => $value):
                        if ($key == "menu-redes"):
                            $terms_menu = $value;
                        endif;
                    endforeach;
                    $terms_data_by = wp_get_nav_menu_items(get_term($terms_menu));
                    if (is_array($terms_data_by) || is_object($terms_data_by)):
                        foreach( $terms_data_by as $item ):
                            ?>
                            <li class="item-menu-social">
                                <a id="<?php echo esc_attr( $item->title ); ?>" href="<?php echo esc_url( $item->url ); ?>"></a>
                            </li>
                            <?php
                        endforeach;
                    endif;
                    ?>
                    </ul>
                </nav>
            </div>
        </div>
        <?php
    }
    public function form( $instance ) {
        //Funcion que muestra el formulario en el admin de Wordpress
        //Como se mostrara en el wordpress admin
        ?>
        <p><?php echo esc_html("Iconos de edes sociales, este se puede editar en los menus."); ?></p>
        <?php
    }
};
class newsletter_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // widget ID
            'newsletter_widget',
            // widget name
            "Newsletter",
            // widget description
            array( 
                "description" => "Formulario de Newsletter del sitio web.",
                "classname"   => "newsletter_widget",
            )
        );
    }
    public function widget( $args, $instance ) {
        //Widget en el frontend

        $widget_form_news = apply_filters( 'widget_text',  empty( $instance['form_news']  ) ? '' : $instance['form_news'],  $instance );
        ?>
        <div class="suscripcion-boletin">
            <div class="icon-news">
                <div class="icon-tag"></div>
            </div>
            <div class="content-form">
                <div class="text-suscript">
                    <h2><?php echo esc_html("SUSCRIPCIÓN A BOLETÍN DE NOTICIAS"); ?></h2>
                    <p><?php echo esc_html("¿Quieres recibir las últimas actualizaciones? Suscribete Gratis."); ?></p>
                </div>
                <div class="form-suscript">
                    <?php echo do_shortcode($widget_form_news); ?>
                </div>
            </div>
        </div>
        <?php
    }
    public function form( $instance ) {
        //Funcion que muestra el formulario en el admin de Wordpress

        //Creando variables
        $instance = wp_parse_args( (array) $instance, array( 
            "form_news" => "",
        ) );

        //Mostrando valores de base de datos
        $widget_form_news = !empty( $instance["form_news"] ) ? $instance["form_news"] : '';

        //Como se mostrara en el wordpress admin
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( "form_news" ); ?>"><?php echo esc_html("Shortcode del formulario."); ?></label>
            <input type="text" id="<?php echo $this->get_field_id( "form_news" ); ?>" name="<?php echo $this->get_field_name( "form_news" ); ?>" placeholder="<?php echo esc_url( "" ); ?>" value="<?php echo esc_attr( $widget_form_news ); ?>">
        </p>
        <?php
    }
    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['form_news'] = !empty( $new_instance['form_news'] ) ? strip_tags( $new_instance['form_news'] ) : '';
        return $instance;
    }
};
class whatsapp_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            // widget ID
            'whatsapp_widget',
            // widget name
            'Contacto de WhatsApp',
            // widget description
            array( 
                'description' => 'Contacto de whatsapp.',
                'classname'   => 'whatsapp_widget',    
            )
        );
    }
    public function widget( $args, $instance ) {
        $mys_woo_num_phone = apply_filters( 'widget_text',  empty( $instance['mys_woo_num_phone']  ) ? '' : $instance['mys_woo_num_phone'],  $instance );
        $mys_woo_text_msg = apply_filters( 'widget_text',  empty( $instance['mys_woo_text_msg']  ) ? '' : $instance['mys_woo_text_msg'],  $instance );
        $title = apply_filters( 'widget_title', $args['widget_name'], $args );
        $msg = str_replace( ' ', '%20', $mys_woo_text_msg );
        $url_contact_what = 'https://api.whatsapp.com/send?phone=57' . $mys_woo_num_phone . '&text=' . $msg;
        ?>
        <div class="wht-contact">
            <a href="<?php echo esc_url($url_contact_what); ?>" target="_blank">
                <div class="img-whatsapp"></div>
            </a>
        </div>
        <?php
    }
    public function form( $instance ) {
        //Creando variables
        $instance = wp_parse_args( (array) $instance, array( 
            'mys_woo_num_phone' => '',
            'mys_woo_text_msg' => ''
        ) );
        //Mostrando valores de base de datos
        $mys_woo_num_phone = !empty( $instance['mys_woo_num_phone'] ) ? $instance['mys_woo_num_phone'] : '';
        $mys_woo_text_msg = !empty( $instance['mys_woo_text_msg'] ) ? $instance['mys_woo_text_msg'] : '';
        //Como se mostrara en el wordpress admin
        echo '<p>';
        echo ' <label for="' . $this->get_field_id( 'mys_woo_num_phone' ) . '" class="campotexto_label">' . __( 'Numero de teléfono', 'mysecommerce' ) . '</label>';
        echo '<input type="text" id="' . $this->get_field_id( 'mys_woo_num_phone' ) . '" name="' . $this->get_field_name( 'mys_woo_num_phone' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'mysecommerce' ) . '" value="' . esc_attr( $mys_woo_num_phone ) . '">';
        echo '</p>';
        echo '<p>';
        echo ' <label for="' . $this->get_field_id( 'mys_woo_text_msg' ) . '" class="demowp_campotexto_label">' . __( 'Texto del mensaje', 'mysecommerce' ) . '</label>';
        echo '<input type="text" id="' . $this->get_field_id( 'mys_woo_text_msg' ) . '" name="' . $this->get_field_name( 'mys_woo_text_msg' ) . '" class="widefat" placeholder="' . esc_attr__( 'Texto', 'mysecommerce' ) . '" value="' . esc_attr( $mys_woo_text_msg ) . '">';
        echo '</p>';
    }
    public function update( $new_instance, $old_instance ){
        $instance = $old_instance;
        $instance['mys_woo_num_phone'] = !empty( $new_instance['mys_woo_num_phone'] ) ? strip_tags( $new_instance['mys_woo_num_phone'] ) : '';
        $instance['mys_woo_text_msg'] = !empty( $new_instance['mys_woo_text_msg'] ) ? strip_tags( $new_instance['mys_woo_text_msg'] ) : '';
        return $instance;
    }
};
function redtech_theme_register_widget() {
    register_widget("newsletter_widget");
    register_widget("redes_widget");
    register_widget("whatsapp_widget");
};
add_action( 'widgets_init', 'redtech_theme_register_widget' );
/**
 * Registro de areas de widgets
 */
if ( ! function_exists( 'redtech_add_area_widget' ) ) {
    /**
     * Funcion de registro de areas de widget
     */
	function redtech_add_area_widget(){
		register_sidebar( array(
			'name' => 'Top Footer',
			'id' => 'top-footer',
			'description' => 'Área de widgets en el encabezado del footer.',
			'before_widget' => '<div class="sect-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="title-widget">',
			'after_title' => '</h3>'
		) );
		register_sidebar( array(
			'name' => 'Columna 1',
			'id' => 'column-1',
			'description' => 'Área de widgets columna 1 del footer.',
			'before_widget' => '<div class="sect-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="title-widget">',
			'after_title' => '</h4>'
		) );
		register_sidebar( array(
			'name' => 'Columna 2',
			'id' => 'column-2',
			'description' => 'Área de widgets columna 2 del footer.',
			'before_widget' => '<div class="sect-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="title-widget">',
			'after_title' => '</h4>'
		) );
		register_sidebar( array(
			'name' => 'Bottom Footer',
			'id' => 'bottom-footer',
			'description' => 'Área de widgets al final del footer.',
			'before_widget' => '<div class="poli-footer-wg">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="title-widget">',
			'after_title' => '</h4>'
		) );
	}
}
add_action( 'widgets_init', 'redtech_add_area_widget' );
/**
 * Remover areas de widget
 */
function remove_widget_area(){
    unregister_sidebar( 'sidebar-1' );
    unregister_sidebar( 'header-1' );
    unregister_sidebar( 'footer-1' );
    unregister_sidebar( 'footer-2' );
    unregister_sidebar( 'footer-3' );
    unregister_sidebar( 'footer-4' );
}
add_action( 'widgets_init', 'remove_widget_area', 20);
?>