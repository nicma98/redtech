<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <header id="header-site" class="site-header">
        <div class="contenedor-header">
            <div class="barra-navegacion">
                <?php
                
                /**
                 * Ejecutar action redtech_header_content_site
                 * 
                 * @hook redtech_custom_logo_theme - 10
                 */

                do_action('redtech_header_content_site');

                ?>
            </div>
        </div>
    </header>