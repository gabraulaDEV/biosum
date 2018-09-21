<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body> 
    <!-- Left column -->
    <div class="templatemo-flex-row">
      <div class="templatemo-sidebar">
        <header class="templatemo-site-header">
          <h1>Administración</h1>
        </header>
        <div class="profile-photo-container">
          <img src= <?php echo base_url()."assets/images/logo.png"; ?> alt="Biosuministros" width="100%" class="img-responsive">  
          <div class="profile-photo-overlay"></div>
        </div>      
        <!-- Search box -->
        <!--
        <form class="templatemo-search-form" role="search">
          
          <div class="input-group">
              <button type="submit" class="fa fa-search"></button>
              <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">           
          </div>

        </form>
        -->
        <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="templatemo-left-nav">  
       <!--Font awesome icons fa fa-home fa-fw at https://fontawesome.com/v4.7.0/icons/-->        
          <ul>
            <li><a href= <?php echo base_url().index_page()."/adminPanel/home "; if($active=='welcome'){echo "class='active'";}?> ><i class="fa fa-home fa-fw"></i>Inicio</a></li>
            <li><a href= <?php echo base_url().index_page()."/adminPanel/productos "; if($active=='prod'){echo "class='active'";}?> ><i class="fa fa-suitcase fa-fw"></i>Productos</a></li>
            <li><a href=<?php echo base_url().index_page()."/adminPanel/ofertas "; if($active=='off'){echo "class='active'";}?>><i class="fa fa-tags fa-fw"></i>Ofertas</a></li>
            <li><a href=<?php echo base_url().index_page()."/admin/sales "; if($active=='sales'){echo "class='active'";}?>><i class="fa fa-money fa-fw"></i>Ventas</a></li>
            <li><a href=<?php echo base_url().index_page()."/adminPanel/usuarios "; if($active=='users'){echo "class='active'";}?>><i class="fa fa-users fa-fw"></i>Usuarios</a></li>
            <li><a href=<?php echo base_url().index_page()."/admin/config "; if($active=='config'){echo "class='active'";}?>><i class="fa fa-sliders fa-fw"></i>Cuenta</a></li>
            <li><a href=<?php echo base_url().index_page()."/admin/logout "; ?> ><i class="fa fa-eject fa-fw"></i>Sign Out</a></li>
          </ul>  
        </nav>
      </div>