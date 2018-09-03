<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Administración</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href=<?php echo base_url()."assets/images/icon.ico"; ?> />
  <link rel="stylesheet" href= <?php echo base_url()."assets/css/admin.css"; ?> />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script type="text/javascript">  
    window.onload=function()
    {
      
      var menu=document.getElementById("sidenav");

      menu.onclick=function()
      {
        if(window.innerWidth>800)
        {
          if(menu.style.width=="50px")
          {
            menu.style.width="200px";
          }
          else
          {
            menu.style.width="50px"; 
          }
        }
        else
        {

        }
      }
    }

  </script>
</head>
<body>
<div class="header">
  <image class="icon_logo_header" src=<?php echo base_url()."assets/images/logo.png";?> />Administrador
</div>

<div class="sidenav" id="sidenav">
  <a id="menu" href="#"><image class="icon_side_menu" src=<?php echo base_url()."assets/images/icons/menu_white.png";?> />menu</a>
  <a href="#"><image class="icon_side_menu" src=<?php echo base_url()."assets/images/icons/basket_white.png";?> />Productos</a>
  <a href="#"><image class="icon_side_menu" src=<?php echo base_url()."assets/images/icons/tags_white.png";?> />Ofertas</a>
  <a href="#"><image class="icon_side_menu" src=<?php echo base_url()."assets/images/icons/square_cash_white.png";?> />Ventas</a>
  <a href="#"><image class="icon_side_menu" src=<?php echo base_url()."assets/images/icons/contact_mail_white.png";?> />Contacto</a>
  <a href="#"><image class="icon_side_menu" src=<?php echo base_url()."assets/images/icons/settings_white.png";?> />Configuracións</a>
</div>

<!-- MAIN -->
<div class="main">
  <div id="c1">
      1111111111111111111111111111111
  </div>
  
</div>


</body>
</html>
