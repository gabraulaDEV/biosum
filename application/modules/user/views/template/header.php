<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Biosuministros</title>
  <link rel="shortcut icon" type="image/x-icon" href=<?php echo base_url()."assets/images/icon.ico"; ?> />
  <link rel="stylesheet" href=<?php echo base_url()."assets/user/css/components.css";?>>
  <link rel="stylesheet" href="<?php echo asset_url_home();?>/css/icons.css">
  <link rel="stylesheet" href="<?php echo asset_url_home();?>/css/responsee.css">
  <link rel="stylesheet" href="<?php echo asset_url_home();?>/owl-carousel/owl.carousel.css">
  <link rel="stylesheet" href="<?php echo asset_url_home();?>/owl-carousel/owl.theme.css">
  <link href="<?php echo asset_url_home();?>/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="<?php echo asset_url_home();?>/css/template-style.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

  <script type="text/javascript" src="<?php echo asset_url_home();?>/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="<?php echo asset_url_home();?>/js/jquery-ui.min.js"></script>    
  <script type="text/javascript" src="<?php echo asset_url_home();?>/js/validation.js"></script> 
  <script src="<?php echo asset_url_home();?>/js/bootstrap.min.js"></script>

</head>  

<body class="size-1140">
 <!-- PREMIUM FEATURES BUTTON -->
 <a target="_blank" class="hide-s" href="https://api.whatsapp.com/send?phone=15551234567" style="position:fixed;top:120px;right:-5px;z-index:10; width: 50px;"><img src="<?php echo asset_url_home();?>/img/ws.png" alt="Whatsapp" style="border-top-left-radius:30px;border-bottom-left-radius:30px;"></a>
 <!-- HEADER -->
 <header role="banner">    
  <!-- Top Bar -->
  <div class="top-bar background-white">
    <div class="line">
      <div class="s-12 m-6 l-6">
        <div class="top-bar-contact">
        </div>
      </div>
      <div class="s-12 m-6 l-6">
            <!--
            <div class="right">
              <ul class="top-bar-social right">
                <li><a href="/"><i class="icon-facebook_circle text-orange-hover"></i></a></li>
                <li><a href="/"><i class="icon-twitter_circle text-orange-hover"></i></a> </li>
                <li><a href="/"><i class="icon-google_plus_circle text-orange-hover"></i></a></li>
                <li><a href="/"><i class="icon-instagram_circle text-orange-hover"></i></a></li>
              </ul>
            </div>
          -->
        </div>
      </div>
    </div>
    
    <!-- Top Navigation -->
    <nav class="background-white background-primary-hightlight">
      <div class="line">
        <div class="s-12 l-2">
          <a href="#" class="logo"><img src="<?php echo asset_url();?>images/logo.png" alt=""></a>
        </div>
        <div class="top-nav s-12 l-10">
          <p class="nav-text"></p>
          <ul class="right chevron">
            <li><a href="<?php echo base_url();?>index.php/user/index">Inicio</a></li>
            <li><a href="<?php echo base_url();?>index.php/user/products">Productos</a></li>
             <!-- <li><a>Services</a>
                <ul>
                  <li><a>Service 1</a>
                    <ul>
                      <li><a>Service 1 A</a></li>
                      <li><a>Service 1 B</a></li>
                    </ul>
                  </li>
                  <li><a>Service 2</a></li>
                </ul>
              </li> -->
              <li><a href="<?php echo base_url();?>index.php/user/index#contactoAsesor">Contacto</a></li>
            </ul>
          </div>
        </div>
      </nav>


      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/user/index">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>index.php/user/products">Productos <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cart.html">Carrito</a>
              </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Buscar un producto..">
                <div class="input-group-append">
                  <button type="button" class="btn btn-secondary btn-number">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
              <a class="btn btn-success btn-sm ml-3" href="cart.html">
                <i class="fa fa-shopping-cart"></i> Carrito
                <span class="badge badge-light">0</span>
              </a>
            </form>
          </div>
        </div>
      </nav>
    </header>