<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- PAGE TITLE -->
    <title>Comunicando</title>

    <!-- FAVICON AND APPLE TOUCHSCREEN ICONS -->
    <link rel="shortcut icon" href="{{ asset('home/css/normalize.css') }}images/favicon.ico">
    <link rel="apple-touch-icon" href="{{ asset('home/css/normalize.css') }}images/apple-touch-icon.png">

    <!-- **********************************
            	STYLESHEETS
    *********************************** -->

    <!-- DEFAULT AND BOOTSTRAP STYLESHEET -->
    <link rel="stylesheet" href="{{ asset('home/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">

    <!-- GOOGLE WEBFONT  -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:600,700,400,300' rel='stylesheet' type='text/css'>

    <!-- FONT ICONS -->
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/justicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/simple-line-icons.css') }}" />

    <!-- PLUGINS DEFAULT STYSHEETS-->
    <link rel="stylesheet" href="{{ asset('home/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/slider-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/animate.css') }}">

    <!-- MAIN STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset('home/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('home/css/orange.css') }}" />


    <!--[if lt IE 9]>
    <script src="{{ asset('home/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('home/js/respond.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/js/selectivizr-min.js') }}"></script>
    <script src="http://s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
</head>

<body>


<!-- **************************************
                Header
*************************************** -->
<header>
    <!-- Navigation Menu start-->
    <nav class="navbar arvin-main-menu" role="navigation">
        <div class="container">

            <!-- Navbar Toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>



            </div>

            <!-- navbar-collapse start-->
            <div id="nav-menu" class="navbar-collapse collapse" role="navigation">
                <ul class="nav navbar-nav arvin-menu-wrapper">
                    <li class="active">
                        <a href="#arvin-slider">Inicio</a>
                    </li>
                    <li>
                        <a href="#about">Acerca de</a>
                    </li>
                    <li>
                        <a href="#features">Caracteristicas</a>
                    </li>

                    <li>
                        <a href="#objetivo">Nuestro Objetivo</a>
                    </li>
                    <li>
                        <a href="#diferencia">Diferencia</a>
                    </li>

                    <li>
                        <a href="#contact">Contactenos</a>
                    </li>

                    <li>
                        <a href="/login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- navbar-collapse end-->

        </div>
    </nav>
    <!-- Navigation Menu end-->
</header>
<!-- Header End -->



<section class="slider-pro arvin-slider" id="arvin-slider">
    <div class="sp-slides">


        <!-- Slides -->
        <div class="sp-slide arvin-main-slides">
            <div class="arvin-img-overlay"></div>
            <img class="sp-image" src="{{ asset('home/images/banners/01.png') }}" alt="Slider 1"/>

            <h1 class="sp-layer arvin-slider-text-big"
                data-position="center" data-show-transition="down" data-hide-transition="up" data-show-delay="1500" data-hide-delay="200000">
                <span class="arvin-highlight-text">
                    <img  src="{{ asset('home/images/banners/logo.png') }}" style="width: 50%;margin: 0 auto;display: -webkit-box;"/>

                </span>
                <br><br>
            </h1>

            <p class="sp-layer"
               data-position="center" data-vertical="15%" data-show-delay="2000" data-hide-delay="200000" data-show-transition="up" data-hide-transition="down">
                Algo nuevo esta por suceder en los conjuntos residenciales!
            </p>
        </div>


    </div>
</section>
<!-- Arvin Main Slider End -->

<!-- **************************************
                About Section
*************************************** -->
<section id="about" class="arvin-section-wrapper">
    <div class="container">
        <div class="row">

            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 arvin-section-header wow fadeInDown">
                <h1> <span class="arvin-highlight-text">COMUNICANDO</span></h1>
                <div class="arvin-section-divider"></div>
                <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">
                    Comunicando es una plataforma tecnologica que permite solucionar los graves problemas de comunicacion que se presentan entre la administracion de los conjuntos residenciales y los habitantes de la propiedad horizontal

                </p>
            </div>
            <!-- Section Header End -->

            <!-- What We Do -->
            <div class="arvin-what-we-do">

                <div class="col-md-3 col-sm-3 col-xs-12 arvin-blurb-round-icon wow bounceInLeft">
                    <div class="arvin-icon">
                        <i class="fa fa-desktop"></i>
                    </div>
                    <h3>PLATAFORMA WEB</h3>
                    <p>Ofrecemos multiples opciones para que puedas tener la informacion a tan solo un click, estamos en todos los dispositivos y plataformas web</p>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 arvin-blurb-round-icon wow bounceIn" data-wow-delay=".5s">
                    <div class="arvin-icon">
                        <i class="fa fa-mobile"></i>
                    </div>
                    <h3>APP MOVIL</h3>
                    <p>¿Tienes smartphone? ¿iPhone? Ahora puedes estar aun mas conectado con comunicando y tener notificaciones, mensajes, publicidad en tiempo real </p>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 arvin-blurb-round-icon wow bounceIn" data-wow-delay=".5s">
                    <div class="arvin-icon">
                        <i class="icon-heart"></i>
                    </div>
                    <h3>DISEÑO</h3>
                    <p>Un diseño agradable y adaptable hace todo mas facil! Asi somos, tenemos toda la informacion a la mano con el mejor concepto y diseño para tu conjunto.</p>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 arvin-blurb-round-icon wow bounceInRight" data-wow-delay=".5s">
                    <div class="arvin-icon">
                        <i class="fa fa-rocket"></i>
                    </div>
                    <h3>CLOUD</h3>
                    <p>Con comunicando podras tener toda la informacion en una sola cuenta en cualquier parte, tenemos la informacion en tiempo real donde quiera que estes.</p>
                </div>

            </div>
            <!-- What We Do End -->

        </div>
    </div>
</section>
<!-- About Section End -->


<!-- **************************************
                Featuers Section
*************************************** -->
<section id="features" class="arvin-section-wrapper arvin-features-section" data-stellar-background-ratio="0.5">
    <div class="arvin-parallax-overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 arvin-section-header arvin-section-header-parallax wow fadeInDown">
                <h1>NUESTRAS<span class="arvin-highlight-text"> CARACTERISTICAS </span> </h1>
                <div class="arvin-section-divider"></div>
                <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">
                    Comunicando desea ofrecerte las mejores caracteristicas para que estes conectado y recibas la mejor
                    informacion en tiempo real y puedas estar comunicado.
                </p>
            </div>
            <!-- Section Header End -->

            <!-- Features -->
            <div class="arvin-features">
                <div class="col-md-4 col-sm-4 col-xs-12 wow bounceInLeft">

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-database"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Base de datos</h3>
                            <p>Tu informacion estara segura en nuestras bases de datos.</p>
                        </div>
                    </div>

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="icon-screen-smartphone"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Aplicacion Movil</h3>
                            <p>Descarga la app e interactua en cualquier lugar.</p>
                        </div>
                    </div>

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="icon-pencil"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Escribe!</h3>
                            <p>Puedes dejar tus mensajes al administrador en tiempo real.</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s">

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-cloud"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Informacion</h3>
                            <p>Ahora tu informacion esta segura por nosotros en la nube.</p>
                        </div>
                    </div>

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-cubes"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Multi Plataforma</h3>
                            <p>Comunicando te ofrece multiples opciones para que estes conectado.</p>
                        </div>
                    </div>

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-exclamation-circle"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Notificaciones</h3>
                            <p>Ahora tendras notificaciones en tiempo real en multiples plataformas</p>
                        </div>
                    </div>

                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 wow bounceInRight">

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-user"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Perfil</h3>
                            <p>Puedes tener tu propio perfil con informacion actualizada.</p>
                        </div>
                    </div>

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-bullhorn"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Publicidad</h3>
                            <p>Podras recibir publicidad interesante de tu centro comercial mas cercano.</p>
                        </div>
                    </div>

                    <div class="arvin-blurb-icon-left-square">
                        <div class="arvin-icon">
                            <i class="fa fa-refresh"></i>
                        </div>

                        <div class="arvin-blurb-text">
                            <h3>Actualizaciones</h3>
                            <p>Tendras soporte continuo y actualizaciones que te permitiran disfrutar de comunicando.</p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Features End -->

        </div>
    </div>
</section>
<!-- Featuers Section End -->


<!-- **************************************
                Skill Section
*************************************** -->
<section class="arvin-our-skills arvin-section-wrapper" id="objetivo">
    <div class="container">
        <div class="row">

            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 arvin-section-header wow fadeInDown">
                <h1>NUESTRO <span class="arvin-highlight-text">OBJETIVO</span></h1>
                <div class="arvin-section-divider"></div>
            </div>
            <!-- Section Header End -->

            <!-- Skills -->
            <div class="arvin-skills-wrapper">

                <img class="sp-image" src="{{ asset('home/images/aplicativo.png') }}" style="margin: 0 auto;display: -moz-box;" alt="Objetivo"/>
            </div>
            <!-- Skills End -->
        </div>
    </div>
</section>
<!-- Skill seciton End -->

<!-- **************************************
            Custom Section
*************************************** -->
<section class="arvin-custom-sec arvin-section-wrapper" id="diferencia">
    <div class="container">
        <div class="row">

            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 arvin-section-header wow fadeInDown">
                <h1>PORQUE <span class="arvin-highlight-text">COMUNICANDO </span>ES DIFERENTE</h1>
                <div class="arvin-section-divider"></div>
                <p class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1">
                    Comunicando es una plataforma tecnologica que va a solucionar los problemas de comunicacion interna
                    entre la administracion y los residentes de los conjuntos.
                </p>
            </div>
            <!-- Section Header End -->

            <div class="col-md-6 col-sm-6 col-xs-12 arvin-custom-sec-img wow bounceInLeft">
                <img src="{{ asset('home/images/single-img-describe.jpg') }}" alt="Custom Image">
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 arvin-custom-sec-text wow bounceInRight">

                <h3>Somos el camino ideal para estar conectados, llevamos la informacion en el momento Ideal</h3>

                <p>
                    Ahora cada conjunto residencial va a contar con su aplicativo movil personalizado.
                    El 70% de los habitantes de un conjunto residencial no lee las carteleras informativas de la
                    propiedad horizontal. Con comunicando los residentes van a recibir esta informacion directamente
                    y en tiempo real en diferentes plataformas.
                </p>

                <ul>
                    <li><i class="icon-fire"></i>Comunicando esta para las plataformas iOS - Android</li>
                    <li><i class="icon-fire"></i>Puedes acceder desde tu dispositivo movil o via web</li>
                    <li><i class="icon-fire"></i>Tienes notificaciones en tiempo real</li>
                    <li><i class="icon-fire"></i>Anuncion, publicidad, mensajes y mucho mas!</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Custom Section End -->



<!-- **************************************
            Call To Action
*************************************** -->
<section class="arvin-cta-2">
    <div class="container">
        <div class="row">
            <div class="arvin-cta-2-wrapper">
                <h1 class="wow fadeInDown">Si deseas recibir mas informacion acerca de nuestros servicios y actualizaciones, Suscribete!</h1>
                <a href="#" class="arvin-btn-round wow bounceIn">Suscribirse</a>
            </div>
        </div>
    </div>
</section>
<!-- Call To Action 2 End -->

<!-- **************************************
            Contact Section
*************************************** -->
<section id="contact" class="arvin-section-wrapper arvin-contact-section" data-stellar-background-ratio="0.5">
    <div class="arvin-parallax-overlay"></div>
    <div class="container">
        <div class="row">

            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 arvin-section-header wow fadeInDown arvin-section-header-parallax">
                <h1>CONTACTENOS- <span class="arvin-highlight-text">DEJA TU MENSAJE!</h1>
                <div class="arvin-section-divider"></div>
            </div>
            <!-- Section Header End -->

            <div class="arvin-contact-details">

                <!-- Address Area -->
                <div class="col-md-5 col-sm-4 col-xs-12 arvin-contact-address wow bounceInLeft">
                    <p>
                        Dejanos tu mensaje y pronto estaremos en contacto dispuestos a llevarte a conocer la mejor experiencia en comunicacion
                        para los conjuntos residenciales!   Equipo Comunicando.
                    </p>
                    <ul>

                        <li class="arvin-phone"><i class="fa fa-phone"></i>+57 (1) 3208008015</li>
                        <li class="arvin-phone"><i class="fa fa-phone"></i>+57 (1) 3185432559</li>
                        <li class="arvin-phone"><i class="fa fa-phone"></i>+57 - 5236392</li>
                        <li class="arvin-email"><i class="fa fa-envelope-o"></i>info@comunicandocolombia.com</li>
                        <li class="arvin-web"><i class="fa  fa-globe"></i>www.comunicandocolombia.com</li>
                    </ul>
                </div>

                <!-- Address Area End -->

                <!-- Contact Form -->
                <div class="col-md-7 col-sm-8 col-xs-12 arvin-contact-form wow bounceInRight">
                    <div id="contact-result"></div>
                    <div id="contact-form">
                        <div class="arvin-input-name arvin-input-fields">
                            <label for="name">Name*</label>
                            <input type="text" name="name" id="name" required>
                        </div>

                        <div class="arvin-input-email arvin-input-fields">
                            <label for="email">Email*</label>
                            <input type="email" name="email" id="email" required>
                        </div>

                        <div class="arvin-input-message arvin-input-fields">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10"></textarea>
                        </div>

                        <input type="submit" value="SEND MESSAGE" id="submit-btn">
                    </div>
                </div>
                <!-- Contact Form End -->

            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->





<!-- **************************************
             Footer Section
 *************************************** -->
<footer>
    <div class="container">
        <div class="row">
            <div class="arvin-footer-content">

                <div class="arvin-footer-logo wow bounceIn" data-wow-offset="0">

                </div>

                <p class="arvin-copyright-info">©2015 Todos los derechos reservados - Comunicando</p>
                <p class="arvin-copyright-info">Bogota - Colombia</p>

                <ul class="arvin-footer-social-info">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->



<!-- *******************************
            SCRIPTS
************************************ -->
<!-- MODERNIZR -->
<script src="{{ asset('home/js/modernizr-2.7.2.min.js') }}"></script>

<!-- JQUERY -->
<script src="{{ asset('home/js/jquery-1.11.2.min.js') }}"></script>


<!-- BOOTSTRAP SCRIPTS -->
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>

<!-- CUSTOM SCRIPTS & PLUGINS-->
<script src="{{ asset('home/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('home/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('home/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.sliderPro.min.js') }}"></script>
<script src="{{ asset('home/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('home/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('home/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('home/js/jflickrfeed.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.fitvids.js') }}"></script>
<script src="{{ asset('home/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('home/js/wow.min.js') }}"></script>
<script src="{{ asset('home/js/jquery.nav.js') }}"></script>
<script src="{{ asset('home/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('home/js/mediaelement-and-player.min.js') }}"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{ asset('home/js/google-map-init.js') }}"></script>

<script src="{{ asset('home/js/custom.js') }}"></script>

</body>
</html>
