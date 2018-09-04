<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href=<?php echo base_url()."assets/images/icon.ico"; ?> />
  <link rel="stylesheet" href= <?php echo base_url()."assets/css/admin.css"; ?> />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <script type="text/javascript">  
    window.onload=function()
    {
      var b=document.getElementById("menu");
      var menu=document.getElementById("sidenav");

      b.onclick=function()
      {
        if(menu.style.width=="0px")
         {
           menu.style.width="200px";
         }
         else
         {
           menu.style.width="0px"; 
         }
      }
    }

  </script>
</head>
<body>
<div class="header">
  <a id="menu" class="menu_button" href="#"><image class="menu_button_image" src=<?php echo base_url()."assets/images/icons/menu_white.png";?> /> Menu
  </a>
  <image class="icon_logo_header" src=<?php echo base_url()."assets/images/logo.png";?> />
  <div class="header_title">Administrador</div>
</div>