<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MMNews</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/bootstraps/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/public/bootstraps/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/public/theme/css/main.css">
  </head>


  <body>
    <nav class="navbar navbar-default" style="padding: 0 20px 0 0">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
              <img style="padding-bottom: 40px" src="<?php echo base_url();?>assets/public/image/site/logo1.png" alt="Logo MMNews" class="main-logo">
            </a>
        </div>
        <form class="navbar-form navbar-left" method="POST" action="<?php echo base_url('searchingController/search') ?>">
            <div class="form-group">
              <input type="text" name="judul" class="form-control" placeholder="Berita apa yang ingin Anda Baca hari ini?">
            </div>
            <button type="submit" class="btn btn-default" style="background-color:#32e0c4;">Cari</button>
        </form>
     
        <ul class="nav navbar-nav navbar-primary text-center">
          <li><a href="<?php echo base_url('LandingPageController/navbar/home') ?>">Home</a></li>
          <li><a href="<?php echo base_url('LandingPageController/navbar/GayaHidup') ?>">Gaya Hidup</a></li>
          <li><a href="<?php echo base_url('LandingPageController/navbar/Olahraga') ?>">Olahraga</a></li>
          <li><a href="<?php echo base_url('LandingPageController/navbar/Politik') ?>">Politik</a></li>
          <li><a href="<?php echo base_url('LandingPageController/navbar/Teknologi') ?>">Teknologi</a></li>
          
          <?php 
	    		/**
	    		 * Displayed User Menu
	    		 * if permission ( akun ) else (login or signup )
	    		 *
	    		 **/
	    		if($this->session->role_id == NULL) : 
	    		?>
          <li><a href="<?php echo base_url("LoginController/login") ?>">Masuk</a></li>
          <li><a href="<?php echo base_url('daftar') ?>">Daftar</a></li>
          <?php else : ?>
          <li class="dropdown">
	        		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user-o" style="padding-right: 10px;"></i>
	        		<?php echo $this->session->userdata('nama'); ?>
	        		<span class="caret"></span></a>
	        		<ul class="dropdown-menu">
	          			<li><a href="<?php echo base_url("UserProfile") ?>">Profil Saya</a></li>
	          			<!-- <li><a href="">Ganti Password</a></li> -->
	          			<li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
	        		</ul>
            </li>
            <?php endif; 
	      		/* End user menu */
	      		?>
        </ul>
    </nav>
<!-- End Topik Content -->