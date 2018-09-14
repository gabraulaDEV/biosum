<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="contenido_sobrepuesto" id="cont_sobre1">

        <!-- Contenido para agregar producto -->
        <link href=<?php echo base_url()."assets/admin/css/contenido-sobrepuesto.css"; ?> rel="stylesheet">
        <div class="agregar_producto">
          <div class="top">
                <h2 style="float:right">Agregar producto</h2>
            <a href="#" style="float:left" onClick="ocultar1()">CERRAR</a>
          </div>
          <div class="content">
            <h2>Agregar producto</h2>
            <hr/>
            <div class="div_form">
              <form id="formRegister" method="POST" action=<?php echo base_url().index_page()."/admin/agregarProducto ";?> enctype="multipart/form-data">
                <label for="itFullName">Seleccionar imagen</label>
                <input type="file" name="file_image" required="true">

                <label for="itUserName">Referencia</label>
                <input type="text" id="prod_ref" name="prod_ref" placeholder="Referencia..." required="true">

                <label for="itEmail">Modelo</label>
                <input type="text" id="prod_model" name="prod_model" placeholder="Modelo..." required="true">

                <label for="itPhone">Impresoras compatibles</label>
                <input type="text" id="prod_desc" name="prod_desc" placeholder="Impresoras..." required="true">

                <label for="itPhone">Colores</label>
                <?php
                if(isset($colores))
                {
                  for($i=0;$i<count($colores);$i++)
                  {
                    echo "<div class='check_container' >";
                      echo "<div><input type='checkbox' name='prod_colors[]' value='".$colores[$i]['cod_color']."' checked />".$colores[$i]['nom_color']."</div>";
                    echo "</div>";
                  }

                }
                else
                {
                  echo "<div class='check_container' >";
                    echo "<div><input type='checkbox' name='prod_colors[]' value='NONE' checked />NO HAY</div>";
                  echo "</div>";
                }
                ?>

                <label for="cat">Categoría</label>
                <select id='cat' name='prod_cat'>
                <?php
                if(isset($categorias))
                {
                  for($i=0;$i<count($categorias);$i++)
                  {
                      echo "<option value='".$categorias[$i]['id']."'>".$categorias[$i]['nom_categoria']."</option>";
                  }
                }
                else
                {
                  echo "<option value='NONE'>NO HAY</option>";
                }
                ?>
                </select>


                <label for="tipo">Tipo</label>
                <select id="tipo" name="prod_tipo">
                  <option value="Genérico">Genérico</option>
                  <option value="Original">Original</option>
                </select>

                <label for="itPhone">Precio con IVA</label>
                <input type="number" id="prod_price" name="prod_price" placeholder="Precio (IVA INC)..." required="true">

                <input type="submit" id="bRegister" value="Agregar">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="contenido_sobrepuesto" id="cont_sobre2">

        <!-- Contenido para importar producto -->
        <div class="agregar_producto">
          <div class="top">
                <h2 style="float:right">Importar productos</h2>
            <a href="#" style="float:left" onClick="ocultar2()">CERRAR</a>
          </div>
          
          <div class="content">
            <h2>Importar productos</h2>
            <hr/>
            <div class="div_form">
              <h2>Ejemplo de archivo</h2>
              <hr/>
              <h3>Si no sabe como debe ser el formato excel, aquí tiene un ejemplo</h3>
                <form action=<?php echo base_url()."assets/admin/template-files/importar_productos.xlsx ";?> method="get">
                  <input type="submit" value="ver template">
                </form>
              <h2 style="margin-top: 50px;">Importar archivo</h2>
              <hr/>
              <form id="formRegister" method="POST" action=<?php echo base_url().index_page()."/admin/import ";?> enctype="multipart/form-data">
                <label for="itFullName">Seleccionar archivo Excel</label>
                <input type="file" name="file" required="true">

                <input type="submit" id="bRegister" value="Importar">
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
                <li><a href="#" onClick="mostrar1()">Agregar producto</a></li>
                <li><a href="#" onClick="mostrar2()">Importar Productos</a></li>
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
    <!-- Agregar producto -->
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/agregar-producto.js"; ?> ></script>

  </body>
</html>
