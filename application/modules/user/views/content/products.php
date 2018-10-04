   <link rel="stylesheet" href="<?php echo asset_url_home();?>/css/listado-productos.css">


<br/>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categorías</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="category.html">Cartuchos</a></li>
                    <li class="list-group-item"><a href="category.html">Toners</a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Filtros</div>
                <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <div class="col-xs-10">
                        Item 1
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-1">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </li>

                      <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-2" data-toggle="detail-2">
                    <div class="col-xs-10">
                        Item 2
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-down pull-right"></i></div>
                </div>
                <div id="detail-2">
                    <hr></hr>
                    <div class="container">
                        <div class="fluid-row">
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                            <div class="col-xs-1">
                                Detail:
                            </div>
                            <div class="col-xs-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </li>
             </div>

     </div>

     <div class="col">
      <h3 class="text-thin headline text-center text-s-size-30 margin-bottom-50">Resultados de Búsqueda (<?php echo count($destacados); ?>)</h3>

      <div class="container">

        <div class="row">
<?php
foreach ($destacados  as $clave => $valor){
?>
            <div class="col-md-4">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?php echo $valor['image']; ?>" class="img-responsive" alt="<?php echo $valor['ref']; ?>">
                    <div>
                      <a href="<?php echo base_url(); ?>" class="btn">Ver</a>
                  </div>
              </div>
              <h3><a href="shop-item.html"><b><?php echo $valor['ref']; ?></b></a></h3>
              <div class="pi-price">$<?php echo $valor['precio']; ?></div>
              <a href="javascript:;" class="btn add2cart">Add to Cart</a>
              <div class="sticker sticker-new"></div>
          </div>
      </div>

<?php
}
?>

</div>

</div>

<div class="col-12">
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>

</div>

</div>
</div>
<script>
$(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
    });
});
</script>