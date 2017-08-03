<!--HEADER-->
<div class="hotline">
	<div class="imagehotline"><img src="<?php echo DOMAIN ?>images/hotline.png" alt=""></div>
	<div class="phonenumber">HOTLINE: 0945.365.882</div>
</div>
<!--menu-->
<div class="menu">
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav " >
						<li><a href="<?php echo DOMAIN ?>">TRANG CHỦ  </a></li>
						<li><a href="<?php echo DOMAIN ?>gioi-thieu.html">GIỚI THIỆU</a></li>
						<li id="drop">
                                <a href="<?php echo DOMAIN ?>san-pham" class="dropdown">SẢN PHẨM </a>
                                <ul class="dropdown-menu">
                                    <?php $menudropdown = $this->requestAction('comment/get_menuleft');
                                    foreach ($menudropdown as $row ) {
                                    ?>
                                    <li><a href="<?php echo DOMAIN ?><?php echo $row['Catproduct']['alias'].'.htm'; ?>"><?php echo $row['Catproduct']['name']; ?></a></li>
                                    <?php } ?>
                                </ul>
						</li>
						<li><a href="<?php echo DOMAIN ?>da-thi-cong"> ĐÃ THI CÔNG </a></li>
						<li><a href="<?php echo DOMAIN ?>mau-thiet-ke">MẪU THIẾT KẾ</a></li>
						<li><a href="<?php echo DOMAIN ?>tin-tuc">TIN TỨC </a></li>
						<li><a href="<?php echo DOMAIN ?>lien-he.html"> LIÊN HỆ </a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>
<!--END MENU-->

<!--search-->
<div class="container">
	<form class="navbar-form navbar-right">
		<div class="form-group">
			<input type="text" class="form-control search" placeholder="Search">
		</div>
		<button type="submit" class="btn btn-default iconseach"><img src="<?php echo DOMAIN ?>images/icon_search.png" alt=""></button>
	</form>
</div>