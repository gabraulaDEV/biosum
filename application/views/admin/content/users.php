<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="contenido_sobrepuesto" id="cont_sobre_admin">
        <!-- Contenido para agregar un administrador -->
        <div class="agregar_producto">
          <div class="top">
                <h2 style="float:right">Agregar administrador</h2>
            <a href="#" style="float:left" onClick="ocultarAgregarAdmin()">CERRAR</a>
          </div>
          <div class="content">
            <h2>Agregar producto</h2>
            <hr/>
            <div class="div_form">
              <form id="formAdmin" method="POST" action=<?php echo base_url().index_page()."/admin/agregarAdmin ";?>>

                <label for="user_nom">Nombres:</label>
                <input type="text" id="user_nom" name="user_nom" placeholder="Nombres..." required="true">

                <label for="user_ape">Apellidos:</label>
                <input type="text" id="user_ape" name="user_ape" placeholder="Apellidos..." required="true">

                <label for="user_mail">Correo:</label>
                <input type="text" id="user_mail" name="user_mail" placeholder="Correo..." required="true">

                <label for="user_phone">Teléfono:</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Teléfono..." required="true">

                <label for="user_dir">Dirección:</label>
                <input type="text" id="user_dir" name="user_dir" placeholder="Dirección..." >

                <label for="user_pass1">Contraseña:</label>
                <input type="password" id="user_pass1" name="user_pass1" placeholder="*******" required="true" >

                <label for="user_pass2">Confirmación contraseña:</label>
                <input type="password" id="user_pass2" name="user_pass2" placeholder="*******" required="true" >

                <input type="submit" id="bRegister" value="Agregar">
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href=<?php echo base_url().index_page()."/admin/users "; ?>>Nuestros clientes</a></li>
                <li><a href=<?php echo base_url().index_page()."/admin/admins "; ?>>Administradores</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        