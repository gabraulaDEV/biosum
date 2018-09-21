<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <!-- Main content --> 
      <div class="templatemo-content col-1 light-gray-bg">
        <div class="templatemo-top-nav-container">
          <div class="row">
            <nav class="templatemo-top-nav col-lg-12 col-md-12">
              <ul class="text-uppercase">
                <li><a href= <?php echo base_url().index_page()."/adminPanel/ofertas "; ?> >Editar Ofertas</a></li>
                <li><a href= <?php echo base_url().index_page()."/adminPanel/ofertas/agregar "; ?> >Agregar Ofertas</a></li>
              </ul>  
            </nav> 
          </div>
        </div>
        <div class="templatemo-content-container">
          <h2>Agregar oferta</h2>
          <hr/>
          <div class="templatemo-flex-row flex-content-row">
            <div class="col-1">
              <div class="panel panel-default templatemo-content-widget white-bg no-padding templatemo-overflow-hidden" style="padding: 20px 20px;">

                 <form method="POST" action= <?php echo base_url().index_page()."/adminPanel/ofertas/editaroferta "; ?> >
                  <div class="form-group">
                    <label for="id">Código: <?php echo $offers[0]['id']." ";?> </label>
                    <input type='number' class='form-control' id='id' name='id' value= <?php echo $offers[0]['id']." ";?> required='true' style="visibility: hidden;display: none;" >
                  </div>
                  <div class="form-group">
                    <label for="porc">Procentaje:</label>
                    <input type="number" step="0.01" class="form-control" id="porc" name="porc" value= <?php echo $offers[0]['porcentaje']." ";?> required='true'>
                  </div>
                  <button type="submit" class="btn btn-success" style="width: 100%">Modificar</button>
                </form> 
                                         
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
    <script type="text/javascript" src=<?php echo base_url()."assets/admin/js/admin-script.js"; ?> ></script>      <!-- Templatemo Script -->

  </body>
</html>