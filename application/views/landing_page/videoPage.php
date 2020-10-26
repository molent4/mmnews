<?php $this->load->view('landing_page/layout/header') ?>

	<div class="container content-wrapper">
		<!-- Single Content -->
		<div class=" single-content">
			<h1><?php echo $detailVideo['nama_berita'];?></h1>
			<div class="author-box">
				<div class="media">
				  	<div class="media-middle">
				  	</div>
				  	<div class="media-body">
				    	<a class="media-heading"><?php echo $detailVideo['nama']; ?></a> <br>
				   		<small><?php echo $detailVideo['tangggal_video']; ?></small>
				  	</div>
				</div>
				<div class="sharethis-inline-share-buttons"></div>
			</div>
			<article class="content-news">
	          <video width="900" controls>
	            <source src="<?= base_url('assets/public/video/input/'. $detailVideo['nama_video']) ;?>" type="video/mp4">
	          </video>
				<p><?php echo $detailVideo['konten_video'];?></p>
			</article>
			
			<div class="author-box">
				<div class="media">
				  	<div class="media-left media-middle">
				    	<a href="#">
				      		<img class="media-object img-circle" src="<?= base_url('assets/public/imageupload/user/') . $detailVideo['image'];?>" alt="..." width="40">
				    	</a>
				  	</div>
				  	<div class="media-body">
				    	<a class="media-heading"><?php echo $detailVideo['nama']; ?></a> <br>
				   		<small><?php echo $detailVideo['date_created']; ?></small>
				  	</div>
				</div>
				<div class="sharethis-inline-share-buttons"></div>
			</div>

		</div>		
	</div>
<?php $this->load->view('landing_page/layout/footer') ?>