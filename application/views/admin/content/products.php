<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="#">Modificar productos</a></li>
                <li><a href="#">Agregar productos</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">         
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <h4>Modificar productos</h4>
              <hr/>
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden">
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Productos</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>ID</td>
                        <td>Imágen</td>
                        <td>Referencia</td>
                        <td>Modelo</td>
                        <td>Categoría</td>
                        <td>Tipo</td>
                        <td>Color</td>
                        <td>Descripción</td>
                        <td>Precio</td>
                        <td>Estado</td>
                        <td>Acción</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        for($i=0;$i<50;$i++)
                        {
                          echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>Imágen".$i."</td>";
                            echo "<td>CB".$i."</td>";
                            echo "<td>".$i."A</td>";
                            echo "<td>Toner</td>";
                            echo "<td>Genérico</td>";
                            echo "<td>Cyan</td>";
                            echo "<td>Compatible con impresoras EPSON XR/HP XRS</td>";
                            echo "<td>$2".$i."00000000</td>";                            
                            echo "<td>Activo</td>";
                            echo "<td><input type='submit' class='templatemo-blue-button width-100' value='Editar' /></td>";
                          echo "</tr>";
                        }
                      ?>                   
                    </tbody>
                  </table>    
                </div>                          
              </div>
            </div>           
          </div> <!-- Second row ends -->
          </div>
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
    <script src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
    <script src="js/jquery-migrate-1.2.1.min.js"></script> <!--  jQuery Migrate Plugin -->
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

      $(document).ready(function(){
        if($.browser.mozilla) {
          //refresh page on browser resize
          // http://www.sitepoint.com/jquery-refresh-page-browser-resize/
          $(window).bind('resize', function(e)
          {
            if (window.RT) clearTimeout(window.RT);
            window.RT = setTimeout(function()
            {
              this.location.reload(false); /* false to get page from cache */
            }, 200);
          });      
        } else {
          $(window).resize(function(){
            drawChart();
          });  
        }   
      });
      
    </script>

  </body>
</html>