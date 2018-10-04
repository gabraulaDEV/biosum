<<<<<<< Updated upstream
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="contenido_sobrepuesto" id="cont_sobre_admin">
        <!-- Contenido para agregar un administrador -->
        <div class="agregar_producto">
          <div class="top">
            <a href="#" style="float:left" onClick="ocultarAgregarAdmin()">CERRAR</a>
          </div>
          <div class="content">
            <h2>Agregar administrador</h2>
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
                <li><a href="<?php echo base_url().index_page()."/admin/users "; ?>">Nuestros clientes</a></li>
                <li><a href="<?php echo base_url().index_page()."/admin/admins "; ?>">Administradores</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
<<<<<<< Updated upstream
=======

        <div class="templatemo-content-container">
                    <div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
            <div class="col-1 templatemo-overflow-hidden">
              <div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="templatemo-flex-row flex-content-row">
                  <div class="col-1 col-lg-6 col-md-12">
                    <h2 class="text-center">Modular<span class="badge">new</span></h2>
                    <div id="pie_chart_div" class="templatemo-chart"></div> <!-- Pie chart div -->
                  </div>
                  <div class="col-1 col-lg-6 col-md-12">
                    <h2 class="text-center">Interactive<span class="badge">new</span></h2>
                    <div id="bar_chart_div" class="templatemo-chart"></div> <!-- Bar chart div -->
                  </div>  
                </div>                
              </div>
            </div>
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <h4>Usuarios registrados</h4>
              <hr/>
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Usuarios</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>Id.</td>
                        <td>Primer Nombre</td>
                        <td>Apellido</td>
                        <td>Correo Electrónico</td>
                        <td>Estado</td>
                        <td>Rango</td>
                        <td>Teléfono</td>
                        <td>Dirección</td>
                        <td>Operaciones</td>
                      </tr>
                    </thead>
                     <tbody>
                      <?php
                        for($i=0;$i<count($listado_usuarios);$i++)
                        {
                            echo "<tr>";
                            echo "<td>".$listado_usuarios[$i]['id']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_nombre']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_apellido']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_email']."</td>";
                            echo "<td>".$listado_usuarios[$i]['estado']."</td>";
                            echo "<td>".$listado_usuarios[$i]['rango']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_telefono']."</td>";
                            echo "<td>".$listado_usuarios[$i]['direccion']."</td>";
                           echo "<td><input type='submit' class='templatemo-blue-button width-100' value='Operacion' /></td>";
                          echo "</tr>";
                        }
                      ?>
                    </tbody>
                  </table> 
                </div>   
                <center>
              <form method="get">
              <button type='submit' name="page" class='templatemo-blue-button width-20' value='1'>Primera</button>
              <button type='submit' name="page"  class='templatemo-blue-button width-20' value="<?php if($pagina_actual_listado_usuarios-1 > 1){ echo $pagina_actual_listado_usuarios -1; }else{ echo 1;}?>" >Anterior</button>
               <?php echo $pagina_actual_listado_usuarios; ?>..<?php echo $paginacion_listado_usuarios; ?>
              <button type='submit' name="page"  class='templatemo-blue-button width-20' value="<?php if($pagina_actual_listado_usuarios+1 < $pagina_actual_listado_usuarios){ echo $pagina_actual_listado_usuarios +1; }else{ echo $pagina_actual_listado_usuarios;}?>" >Siguiente</button>
              <button type='submit' name="page"  class='templatemo-blue-button width-20' value='<?php echo $pagina_actual_listado_usuarios;?>'>Última</button>
            </form></center>                       
              </div>
            </div>           
          </div> <!-- Second row ends -->
          <footer class="text-right">
            <p>Copyright &copy; 2084 Biosuministros 
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
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/admin-script.js"; ?> ></script>

  </body>
</html>
=======
>>>>>>> Stashed changes
        
=======
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
                <li><a href="<?php echo base_url().index_page()."/admin/users "; ?>">Nuestros clientes</a></li>
                <li><a href="<?php echo base_url().index_page()."/admin/admins "; ?>">Administradores</a></li>
              </ul>  
            </nav> 
          </div>
        </div>

        <div class="templatemo-content-container">
                    <div class="templatemo-flex-row flex-content-row templatemo-overflow-hidden"> <!-- overflow hidden for iPad mini landscape view-->
            <div class="col-1 templatemo-overflow-hidden">
              <div class="templatemo-content-widget white-bg templatemo-overflow-hidden">
                <i class="fa fa-times"></i>
                <div class="templatemo-flex-row flex-content-row">
                  <div class="col-1 col-lg-6 col-md-12">
                    <h2 class="text-center">Modular<span class="badge">new</span></h2>
                    <div id="pie_chart_div" class="templatemo-chart"></div> <!-- Pie chart div -->
                  </div>
                  <div class="col-1 col-lg-6 col-md-12">
                    <h2 class="text-center">Interactive<span class="badge">new</span></h2>
                    <div id="bar_chart_div" class="templatemo-chart"></div> <!-- Bar chart div -->
                  </div>  
                </div>                
              </div>
            </div>
          </div>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <h4>Usuarios registrados</h4>
              <hr/>
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Usuarios</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>Id.</td>
                        <td>Primer Nombre</td>
                        <td>Apellido</td>
                        <td>Correo Electrónico</td>
                        <td>Estado</td>
                        <td>Rango</td>
                        <td>Teléfono</td>
                        <td>Dirección</td>
                        <td>Operaciones</td>
                      </tr>
                    </thead>
                     <tbody>
                      <?php
                        for($i=0;$i<count($listado_usuarios);$i++)
                        {
                            echo "<tr>";
                            echo "<td>".$listado_usuarios[$i]['id']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_nombre']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_apellido']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_email']."</td>";
                            echo "<td>".$listado_usuarios[$i]['estado']."</td>";
                            echo "<td>".$listado_usuarios[$i]['rango']."</td>";
                            echo "<td>".$listado_usuarios[$i]['usuario_telefono']."</td>";
                            echo "<td>".$listado_usuarios[$i]['direccion']."</td>";
                           echo "<td><input type='submit' class='templatemo-blue-button width-100' value='Operacion' /></td>";
                          echo "</tr>";
                        }
                      ?>
                    </tbody>
                  </table> 
                </div>   
                <center>
              <form method="get">
              <button type='submit' name="page" class='templatemo-blue-button width-20' value='1'>Primera</button>
              <button type='submit' name="page"  class='templatemo-blue-button width-20' value="<?php if($pagina_actual_listado_usuarios-1 > 1){ echo $pagina_actual_listado_usuarios -1; }else{ echo 1;}?>" >Anterior</button>
               <?php echo $pagina_actual_listado_usuarios; ?>..<?php echo $paginacion_listado_usuarios; ?>
              <button type='submit' name="page"  class='templatemo-blue-button width-20' value="<?php if($pagina_actual_listado_usuarios+1 < $pagina_actual_listado_usuarios){ echo $pagina_actual_listado_usuarios +1; }else{ echo $pagina_actual_listado_usuarios;}?>" >Siguiente</button>
              <button type='submit' name="page"  class='templatemo-blue-button width-20' value='<?php echo $pagina_actual_listado_usuarios;?>'>Última</button>
            </form></center>                       
              </div>
            </div>           
          </div> <!-- Second row ends -->
          <footer class="text-right">
            <p>Copyright &copy; 2084 Biosuministros 
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
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/admin-script.js"; ?> ></script>

  </body>
</html>
=======
        
>>>>>>> 763d4fc45382bf5732f696cd3117edef1abdd77a
>>>>>>> Stashed changes
