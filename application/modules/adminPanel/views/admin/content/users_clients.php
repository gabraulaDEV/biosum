<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="templatemo-content-container">
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <h2>Clientes registrados</h2>
              <hr/>
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Cliente</h2></div>
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
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/admin-script.js"; ?> ></script>

  </body>
</html>