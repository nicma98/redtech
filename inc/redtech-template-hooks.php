<?php
/**
 * Template hooks del tema
 */
require 'redtech-template-functions.php';
/**
 * Template hooks header del tema
 */
add_action( 'redtech_header_content_site', 'redtech_button_menu_phone', 10 );
add_action( 'redtech_header_content_site', 'redtech_custom_logo_theme', 20 );
add_action( 'redtech_header_content_site', 'redtech_nav_menu_principal_portafolio', 30 );
/**
 * Template hooks header del footer
 */
add_action( 'redtech_footer_content_site', 'redtech_footer_container_open', 5 );
add_action( 'redtech_footer_content_site', 'redtech_footer_widget_area_top', 10 );
add_action( 'redtech_footer_content_site', 'redtech_footer_widget_area_columns_open', 15 );
add_action( 'redtech_footer_content_site', 'redtech_footer_widget_area_column_1', 20 );
add_action( 'redtech_footer_content_site', 'redtech_footer_widget_area_column_2', 25 );
add_action( 'redtech_footer_content_site', 'redtech_footer_widget_area_columns_close', 30 );
add_action( 'redtech_footer_content_site', 'redtech_footer_container_close', 35 );
add_action( 'redtech_footer_content_site', 'redtech_footer_container_open_last', 40 );
add_action( 'redtech_footer_content_site', 'redtech_footer_container_politicas', 45 );
add_action( 'redtech_footer_content_site', 'redtech_footer_container_creditos', 50 );
add_action( 'redtech_footer_content_site', 'redtech_footer_button_top', 55 );
add_action( 'redtech_footer_content_site', 'redtech_footer_container_close_last', 60 );
/**
 * Template hooks de la pagina de inicio de la pagina
 */
add_action( 'redtech_home_page_site', 'redtech_home_page_portada', 10 );
add_action( 'redtech_home_page_site', 'redtech_tag_open_section_page_portada', 15);
add_action( 'redtech_home_page_site', 'redtech_tec_robotica', 20);
add_action( 'redtech_home_page_site', 'redtech_tec_pensamiento_computacional', 25);
add_action( 'redtech_home_page_site', 'redtech_tec_impresion_3d', 30);
add_action( 'redtech_home_page_site', 'redtech_tec_energias', 35);
add_action( 'redtech_home_page_site', 'redtech_tec_electronica', 40);
add_action( 'redtech_home_page_site', 'redtech_tec_drones', 45);
add_action( 'redtech_home_page_site', 'redtech_tec_pantallas', 50);
add_action( 'redtech_home_page_site', 'redtech_tec_contenido_digital', 55);
add_action( 'redtech_home_page_site', 'redtech_tec_biblioteca_digital', 60);
add_action( 'redtech_home_page_site', 'redtech_tec_laboratorios_digitales', 65);
add_action( 'redtech_home_page_site', 'redtech_tec_ingenieria', 70);
add_action( 'redtech_home_page_site', 'redtech_tec_iot', 75);
add_action( 'redtech_home_page_site', 'redtech_tec_ia', 80);
add_action( 'redtech_home_page_site', 'redtech_tec_aulas', 85);
add_action( 'redtech_home_page_site', 'redtech_tag_close_section_page_portada', 100);
/**
 * Template hooks de la pagina de soluciones
 */
add_action( 'redtech_page_soluciones_content', 'redtech_solucion_portada', 0);
add_action( 'redtech_page_soluciones_content', 'redtech_solucion_beneficios', 5 );
add_action( 'redtech_soluciones_simple', 'redtech_soluciones_simple_template', 0, 1 );
/**
 * Template hooks del llamado a la accion
 */
add_action( 'accion_redtech_mp', 'llamado_accion_redtech', 0 );
?>