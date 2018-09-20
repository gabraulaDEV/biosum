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

.Product_Button
{
  padding:20px;
  border:1px solid #fff;
}
.margin50{
  margin-top:50px
}
.productbtn:after {
  font-family: "Glyphicons Halflings";
  content: "\e114";
  float: right;
  margin-left: 15px;
}
/* Icon when the collapsible content is hidden */
.productbtn.collapsed:after {
  content: "\e080";
}
.width450
{
  width:450px
}
.margin50 {
  margin-top:50px;   
}
input[type=radio], input[type=checkbox]
{
  margin:4px !important;
}
.dimentions-width, .dimentions-height
{
  width:90%;
  display:initial;
}

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
     <div class="templatemo-content-widget white-bg col-1">
      <h2 class="text-uppercase">PRODUCTO</h2>
      <h3 class="text-uppercase">ṡCómo funciona?</h3><hr>
      Aquí un texto de información a cerca de como se podrá editar bien un producto.                      
    </div>


    <div class="templatemo-content-widget white-bg col-2">
      <h2 class="templatemo-inline-block">ID: <?php echo $producto->id; ?></h2><hr> 
      <div class="clearfix"></div>
      <div class="row">
        <div><ul class="nav nav-tabs col-lg-12" role="tablist">




          <li class="active"><a href="#Product_main" role="tab" data-toggle="tab">Principal</a></li>
          <li class=""><a href="#Product_Images" role="tab" data-toggle="tab">Imágenes</a></li>
          <li class=""><a href="#Product_Descuentos" role="tab" data-toggle="tab">Descuentos</a></li>

        </ul></div> 
        <div class="clearfix"></div>
        <div class="Product_Content tab-content">

          <div id="Product_main" class="tab-pane active">
            <form class="form-horizontal" action='<?php echo base_url().index_page()."/admin/editProduct";?>?prod_id=<?php echo $producto->id; ?>' method="POST">

              <fieldset style="width: 100%">
                <div class="col-lg-12 form-group margin50">
                  <h2>Información Principal</h2><br>
                  <label class="col-lg-2"  for="referencia_producto">Referencia</label>
                  <div class="col-lg-4">
                    <input type="text" id="referencia_producto" value="<?php echo $producto->prod_referencia; ?>" name="referencia_producto" placeholder="" class="form-control name">
                  </div>

                  <!-- Helper para explicar la función de el label-->
                  <div class="col-lg-4">
                   <div class="container">
                    <button type="button" class="btn productbtn collapsed width450" data-toggle="collapse" data-target="#related">ṡCómo funciona?</button>
                    <div id="related" class="collapse">
                      Aquí información de ayuda!
                    </div>
                  </div>
                </div>
              </div>

              <div class=" col-lg-12 form-group">
                <label class="col-lg-2" for="modelo_producto">Modelo</label>
                <div class="col-lg-4">
                 <input type="text" id="modelo_producto" value="<?php echo $producto->prod_modelo; ?>" name="modelo_producto" placeholder="" class="form-control name">
               </div>
             </div>

             <div class=" col-lg-12 form-group">

              <label class="col-lg-2" for="descripcion_producto">Descripción</label>
              <div class="col-lg-4">
               <textarea type="text" id="descripcion_producto" name="descripcion_producto" placeholder="" class="form-control name"><?php echo $producto->prod_descripcion; ?></textarea>
             </div>
           </div>


           <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="estado_producto">Estado</label>
            <div class="col-lg-4">
              <select id="estado_producto" name="estado_producto" class="form-control manufacturer">
                <option value="Activo" <?php if($producto->prod_estado == "Activo"){ echo "selected";} ?>>Activo</option>
                <option value="Inactivo"  <?php if($producto->prod_estado != "Activo"){ echo "selected";} ?>>Inactivo</option>
              </select>
            </div>
          </div>

          <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="tipo_producto">Tipo Producto</label>
            <div class="col-lg-4">
              <select id="tipo_producto" name="tipo_producto" class="form-control manufacturer">
                <option value="Original" <?php if($producto->tipo_producto == "ORIGINAL"){ echo "selected";} ?>>Original</option>
                <option value="Generico"  <?php if($producto->tipo_producto != "ORIGINAL"){ echo "selected";} ?>>Genérico</option>
              </select>
            </div>
          </div>

          <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="categoria_producto">Categoría</label>
            <div class="col-lg-4">
              <select id="categoria_producto" name="categoria_producto" class="form-control manufacturer">
                <?php
                for($i = 0; $i<count($producto_categorias); $i++)
                {
                  $active = "";
                  if($producto->cod_cat == $producto_categorias[$i]['id'])
                    { 
                      $active = "selected";
                    }
                  echo "<option value='". $producto_categorias[$i]['id']."' ".$active." >". $producto_categorias[$i]['nom_categoria'] ."</option>";
                }                
                ?>

              </select>
            </div>
          </div>

          <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="precio_producto">Precio</label>
            <div class="col-lg-4">
              <input type="text" id="precio_producto" value ="<?php echo $producto->precio; ?>"name="precio_producto" placeholder="" class="form-control name">
            </div>
          </div>

          CARTUCHO
          <!-- En caso de tratarse de un producto: CARTUCHO-->
          <div class="col-lg-12 form-group">
            <label class="col-lg-2" for="Manufacturer">Color</label>
            <div class="col-lg-4">
             <table class="table package-table">
              <tbody>
                <tr>
                  <td colspan="6"><h3>Listado de colores</h3></td>
                </tr>
                <tr>
                  <td>Color</td>
                  <td>Seleccionar</td> 
                </tr> 
                <?php 
                for($z = 0; $z < count($producto_colores); $z++){
                  for($w = 0; $w<count($producto_colores_prod); $w++){
                    if($producto_colores_prod[$w]['cod_producto'] == $producto->id){
                      echo $producto_colores[$z]['cod_color'];
                    }
                  }

                  $paleta_colores = "";
                  if($producto_colores[$z]['nom_color'] == "Blanco/Negro"){
                    $paleta_colores = "black";
                  }else if($producto_colores[$z]['nom_color'] == "Cyan"){
                    $paleta_colores = "cyan";
                  }else if($producto_colores[$z]['nom_color'] == "Magenta"){
                    $paleta_colores = "magenta";
                  }else if($producto_colores[$z]['nom_color'] == "Amarillo"){
                    $paleta_colores = "yellow";
                  }
                ?>
                <tr>   
                 <td><i class="fa fa-circle blue" style="color:<?php echo $paleta_colores; ?>"></i><?php echo $producto_colores[$z]['nom_color'] ; ?></td>   
                 <td>
                  <div class="div_form">
                    <input type="checkbox" name='<?php echo $producto_colores[$z]['id']; ?>' class="form-check-input" id="exampleCheck1">
                  </div>
                </td> 
              </tr>
              <?php 
                }
              ?>
            </tbody>
          </table>

        </div>
      </div>



    </fieldset>
    <input type="submit" value="GUARDAR" />
  </form>
</div>            
<div id="Product_Images" class="tab-pane"><div class="col-lg-12 form-group margin50">
 <fieldset style="width: 100%">
  <label class="col-sm-2" for="FilenameOverride">Image Filename Override</label>
  <div class="col-sm-4">
    <input class="form-control" type="text" id="filenameOverride" placeholder="">
  </div>


</div>
<div class="col-lg-12 form-group">
  <label class="col-sm-2" for="exampleInputFile">Small</label>
  <div class="col-sm-4">
    <input type="file" id="small">
  </div>
  <div class="container">
    <button type="button" class="btn productbtn collapsed width450" data-toggle="collapse" data-target="#related">ṡCómo funciona?</button>
    <div id="related" class="collapse">
      Aquí información de ayuda!
    </div>
  </div>
</div>

<div class="col-lg-12 form-group">
  <label class="col-sm-2" for="exampleInputFile">Medium</label>
  <div class="col-sm-4">
    <input type="file" id="medium">
  </div>
</div>

<div class="col-lg-12 form-group">
  <label class="col-sm-2" for="exampleInputFile">Large</label>
  <div class="col-sm-4">
    <input type="file" id="large">
  </div>
</div>

</fieldset>
</div>



</div>
</div>
<div>
  <div class="Product_Button col-lg-offset-6">
    <a href="#" class="btn btn-primary"><i class=""></i><strong>MANAGE VARIANTS</strong></a>
    <a href="#" class="btn btn-primary"><i class=""></i><strong>CLOSE</strong></a>
    <a href="#" class="btn btn-primary"><i class=""></i><strong>SAVE AND CLOSE</strong></a>
    <a href="#" class="btn btn-primary"><i class=""></i><strong>SAVE</strong></a>
  </div>
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