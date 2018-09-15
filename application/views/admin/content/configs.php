<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="#" onClick="verActual();">Cuenta actual</a></li>
                <li><a href="#" onClick="verContacto();">Contacto</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <div id="actual">
            <h2>Cuenta actual</h2>
            <hr/>
            <h3 style="margin-top: 30px;">Datos básicos</h3>
            <hr/>
            <link href=<?php echo base_url()."assets/admin/css/contenido-sobrepuesto.css"; ?> rel="stylesheet">
            <div class="div_form">
               <form id="form1" method="POST" action=<?php echo base_url().index_page()."/admin/updateactual ";?> >
                <label for="user_nom">Nombres:</label>
                <input type="text" id="user_nom" name="user_nom" placeholder="Nombres..." value=<?php echo $gb_data['gb_nombre']." "; ?> required="true">

                <label for="user_ape">Apellidos:</label>
                <input type="text" id="user_ape" name="user_ape" placeholder="Apellidos..." value=<?php echo $gb_data['gb_apellido']." "; ?> required="true">

                <label for="user_mail">Correo:</label>
                <input type="text" id="user_mail" name="user_mail" placeholder="Correo..." value=<?php echo $gb_data['gb_email']." "; ?> required="true">

                <label for="user_phone">Teléfono:</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Teléfono..." value=<?php echo $gb_data['gb_usuario_telefono']." "; ?> required="true">              

                <input type="submit" id="bModify" value="Guardar cambios"> 
              </form>
            </div>

            <h3>Cambio contraseña</h3>
            <hr/>
            <div class="div_form">
               <form id="form2" method="POST" action="">
                <label for="user_pass">Contraseña actual:</label>
                <input type="text" id="user_pass" name="user_pass" placeholder="Contraseña actual..." required="true">

                <label for="user_newPass">Nueva contraseña:</label>
                <input type="text" id="user_newPass" name="user_newPass" placeholder="Nueva contraseña..." required="true">

                <label for="user_newPass2">Confirmar contraseña:</label>
                <input type="text" id="user_newPass2" name="user_newPass2" placeholder="Confirmación..." required="true">              

                <input type="submit" id="bChangePass" value="Cambiar"> 
              </form>
            </div>
          </div>

          <div id="contacto" style="visibility: hidden; display: none;">
            <h2>Contacto</h2>
            <hr/>
            <h3 style="margin-top: 30px;">Contacto asesor 1</h3>
            <hr/>
            <link href=<?php echo base_url()."assets/admin/css/contenido-sobrepuesto.css"; ?> rel="stylesheet">
            <div class="div_form">
               <form id="form1" method="POST" action="">
                <label for="user_nom">Nombres:</label>
                <input type="text" id="user_nom" name="user_nom" placeholder="Nombres..." value=<?php echo $gb_data['gb_nombre']." "; ?> required="true">

                <label for="user_ape">Apellidos:</label>
                <input type="text" id="user_ape" name="user_ape" placeholder="Apellidos..." value=<?php echo $gb_data['gb_apellido']." "; ?> required="true">

                <label for="user_mail">Correo:</label>
                <input type="text" id="user_mail" name="user_mail" placeholder="Correo..." value=<?php echo $gb_data['gb_email']." "; ?> required="true">

                <label for="user_phone">Teléfono:</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Teléfono..." value=<?php echo $gb_data['gb_usuario_telefono']." "; ?> required="true">              

                <input type="submit" id="bModify" value="Guardar cambios"> 
              </form>
            </div>

            <h3 style="margin-top: 30px;">Contacto asesor 2</h3>
            <hr/>
            <link href=<?php echo base_url()."assets/admin/css/contenido-sobrepuesto.css"; ?> rel="stylesheet">
            <div class="div_form">
               <form id="form1" method="POST" action="">
                <label for="user_nom">Nombres:</label>
                <input type="text" id="user_nom" name="user_nom" placeholder="Nombres..." value=<?php echo $gb_data['gb_nombre']." "; ?> required="true">

                <label for="user_ape">Apellidos:</label>
                <input type="text" id="user_ape" name="user_ape" placeholder="Apellidos..." value=<?php echo $gb_data['gb_apellido']." "; ?> required="true">

                <label for="user_mail">Correo:</label>
                <input type="text" id="user_mail" name="user_mail" placeholder="Correo..." value=<?php echo $gb_data['gb_email']." "; ?> required="true">

                <label for="user_phone">Teléfono:</label>
                <input type="text" id="user_phone" name="user_phone" placeholder="Teléfono..." value=<?php echo $gb_data['gb_usuario_telefono']." "; ?> required="true">              

                <input type="submit" id="bModify" value="Guardar cambios"> 
              </form>
            </div>
          </div>
          
         
          <footer class="text-right">
            <p>Copyright &copy; 2018 Biosuministros 
            | Designed template view by <a href="http://www.templatemo.com" target="_parent">templatemo</a>
            <!--| Development by: danieldmc123@hotmail.com vapedraza1706@gmail.com -->
            </p>
          </footer>         
        </div>
      </div>
    </div>
    
    <!-- JS -->
    <script src=<?php echo base_url()."assets/admin/js/jquery-1.11.2.min.js" ?>></script>      <!-- jQuery -->
    <script src=<?php echo base_url()."assets/admin/js/jquery-migrate-1.2.1.min.js" ?>></script> <!--  jQuery Migrate Plugin -->
    <script src="https://www.google.com/jsapi"></script> <!-- Google Chart -->
    <script>
      /* Google Chart 
      -------------------------------------------------------------------*/
      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart); 
      
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Topping');
          data.addColumn('number', 'Slices');
          data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
          ]);

          // Set chart options
          var options = {'title':'How Much Pizza I Ate Last Night'};

          // Instantiate and draw our chart, passing in some options.
          var pieChart = new google.visualization.PieChart(document.getElementById('pie_chart_div'));
          pieChart.draw(data, options);

          var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
          barChart.draw(data, options);
      }
      
    </script>
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/admin-script.js"; ?> ></script>      <!-- Templatemo Script -->
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/cuenta-script.js"; ?> ></script> 

  </body>
</html>