<section class="bg-light py-1">
		<div class="container mt-4">
			
			<hr class="mt-0">
			<div id="result-multiform"></div>
			<div class="row justify-content-center">
			
			<?php
			foreach ($products as $product) 
            {
			?>
				<div class="post col-lg-6 mb-5">
					<div class="card text-decoration-none h-100 lift"><div class="card-body py-5">
						<div class="row align-items-center">
							<div class="col-md-4 mb-md-0 mb-3 text-center">
									<img src="<?=$product['img']?>" width="150" height="150">
								
							</div>
							<div class="col-md-8">
								<div class="ml-4">
									<h5><?php echo $product["name"];?></h5>
									<p class="card-text text-gray-600"><?php echo $product["description"];?></p>
									<a  href="<?=PATH?>/product/<?=$product['id']?>">more</a>
								</div>
							</div>
                            
						</div>
                        <hr>
						<div class="row align-items-center ml-1">
							<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
								<h5>Rating</h5>
								<p action="<?=PATH?>/rating/<?=$product['id']?>" id="rating-<?=$product['id']?>" class="card-text text-gray-600 rating"></p>
							</div>
							<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
							<form id="form-rate-<?=$product['id']?>" action="<?=PATH?>/rate/<?=$product['id']?>" method="POST">
                            	<select class="form-control" name="rating" >
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
                                </select>
							</form>
							</div>
							<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
							<button onclick="rate(<?=$product['id']?>)" class="btn btn-primary btn-marketing btn-block rounded-pill " type="submit">Rate</button>
							</div>
						</div>
						<hr>
						<div class="row align-items-center ml-1">
							<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
								<h5>Price</h5>
								<p class="card-text text-gray-600"><?php echo $product['price'];?>$</p>
							</div>
							
							<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
							<form id="form-add-<?=$product['id']?>" action="<?=PATH?>/add/<?=$product['id']?>" method="POST">
								<p class="card-text text-gray-600">Quantity</p>
                                <input class="form-control" type="number" name="quantity" id="quantity-<?=$product['id']?>" value="1">
                                <?php 
                                if(strtolower($product['name']) == 'cheese') 
                                { ?>
                                    <select class="form-control" name="scale" id="">
                                    <option value="1">Kg</option>
                                    <option value="2">g</option>
                                    </select>
                                <?php } ?>
							</form>
							</div>
							
							<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4 mb-xl-0 mb-md-0 mb-lg-3 mb-3">
							
								<button onclick="add(<?=$product['id']?>);" class="btn btn-primary btn-marketing btn-block rounded-pill " type="submit">Add</button>
								
							
								
							</div>
							
						</div>
						
						<hr>
						</div>
					</div>
				</div>
			<?php 
			}
			
			?>
			</div>
			
		</div>
        
	</section>