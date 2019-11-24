<?php session_start();
if (!isset($_SESSION) || !isset($_SESSION['nombres']) || !isset($_SESSION['apellido_paterno'])) {
    session_destroy();
    $url = constant('URL') . "main";
    echo "<script>window.location.href='" . $url . "'</script>";
} ?>


<head>
    <title>- KANUI -</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>CSS/css.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="public/js/kanuilib.js"></script>
    <script src="public/js/jquery.Jcrop.js"></script>
    <script src="public/css/css.css"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    
    <script>
        function off_session() {
            var url = "<?php echo constant('URL') ?>main/cerrar_session";
            $.ajax({
                url: url,
                type: 'post',
                success: function() {
                    Swal.fire({
                        title: "Sesión cerrada con éxito",
                        text: 'Vuelve pronto',
                        type: 'info'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "<?php echo constant('URL') ?>main";
                        }
                    })
                },
                error: function() {
                    alert("error");
                }
            });

        }

        jQuery(function($) {

            $(".sidebar-dropdown > a").click(function() {
                $(".sidebar-submenu").slideUp(200);
                if (
                    $(this)
                    .parent()
                    .hasClass("active")
                ) {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .parent()
                        .removeClass("active");
                } else {
                    $(".sidebar-dropdown").removeClass("active");
                    $(this)
                        .next(".sidebar-submenu")
                        .slideDown(200);
                    $(this)
                        .parent()
                        .addClass("active");
                }
            });

            $("#close-sidebar").click(function() {
                console.log("asdasd");
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });
        });

        $(document).ready(function() {
            $("#notificationLink").click(function() {
                $("#notificationContainer").fadeToggle(300);
                $("#notification_count").fadeOut("slow");
                return false;
            });

            //Document Click hiding the popup 
            $(document).click(function() {
                $("#notificationContainer").hide();
            });

            //Popup on click
            $("#notificationContainer").click(function() {
                return false;
            });

        });
    </script>
</head>

<style>
    #close-sidebar{
        display: none;
    }
    main{
        font-family: 'Roboto', sans-serif;
    }
    
    body{
        font-family: 'Roboto', sans-serif;
    }

    /*estilos para sidemenu*/

    @keyframes swing {
        0% {
            transform: rotate(0deg);
        }

        10% {
            transform: rotate(10deg);
        }

        30% {
            transform: rotate(0deg);
        }

        40% {
            transform: rotate(-10deg);
        }

        50% {
            transform: rotate(0deg);
        }

        60% {
            transform: rotate(5deg);
        }

        70% {
            transform: rotate(0deg);
        }

        80% {
            transform: rotate(-5deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    @keyframes sonar {
        0% {
            transform: scale(0.9);
            opacity: 1;
        }

        100% {
            transform: scale(2);
            opacity: 0;
        }
    }

    body {
        font-size: 0.9rem;
    }

    .page-wrapper .sidebar-wrapper,
    .sidebar-wrapper .sidebar-brand>a,
    .sidebar-wrapper .sidebar-dropdown>a:after,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
    .sidebar-wrapper ul li a i,
    .page-wrapper .page-content,
    .sidebar-wrapper .sidebar-search input.search-menu,
    .sidebar-wrapper .sidebar-search .input-group-text,
    .sidebar-wrapper .sidebar-menu ul li a,
    #show-sidebar,
    #close-sidebar {
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    

    /*----------------page-wrapper----------------*/

    .page-wrapper {
        height: 100vh;
    }

    .page-wrapper .theme {
        width: 40px;
        height: 40px;
        display: inline-block;
        border-radius: 4px;
        margin: 2px;
    }

    .page-wrapper .theme.chiller-theme {
        background: #1e2229;
    }

    /*----------------toggeled sidebar----------------*/

    .page-wrapper.toggled .sidebar-wrapper {
        left: 0px;
    }

    @media screen and (min-width: 768px) {
        .page-wrapper.toggled .page-content {
            padding-left: 300px;
        }
    }


    @media screen and (max-width: 768px) {
        #close-sidebar{
        display: block;
    }
    }

    /*----------------show sidebar button----------------*/
    #show-sidebar {
        position: fixed;
        left: 0;
        top: 10px;
        border-radius: 0 4px 4px 0px;
        width: 35px;
        transition-delay: 0.3s;
    }

    .page-wrapper.toggled #show-sidebar {
        left: -40px;
    }

    /*----------------sidebar-wrapper----------------*/

    .sidebar-wrapper {
        width: 260px;
        height: 100%;
        max-height: 100%;
        position: fixed;
        top: 0;
        left: -300px;
        z-index: 999;
        -webkit-box-shadow: 18px 0px 11px -13px rgba(0,0,0,0.41);
-moz-box-shadow: 18px 0px 11px -13px rgba(0,0,0,0.41);
box-shadow: 18px 0px 11px -13px rgba(0,0,0,0.41);
    }

    .sidebar-wrapper ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-wrapper a {
        text-decoration: none;
    }

    /*----------------sidebar-content----------------*/

    .sidebar-content {
        max-height: calc(100% - 30px);
        height: calc(100% - 30px);
        overflow-y: auto;
        position: relative;
        -
    }

    .sidebar-content.desktop {
        overflow-y: hidden;
    }

    /*--------------------sidebar-brand----------------------*/

    .sidebar-wrapper .sidebar-brand {
        padding: 10px 20px;
        display: flex;
        align-items: center;
    }

    .sidebar-wrapper .sidebar-brand>a {
        text-transform: uppercase;
        font-weight: bold;
        flex-grow: 1;
    }

    .sidebar-wrapper .sidebar-brand #close-sidebar {
        cursor: pointer;
        font-size: 20px;
    }

    /*--------------------sidebar-header----------------------*/

    .sidebar-wrapper .sidebar-header {
        padding: 20px;
        overflow: hidden;
    }

    .sidebar-wrapper .sidebar-header .user-pic {
        float: left;
        width: 60px;
        padding: 2px;
        border-radius: 12px;
        margin-right: 15px;
        overflow: hidden;
    }

    .sidebar-wrapper .sidebar-header .user-pic img {
        object-fit: cover;
        /*height: 100%;*/
        width: 100%;
    }

    .sidebar-wrapper .sidebar-header .user-info {
        float: left;
    }

    .sidebar-wrapper .sidebar-header .user-info>span {
        display: block;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-role {
        font-size: 12px;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-status {
        font-size: 11px;
        margin-top: 4px;
    }

    .sidebar-wrapper .sidebar-header .user-info .user-status i {
        font-size: 8px;
        margin-right: 4px;
        color: #5cb85c;
    }

    /*-----------------------sidebar-search------------------------*/

    .sidebar-wrapper .sidebar-search>div {
        padding: 10px 20px;
    }

    /*----------------------sidebar-menu-------------------------*/

    .sidebar-wrapper .sidebar-menu {
        padding-bottom: 10px;
    }

    .sidebar-wrapper .sidebar-menu .header-menu span {
        font-weight: bold;
        font-size: 14px;
        padding: 15px 20px 5px 20px;
        display: inline-block;
    }

    .sidebar-wrapper .sidebar-menu ul li a {
        display: inline-block;
        width: 100%;
        text-decoration: none;
        position: relative;
        padding: 8px 30px 8px 20px;
    }

    .sidebar-wrapper .sidebar-menu ul li a i {
        margin-right: 10px;
        font-size: 12px;
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        border-radius: 4px;
    }

    .sidebar-wrapper .sidebar-menu ul li a:hover>i::before {
        display: inline-block;
        animation: swing ease-in-out 0.5s 1 alternate;
    }

    /*.sidebar-wrapper .sidebar-menu .sidebar-dropdown>a:after {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f105";
        font-style: normal;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        background: 0 0;
        position: absolute;
        right: 15px;
        top: 14px;
    }*/

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
        padding: 5px 0;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
        padding-left: 25px;
        font-size: 13px;
    }
/*
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
        content: "\f111";
        font-family: "Font Awesome 5 Free";
        font-weight: 400;
        font-style: normal;
        display: inline-block;
        text-align: center;
        text-decoration: none;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        margin-right: 10px;
        font-size: 8px;
    }*/

    .sidebar-wrapper .sidebar-menu ul li a span.label,
    .sidebar-wrapper .sidebar-menu ul li a span.badge {
        float: right;
        margin-top: 8px;
        margin-left: 5px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
    .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
        float: right;
        margin-top: 0px;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-submenu {
        display: none;
    }

    .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a:after {
        transform: rotate(90deg);
        right: 17px;
    }

    /*--------------------------side-footer------------------------------*/

    .sidebar-footer {
        position: absolute;
        width: 100%;
        bottom: 0;
        display: flex;
    }

    .sidebar-footer>a {
        flex-grow: 1;
        text-align: center;
        height: 30px;
        line-height: 30px;
        position: relative;
    }

    .sidebar-footer>a .notification {
        position: absolute;
        top: 0;
    }

    .badge-sonar {
        display: inline-block;
        background: #980303;
        border-radius: 50%;
        height: 8px;
        width: 8px;
        position: absolute;
        top: 0;
    }

    .badge-sonar:after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        border: 2px solid #980303;
        opacity: 0;
        border-radius: 50%;
        width: 100%;
        height: 100%;
        animation: sonar 1.5s infinite;
    }

    /*--------------------------page-content-----------------------------*/

    .page-wrapper .page-content {
        display: inline-block;
        width: 100%;
        padding-left: 0px;
        padding-top: 20px;
    }

    .page-wrapper .page-content>div {
        padding: 20px 40px;
    }

    .page-wrapper .page-content {
        overflow-x: hidden;
    }

    /*------scroll bar---------------------*/

    ::-webkit-scrollbar {
        width: 5px;
        height: 7px;
    }

    ::-webkit-scrollbar-button {
        width: 0px;
        height: 0px;
    }

    ::-webkit-scrollbar-thumb {
        background: #525965;
        border: 0px none #ffffff;
        border-radius: 0px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #525965;
    }

    ::-webkit-scrollbar-thumb:active {
        background: #525965;
    }

    ::-webkit-scrollbar-track {
        background: transparent;
        border: 0px none #ffffff;
        border-radius: 50px;
    }

    ::-webkit-scrollbar-track:hover {
        background: transparent;
    }

    ::-webkit-scrollbar-track:active {
        background: transparent;
    }

    ::-webkit-scrollbar-corner {
        background: transparent;
    }


    /*-----------------------------chiller-theme-------------------------------------------------*/

    .chiller-theme .sidebar-wrapper {
        background: #059485;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header,
    .chiller-theme .sidebar-wrapper .sidebar-search,
    .chiller-theme .sidebar-wrapper .sidebar-menu {
        border-top: 1px solid #ee9d08;
    }

    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        border-color: transparent;
        box-shadow: none;
    }

    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
    .chiller-theme .sidebar-wrapper .sidebar-brand>a,
    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
    .chiller-theme .sidebar-footer>a {
        color: #fff;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
    .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
    .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
    .chiller-theme .sidebar-footer>a:hover i {
        color: #fff;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar {
        color: #bdbdbd;
    }

    .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
        color: #ffffff;
    }

    .chiller-theme .sidebar-wrapper ul li:hover a i,
    .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
        color: #16c7ff;
        text-shadow: 0px 0px 10px rgba(22, 199, 255, 0.5);
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
    .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
    .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
    .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
        background: #ee9d08;
    }

    .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
        color: #fff;
    }

    .chiller-theme .sidebar-footer {
        background: #ee9d08;
        box-shadow: 0px -1px 5px #282c33;
        border-top: 1px solid #464a52;
    }

    .chiller-theme .sidebar-footer>a:first-child {
        border-left: none;
    }

    .chiller-theme .sidebar-footer>a:last-child {
        border-right: none;
    }

    /* tooltip */
    #notification_li {
        position: relative
    }

    #notificationContainer {
        background-color: #fff;
        border: 1px solid rgba(100, 100, 100, .4);
        -webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
        overflow: visible;
        position: absolute;
        top: 130px;
        /*margin-left: -170px;*/
        width: 150px;
        z-index: 99;
        display: none;  
    }

    #notificationContainer :before {
        content: '';
        display: block;
        position: absolute;
        width: 0;
        height: 0;
        color: transparent;
        border: 10px solid black;
        border-color: transparent transparent white;
        margin-top: -20px;
        margin-left: 188px;
    }

    #notificationTitle {
        color:#059485;
        font-weight: bold;
        padding: 8px;
        font-size: 13px;
        background-color: #ffffff;
        position: fixed;
        z-index: 1000;
        width: 144px;
        border-bottom: 1px solid #dddddd;
    }

    #notificationsBody {
        padding: 33px 0px 0px 0px !important;
        min-height: 100px;
    }

    #notificationFooter {
        background-color: #e9eaed;
        text-align: center;
        font-weight: bold;
        padding: 8px;
        font-size: 12px;
        border-top: 1px solid #dddddd;
    }

    /**/
select{
    border-radius: 7px;
    color: black;
}

</style>

<div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm" href="#" style="background-color: #059485;" >
        <img src="https://img.icons8.com/material-outlined/24/000000/right.png">
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-brand">
                <img src="<?php echo constant('URL') ?>public/img/logo-2kanui.png" width="200" >
                <!--<a href="#">KANUI</a>-->
                <div id="close-sidebar">
                    <img src="https://img.icons8.com/material-outlined/24/000000/double-left.png">
                </div>
            </div>
            <div class="sidebar-header">
                <div class="user-pic">
                <?php
                if($_SESSION['perfil'] !== null && $_SESSION['perfil'] !== ''){
                    echo '<img class="img-responsive img-rounded" src='.$_SESSION['perfil'].' alt="User picture">';
                }else{
                    echo '<img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">';
                } 
                
                ?>
                    </div>
                <div class="user-info">
                    <span class="user-name"><?php echo $_SESSION['nombres'] ?>
                        <strong><?php echo $_SESSION['apellido_paterno'] ?></strong>
                    </span>
                    <span class="user-role">Administrador</span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span id="notificationLink">Opciones
                            <!---Codigo de opciones tooltip---->
                            <div id="notificationContainer">
                                <div id="notificationTitle">Opciones</div>
                                <div id="notificationsBody" class="notifications">
                                    <ul>
                                        <li>
                                            <a class="nav-link" style="text-align: left" onclick="window.location ='<?php echo constant('URL') ?>usuario'" href="<?php echo constant('URL') ?>usuario">
                                            <img src="<?php echo constant('URL').'views/imagenes/iconos/prof_32px.png' ?>" width="24" > Perfil
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" style="text-align: left" href="#" onclick="off_session()">
                                            <img src="<?php echo constant('URL').'views/imagenes/iconos/Exit_32px.png' ?>" width="24"  > Cerrar sesión
                                            </a>
                                        </li>
                                    </ul>
                                    

                                </div>
                            </div>
                            <!--- --->
                        </span>
                    </span>
                </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <img src="<?php echo constant('URL').'views/imagenes/iconos/Doctors Bag_32px.png' ?>" >
                            <span>Atenciones</span>
                            <span class="badge badge-pill badge-warning">New</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    
                                    <a href="<?php echo constant('URL') ?>atencionmascota"> 
                                    <img src="<?php echo constant('URL').'views/imagenes/iconos/Stethoscope_32px.png' ?>" > 
                                    Ingreso de atención
                                        
                                    </a>
                                </li>                                
                                <li>
                                    <a href="<?php echo constant('URL') ?>historialmascota">
                                    <img src="<?php echo constant('URL').'views/imagenes/iconos/Details_32px.png' ?>" > 
                                    Historial de atención
                                    </a>
                                </li>
                                <li>
                                    
                                    <a href="#">
                                    <img src="<?php echo constant('URL').'views/imagenes/iconos/Activity History_32px.png' ?>" > 
                                    Certificados
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <img src="<?php echo constant('URL').'views/imagenes/iconos/User_32px.png' ?>" >
                            <span>Usuarios</span>
                            <span class="badge badge-pill badge-danger">3</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo constant('URL') ?>registroUsuario">
                                    <img src="<?php echo constant('URL').'views/imagenes/iconos/Add User Male_32px.png' ?>" > 
                                    Registrar usuario
                                </a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>edicionusuario">
                                    <img src="<?php echo constant('URL').'views/imagenes/iconos/Registration_32px.png' ?>" >
                                    Editar usuario</a>
                                </li>
                                <li>
                                    <a href="#">
                                    <img src="<?php echo constant('URL').'views/imagenes/iconos/Admin Settings Male_32px.png' ?>" >
                                    Configuración de usuarios</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <img src="<?php echo constant('URL').'views/imagenes/iconos/paw.png' ?>" >
                            <span>Mascotas</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo constant('URL') ?>registromascotas">Registrar mascota</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>edicionmascota">Editar mascota</a>
                                </li>
                                <li>
                                    <a href="#">Configuración mascotas</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>scaneos">Historial de escaneo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <img src="<?php echo constant('URL').'views/imagenes/iconos/paw.png' ?>" >
                            <span>Mascotas_U</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo constant('URL') ?>registromascotas/rendeUser">Mis Mascotas</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>scaneos/render_U">Historial de escaneo</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-chart-line"></i>
                            <span>Charts</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Pie chart</a>
                                </li>
                                <li>
                                    <a href="#">Line chart</a>
                                </li>
                                <li>
                                    <a href="#">Bar chart</a>
                                </li>
                                <li>
                                    <a href="#">Histogram</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fa fa-globe"></i>
                            <span>Maps</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">Google maps</a>
                                </li>
                                <li>
                                    <a href="#">Open street map</a>
                                </li>
                            </ul>
                        </div>
                    </li>
<!-------------
    Inicio Menú de Mantenedores
    12-Septiembre : Falta parametrizar por perfil de usuario
---------->
                    <li class="sidebar-dropdown">
                        <a href="#">
                            <img src="<?php echo constant('URL').'views/imagenes/iconos/Settings_32px.png' ?>" >
                            <span>Mantenedores</span>
                            <span class="badge badge-pill badge-danger">></span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="<?php echo constant('URL') ?>listatipomascota">Tipos de especies</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>listatipodocumento">Tipos de documentos</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>listatipousuario">Tipos de usuarios</a>
                                </li>    
                                <li>
                                    <a href="<?php echo constant('URL') ?>listaregion">Regiones del país</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>listacomuna">Comunas del país</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>listasexo">Sexos de especies</a>
                                </li>  
                                <li>
                                    <a href="<?php echo constant('URL') ?>listatipoanimal">Razas</a>
                                </li> 
                                <li>
                                    <a href="<?php echo constant('URL') ?>listacontroles">Tipos de controles</a>
                                </li>                                 
                                <li>
                                    <a href="<?php echo constant('URL') ?>listatipovacuna">Vacunas</a>
                                </li>
                                <li>
                                    <a href="<?php echo constant('URL') ?>listacolor">Colores de especies</a>
                                </li>                                 
                                <li>
                                    <a href="<?php echo constant('URL') ?>listapatron">Patrón del pelaje</a>
                                </li>                                 
                            </ul>
                        </div>
                    </li>
<!-------------
    Fin Menú de Mantenedores
---------->
                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Documentation</span>
                            <span class="badge badge-pill badge-primary">Beta</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Examples</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar-menu  -->
    </nav>
    <nav></nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">