<nav class="navbar navbar-marketing navbar-expand-lg bg-light2 shadow navbar-light2 fixed-top">
		<div class="container">
			<a class="navbar-brand" href="<?php echo PATH;?>/"><img src="<?php echo PATH;?>/resources/img/cart.png" width="40">MY SHOP </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i data-feather="menu"></i></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item ">
						<a class="nav-link" href="<?php echo PATH;?>/products">Products</a>
					</li>
					<li class="nav-item">
							<a class="nav-link" href="<?php echo PATH;?><?= isset($_SESSION['id']) ? '/mycart' : '/login'; ?> "> <?= isset($_SESSION['id']) ? 'Cart' : 'Login'; ?></a>
					</li>    
					<li class="nav-item ">
							<a class="nav-link" href="<?php echo PATH;?><?= isset($_SESSION['id']) ? '/purchases' : '/register'; ?>"><?= isset($_SESSION['id']) ? 'Purchases' : 'Register'; ?></a>
					</li>
					<?= isset($_SESSION['id']) ? '<li class="nav-item "><a class="nav-link" href="'.PATH.'/logout">LogOut</a></li>' : ''?>
			</div>
		</div>
	</nav>
    <header class="page-header2 page-header2-compact page-header2-light border-bottom bg-white pt-10">
		<div class="container">
			<div class="page-header2-content">
				<div class="row align-items-center justify-content-between pt-4">
					<div class="col-auto mb-3">
						<h1 class="page-header2-title">
							
						</h1>
					</div>
				</div>
			</div>
		</div>
	</header>