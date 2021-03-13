<section class="bg-light py-1">


<div class="container ">
        <div class="card">
            <div class="card-header">Cart.  Current Balance: <?=$_SESSION['balance'];?>$</div>
            <div class="card-body">
                <div class="datatablex">
                    <table class="DataTableJSB2 table table-responsive-md table-striped table-bordered dataTable dt-responsive"  data-src="<?php echo PATH;?>/manage/ajax/cursos.php">
                        <thead>
                            <tr>
                                <th class="no-sort">Product</th>
                                <th>Price</th>
                                <th class="no-sort">Quantity</th>
                                <th class="no-sort">Subtotal</th>
                                <th class="no-sort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>prueba</td>
                                <td>prueba</td>
                                <td>1</td>
                                <td>prueba</td>
                                <td>prueba</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="no-sort">Nombre</th>
                                <th>Categoría</th>
                                <th class="no-sort">Imagen</th>
                                <th class="no-sort">Lecciones</th>
                                <th class="no-sort">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row align-items-center">
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
                    <p>Subtotal: 100$ USD</p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
                    <p>Shipping
                    <select class="form-control" name="" id="">
                    <option selected value=""></option>
                    <option value="1">Pick up</option>
                    <option value="2">UPS +5$</option>
                    </select>
                    </p>
                    </div > 
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
                    <button id="btn-rate-" onclick="" class="btn btn-primary btn-marketing btn-block rounded-pill " type="submit">Pay</button>
                    </div>
                </div>
                
                
                
            </div>
            </div>
    </div>


</section>