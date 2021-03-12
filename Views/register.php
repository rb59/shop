<section class="bg-light py-1">


<div class="container ">
				<div class="row align-items-center">
                <div class="col-lg-2"></div>
					<div class="col-lg-8" data-aos="fade-up" data-aos-delay="50">
                    <hr>
						<div class="card rounded-lg text-dark">
							<div class="card-header py-4">Register</div>
							<div class="card-body">
								<div id="result-multiform"></div>
								<form action="<?php echo PATH;?>/user/create" method="post" id="form">
                                <div class="form-group">
										<label class="small text-gray-600" for="leadCapCompany">Name</label>
										<div class="input-group">
											<div class="input-group-prepend ">
												<span class="input-group-text rounded-pill-left" id="inputGroup-sizing-sm"><i class="fas fa-user fa-lg"></i></span>
											</div>
											<input type="text" id="name" name="name" class="form-control rounded-pill-right" />
										</div>
									</div>	
                                <div class="form-group">
										<label class="small text-gray-600" for="leadCapCompany">Email</label>
										<div class="input-group">
											<div class="input-group-prepend ">
												<span class="input-group-text rounded-pill-left" id="inputGroup-sizing-sm"><i class="fas fa-envelope fa-lg"></i></span>
											</div>
											<input type="text" id="email" name="email" class="form-control rounded-pill-right" />
										</div>
									</div>									
									<div class="form-group">
										<label class="small text-gray-600" for="leadCapCompany">Password</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text rounded-pill-left" id="inputGroup-sizing-sm"><i class="fas fa-lock fa-lg"></i></span>
											</div>
											<input type="password" id="password" name="password" class="form-control password-box" />
											<div class="input-group-append password-visibility">
												<button class="btn btn-outline-info rounded-pill-right" id="Checkbox" type="button"><i class="fa fa-eye"></i></button>
											</div>
										</div>
									</div>
									
									<div class="form-row">
										<div class="form-group col-md-12">
											<input type="button" id="multiform_complete" class="btn btn-primary btn-marketing btn-block rounded-pill" value="Register">
										</div>
									</div>
								</form>
							</div>
						</div>
                        <hr>
					</div>
                    <div class="col-lg-2"></div>
				</div>
                
			</div>

            </section>