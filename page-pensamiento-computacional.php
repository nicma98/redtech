<?php 
/*
    Template Name: Pagina de pensamiento computacional
*/
?>

<?php get_header(); ?>

<main class="main-content">
    <?php do_action('redtech_page_soluciones_content'); ?>
    <div class="soluciones-pc">
        <div class="content-solucion solucion-1-computo">
            <div class="sec-caracteristicas-microbit">
                <div class="title-caracteristicas">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fondo-caracteristicas-microbit.jpg" alt="">
                    <h1>BBC micro:bit</h1>
                </div>
                <div class="caracteristicas-content">
                    <div class="tags-caracteristicas">
                        <div class="btn-caracteristica">INTRODUCCIÓN</div>
                        <div class="btn-caracteristica">ORIGEN</div>
                        <div class="btn-caracteristica">HARDWARE</div>
                        <div class="btn-caracteristica">PROGRAMACIÓN</div>
                        <div class="gif-microbit">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/micro-bit-gif.gif" alt="gif-microbit">
                        </div>
                    </div>
                    <div class="panel-caracteristicas">
                        <div class="caract-1 caracteristica-microbit">
                            <div class="video-caract-microbit">
                                <div class="iframe-responsive">
                                    <iframe src="https://www.youtube.com/embed/oNLf6aFYVoU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="content-section-caracteristica">
                                <h2>INTRODUCCIÓN</h2>
                                <div class="justify text-solucion">
                                    <p>BBC micro: bit es una pequeña tarjeta programable de 4x5 cm diseñada para que aprender a programar sea fácil, divertido y al alcance de todos. Gracias a la gran cantidad de sensores que incorpora, sólo con la tarjeta se pueden llevar a cabo centenares de proyectos. BBC micro: bit también es una plataforma IoT (Internet of Things), lo que la hace muy interesante para usuarios avanzados. Y es Open Source, por supuesto. Tanto el hardware como el software de “micro:bit” es de código abierto.</p>
                                </div>
                            </div>
                        </div>
                        <div class="caract-2 caracteristica-microbit hide-item">
                            <div class="content-section-caracteristica">
                                <h2>ORIGEN</h2>
                                <div class="justify">
                                    <p>La micro:bit es una iniciativa lanzada en 2012 por la BBC (British Broadcasting Corporation) en Reino Unido como parte de un “Programa de Alfabetización Informática”. Esta iniciativa conto con la colaboración de varias compañías tecnológicas para enseñar a niños -y, sobre todo, niñas- de Reino Unido a programar.</p>
                                    <p>Tras el éxito que obtuvo la tarjeta BBC micro:bit en Reino Unido, se fundó en 2016 la Fundación Educativa Micro:bit con el apoyo de empresas tecnológicas de la talla de Amazon, Microsoft, Cisco o Samsung entre otras.</p>
                                </div>
                            </div>
                        </div>
                        <div class="caract-3 caracteristica-microbit hide-item">
                            <div class="content-section-caracteristica">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/microbit-hardware.gif" alt="Hardware-microbit">
                                <h2>HARDWARE</h2>
                                <p>El hardware de la BBC micro:bit incluye las siguientes caracteristicas:</p>
                                <ul class="list">
                                    <li>Matriz de 25 leds</li>
                                    <li>2 botones</li>
                                    <li>Pernos de conexión física</li>
                                    <li>Sensores de luz y temperatura</li>
                                    <li>Sensores de movimiento ( acelerómetro y brújula)</li>
                                    <li>Comunicación inalámbrica, vía Radio y Bluetooth</li>
                                    <li>Interfaz de USB</li>
                                    <li>Conector para batería</li>
                                    <li>25 pines para conectar sensores y actuadores</li>
                                    <li>Procesador ARM Cortex-M0 de 32-bits</li>
                                    <li>Memoria flash de 256 KB</li>
                                    <li>Memoria RAM 16 KB</li>
                                </ul>
                            </div>
                        </div>
                        <div class="caract-4 caracteristica-microbit hide-item">
                            <div class="video-caract-microbit">
                                <div class="iframe-responsive">
                                    <iframe src="https://www.youtube.com/embed/-FZ8yTnoozY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="content-section-caracteristica">
                                <h2>PROGRAMACION</h2>
                                <div class="justify">
                                    <p>La programación por bloques implica el uso de piezas pre diseñadas (como en un rompecabezas) de forma tal que se genere una lista de pasos o acciones a seguir para solucionar un problema planteado o creado por el mismo usuario. Es una manera práctica y visual de programar en entornos gráficos.<br>Los estudiantes, desde muy temprana edad, están en condiciones de manipular estos bloques generando programas: diseñando, depurando y enfrentándose a nuevos retos.<br>La BBC micro:bit se puede programar en JavaScript y Python:</p>
                                </div>
                                <div class="title-caracteristica-program">
                                    <h3>MAKECODE</h3>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fondo-makecode.jpg" alt="">
                                </div>
                                <div class="justify">
                                    <p>Microsoft MakeCode es una plataforma gratuita de código abierto para la creación de experiencias atractivas de aprendizaje de la informática que ayudan a progresar hacia la programación real. Con esta plataforma es posible programar la BBC micro:bit haciendo uso de la metodología de programación con bloques, esta plataforma tiene un simulador en línea para la depuración de código y la facilidad de integrar distintas librerías (bluetooth, radio, sonar, etc) que promueven la creación de proyectos cada vez más complejos, desde esta plataforma se exporta el código depurado en la extensión de archivo que requiere la BBC micro:bit.</p>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/javascript-editor.png" alt="">
                                <div class="link-caract">
                                    <a href="https://makecode.microbit.org/#editor">
                                        <span>LINK MAKECODE</span>
                                    </a>
                                </div>
                                <div class="title-caracteristica-program">
                                    <h3>PYTHON</h3>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/fondo-python.jpg" alt="">
                                </div>
                                <div class="justify">
                                    <p>El editor de Python basado en texto es perfecto para aquellos que quieran impulsar sus habilidades de programación aún más. Una selección de fragmentos de código y una galería de imágenes y música disponibles ayudan con el código. Desarrollado por la comunidad global de Python.</p>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/python-editor.png" alt="">
                                <div class="link-caract">
                                    <a href="https://python.microbit.org/editor.html">
                                        <span>LINK PYTHON</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php do_action('redtech_soluciones_simple', 'soluciones_pc_post'); ?>
    </div>
</main>

<?php get_footer(); ?>