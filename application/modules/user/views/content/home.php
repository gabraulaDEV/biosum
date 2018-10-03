
      <!-- MAIN -->
      <main role="main">
        <!-- Main Carousel -->
        <link rel="stylesheet" href=<?php echo base_url()."assets/user/css/ofertas-home.css ";?>>
        <section class="section background-dark">
          <div class="line">
            <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows">
              <?php
              if(count($destacados)>0)
              {
                for($i=0;$i<count($destacados);$i++)
                {
                  echo "<div class='item'>";
                    echo "<div class='s-12 center'>";
                      echo "<div class='prise-box' >";
                      echo "<img src='".$destacados[$i]['image']."' alt='Imagen'>";
                        echo "<div class='info-this'>";
                          echo "<div class='left-box'>";
                           echo "<h2>".$destacados[$i]['cat']."</h2>";
                            echo "<a href='#'>Comprar</a>";
                          echo "</div>";
                          echo "<div class='right-box-up'>";
                            echo "<div class='blue-box'>";                         
                              echo "<span>Ahorro</span>";                          
                              echo "<h2>50%<sup>*</sup></h2>";
                            echo "</div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                }
                 
              }
              else
              {
                echo "No hay productos";
              }
              ?>  
            </div>
          </div>
            
        </section>
        
        <!-- Section 1 -->
        <section class="section background-white"> 
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">Los más destacados</h2>
          <div class="line">
            <div class="margin">
              
            <!-- prueba init-->

            <div class="container">

              <div class="row">
                  <!-- BEGIN PRODUCTS -->
                  <?php
                  if(count($destacados)>0)
                  {
                    for($i=0;$i<count($destacados);$i++)
                    {
                      echo "<div class='col-md-3 col-sm-6'>";
                        echo "<span class='thumbnail'>";
                          echo "<img src='".$destacados[$i]['image']."' alt='Imagen'>";
                          echo "<p><strong>".$destacados[$i]['ref']."</strong><p>";
                          echo "<p>(".$destacados[$i]['model'].")</p>";
                          echo "<p>Color: ".$destacados[$i]['color']."</p>";
                          echo "<p>".$destacados[$i]['descr']."</p>";
                          echo "<p>".$destacados[$i]['cat']."</p>";
                          echo "<hr class='line'>";
                          echo "<div class='row'>";
                            echo "<div class='col-md-6 col-sm-6'>";
                              echo "<p class='price'>$".$destacados[$i]['precio']."</p>";
                            echo "</div>";
                            echo "<div class='col-md-6 col-sm-6'>";
                              echo "<input class='btn btn-success right' type='submit' value='Comprar'>";
                            echo "</div>";
                          echo "</div>";
                        echo "</span>";
                      echo "</div>";
                    }
                    
                  }
                  else
                  {
                    echo "No hay productos";
                  }
                  ?>   
                  
                  <!-- END PRODUCTS -->
              </div>
            </div>


            <!-- end prueba -->

            </div>
          </div>
        </section>

        <hr class="break margin-top-bottom-0">
        
        <!-- Section 4 --> 
      <section class="section background-white">
        <div class="line">
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">Nuestros servicios</h2>
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div class="item">
              <div class="margin"> 
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/"><img src="<?php echo asset_url();?>/user/img/bio1.jpg" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3><a class="text-dark text-primary-hover" href="#">Domicilios</a></h3>
                        <p>Entrgas gratis en toda Bogotá.</p>
                        
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="#"><img src="<?php echo asset_url();?>/user/img/epayco.png" alt=""></a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3><a class="text-dark text-primary-hover" href="#">Compras en linea</a></h3>
                        <p>Desde la comodidad de tu hogar, realiza compras en efectivo, con tarjeta o contra entrega.</p>
                       
                      </div>
                    </div>  
                  </div>
                </div> 
              </div>
            </div>

          </div>
        </div>    
      </section>

      <!-- Section 2 ASESORES -->
        <section class="section background-primary" id="contactoAsesor">
          <div class="container">
            <h2>Contáctanos</h2>
      
            <div class="asesores-font">
              <div class="row">
                <div class="col-xl-13 col-lg-4 col-md-6 col-sm-12" data-toggle="modal" data-target="#exampleModalCenter">
                  <div class="our-services-wrapper mb-60">
                  <div class="services-inner">
                  <div class="our-services-img">
                  <img  src="<?php echo asset_url();?>/user/img/headphone.png" width="68px"  style="border-radius: 50%" alt="Asesor">
                  </div>
                  <div class="our-services-text">
                    <h4 class="asesores-font">Asesor 1</h4>
                    <p>icocno - correo</p>
                    <p><i class="icon-smartphone text-size-20" style="color:green"></i> telefono</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-toggle="modal" data-target="#exampleModalCenter">
              <div class="our-services-wrapper mb-60">
                <div class="services-inner">
                  <div class="our-services-img">
                  <img src="<?php echo asset_url();?>/user/img/headphone.png" width="68px"  style="border-radius: 50%" alt="Asesor">
                  </div>
                  <div class="our-services-text">
                    <h4>Asesor 2</h4>
                    <p>icocno - correo</p>
                    <p><i class="icon-smartphone text-size-20" style="color:green"></i> telefono</p>
                  </div>
                </div>
              </div>
            </div>

            </div>
          </div>
          </div> 
        </section>
      </main>