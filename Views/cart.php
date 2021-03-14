<section class="bg-light py-1">


<div class="container ">
<div id="result-multiform"></div>
        <div class="card">
            <div class="card-header">Cart.  Current Balance: <?=$_SESSION['balance'];?>$</div>
            <div class="card-body">
                <div class="datatablex">
                    <table class="DataTableJSB2 table table-responsive-md table-striped table-bordered dataTable dt-responsive" >
                        <thead>
                            <tr>
                                <th >Product</th>
                                <th>Price</th>
                                <th >Quantity</th>
                                <th width="30%" colspan="2" >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if (isset($products)) 
                        {
                            foreach ($products as $product) 
                            { ?>  
                                    <tr>
                                        <td><?=$product['name']?></td>
                                        <td id="price-<?=$product['id']?>"><?=$product['price']?>$</td>
                                        <td id="quantity-<?=$product['id']?>"><?=$product['quantity']?> <?=$product['name'] == 'Cheese' ? 'Kg' : ''?>
                                        
                                        </td>
                                        
                                        <td >
                                        
                                        <form style="width:100px !important;" id="form-cart-<?=$product['id']?>" action="<?=PATH?>" method="POST">
                                        <input value="0" class="form-control"type="number" name="quantity" id="input-<?=$product['id']?>">
                                        <?php 
                                        if(strtolower($product['name']) == 'cheese') 
                                        { ?>
                                            <select class="form-control" name="scale" id="scale-<?=$product['id']?>">
                                            <option value="1">Kg</option>
                                            <option value="2">g</option>
                                            </select>
                                        <?php } ?>
                                        </form>
                                        </td>
                                        <td>
                                        <button title="Add" onclick="addFromcart(<?=$product['id']?>);" class="btn btn-datatable btn-icon btn-transparent-dark" type="submit"><i class='fas fa-plus'></i></button>
                                        <button title="Remove" onclick="removeFromcart(<?=$product['id']?>);" class="btn btn-datatable btn-icon btn-transparent-dark" type="submit"><i class='fas fa-trash'></i></button>
                                        
                                        </td>
                                    </tr>
                                
                        <?php
                            }
                        }    
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php 
                if($amount > 0)
                { ?>
                <div class="row align-items-center">
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
                    <p id="subtotal">Subtotal: <?=$amount?>$ USD</p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
                    <form id="pay-form" action="<?=PATH?>/pay" method="POST">
                    <p>Shipping
                    <select class="form-control" name="shipping" id="">
                    <option selected value="0"></option>
                    <option value="1">Pick up</option>
                    <option value="2">UPS +5$</option>
                    </select>
                    </p>
                    </form>
                    </div > 
                    <div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
                    <button id="btn-rate-" onclick="pay();" class="btn btn-primary btn-marketing btn-block rounded-pill " type="submit">Pay</button>
                    </div>
                </div>
                <?php } ?>
                
                
            </div>
            </div>
    </div>


</section>