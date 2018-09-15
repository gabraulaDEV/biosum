<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href="#">Editar Ofertas</a></li>
                <li><a href="#">Agregar Ofertas</a></li>
              </ul>  
            </nav> 
          </div>
        </div>

        <div class="templatemo-content-container">

          <div class="templatemo-flex-row flex-content-row">
            <div class="templatemo-content-widget white-bg col-2">
              <h2 class="templatemo-inline-block">ID:</h2><hr>


            <div style="overflow-x:auto;">
              <table>
               <tr>
              <td width="30%">
                 <img width="400px" height="450px" src="http://www.biosuministros.co/1403-large_default/cartucho-hp-122-negro.jpg" /><br>
                <input type="submit" class="templatemo-blue-button width-100" value="Cambiar Imagen">             
                 </td>
              <td width="70%">
                
                <div class="div_form">
                  <h1>Información del producto</h1><hr>
                  <p><b>Referencia</b></p>
                  <input type="text" id="user_nom" name="user_nom" placeholder="KB-54" value= "" required="true">
                  <p><b>Modelo</b></p>
                  <input type="text" id="user_nom" name="user_nom" placeholder="784D" value= "" required="true">
                  <p><b>Descripción</b></p>
                  <input type="text" id="user_nom" name="user_nom" placeholder="Compatible para las impresonas.." value=""  required="true">
                  <p><b>Estado</b></p>
                  <input type="text" id="user_nom" name="user_nom" placeholder="" value="" required="true">
                  <p><b>Precio</b></p>
                  <input type="text" id="user_nom" name="user_nom" placeholder="Nombres..." value= "" required="true">
                </div>

              </td>
              </tr>

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