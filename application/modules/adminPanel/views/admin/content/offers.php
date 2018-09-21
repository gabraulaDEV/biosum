<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href= "#">Editar Ofertas</a></li>
                <li><a href= <?php echo base_url().index_page()."/adminPanel/ofertas/agregar "; ?> >Agregar Ofertas</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <h2>Editar ofertas</h2>
          <hr/>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="padding: 20px 20px;">
                <div class="panel-heading templatemo-position-relative"><h2 class="text-uppercase">Ofertas</h2></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <td>Código</td>
                        <td>Procentaje</td>
                        <td>Acción</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        if(count($offers)>0)
                        {
                          for($i=0;$i<count($offers);$i++)
                          {
                            echo "<tr>";
                              echo "<td>".$offers[$i]['id']."</td>";
                              echo "<td>".$offers[$i]['porcentaje']."</td>";
                              echo "<td>";
                      ?>
                              <button  onclick="location.href='./ofertas/editar?id_off=<?php echo $offers[$i]['id']; ?> ';" class='templatemo-blue-button width-100' >Editar</button>
                              <hr>
                             <button  onclick="location.href='./ofertas/eliminar?id_off=<?php echo $offers[$i]['id']; ?> ';" class='templatemo-blue-button width-100' >Eliminar</button></td>
                      <?php
                            echo "</tr>";
                          }
                          
                        }
                        else
                        {
                          echo "<tr>";
                            echo "<td colspan='3' >No hay ofertas</td>";
                          echo "</tr>";
                        }
                      ?>
                 
                    </tbody>
                  </table>
                </div>                       
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
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/admin-script.js"; ?> ></script>      <!-- Templatemo Script -->

  </body>
</html>