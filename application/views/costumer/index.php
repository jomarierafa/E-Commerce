
 <div class="row">
        <div class="col-lg-3">

          <h1 class="my-4">Tagalog Store</h1>
          <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row" id="availableProduct">
          
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->
    </div>

    <div id="view-cart" class="modal fade-scale">  
        <div class="modal-dialog">  
             <form method="post" id="quantity_form">  
                  <div class="modal-content">  
                       <div class="modal-header">  
                          <h4 class="modal-title">Your Cart</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>    
                       </div>  
                       <div class="modal-body">  
                            <table class="table table-hover" style="margin-top: 20px;">
                              <thead>
                                <tr>
                                  <th>Code</th>
                                  <th>Product</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody id = "showCart">
                                
                              </tbody>
                            </table>  
                       </div>  
                       <div class="modal-footer">  
                            <input type="hidden" name="stock" id="stock" />  
                            <input type="hidden" name="product_id" id="product_id" />                       
                            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Check Out" />  
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                       </div>  
                  </div>  
             </form>  
        </div>  
   </div> 

 <input type="hidden" name="url" id="url" value="<?php echo base_url()?>">

 <script type="text/javascript" src="<?php echo base_url()?>assets/costumer/js/costumers.js"></script>
