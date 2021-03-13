<section class="bg-light py-1">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-8 padding-0_75r mt-4 mb-4">
					<div class="card bg-white post-preview post-preview-featured mb-5">
					<div class="row no-gutters">
                    	<div class="col-lg-5">
							<div class="post-preview-featured-img" style="background-image: url(<?=$product['img'];?>);background-size: contain; "></div>
						</div>
						<div class="col-lg-7">
							<div class="card-body bg-white">
                            <div class="d-flex align-items-center">
                            <div class="col-md-6">
                                    <h5>Rating</h5>
										<p action="<?=PATH?>/rating/<?=$product['id']?>" id="rating-1" class="rating card-text text-gray-600"></p>
									</div>
									<div class="col-md-6">
										<h5>Price</h5>
										<p class="card-text text-gray-600"><?=$product['price'];?>$</p>
									</div>
								</div>
								<hr>
								<div class="py-3">
									<h5 class="card-title"><?=$product['name']; ?></h5>
									<p class="card-text"><?= $product['description']; ?></p>
								</div>
                                
							</div>
						</div>
					</div>
					<div class="card-body bg-light">
					<div id="result-multiform"></div>
                        <div class="row allign-items-center">
                            
                                <div class="col-md-6">
								<form id="form-rate-<?=$product['id']?>" action="<?=PATH?>/rate/<?=$product['id']?>" method="POST">
								<p class="card-text text-gray-600">Rate</p>
                                <p><select class="form-control" name="rating" id="rate">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                </select></p>
								</form>
                                </p><button onclick="rate(<?=$product['id']?>)" class="btn btn-primary btn-marketing btn-block rounded-pill " type="submit">Rate</button></p>
                                </div>
                                <div class="col-md-6">
								
								<form id="form-add-<?=$product['id']?>" action="<?=PATH?>/add/<?=$product['id']?>" method="POST">
                                <p class="card-text text-gray-600">Quantity</p>
                                <p><input class="form-control" type="number" name="quantity" id="" value="1"></p>
                                <?php if(strtolower($product['name']) == 'cheese')  
                                { ?>
                                    <p><select class="form-control" name="scale" id="">
                                    <option value="1">Kg</option>
                                    <option value="2">g</option>
                                    </select></p>
                                <?php } ?>
								</form>
                                <p><button onclick="add(<?=$product['id']?>)" class="btn btn-primary btn-marketing btn-block rounded-pill " type="submit">Add</button></p>
								
								</div>
                        </div>
					</div>
				</div>
			</div>
		
	</section>