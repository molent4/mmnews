<?php $this->load->view('landing_page/layout/header') ?>

	<div class="container content-wrapper">
		<!-- Single Content -->
		<div class=" single-content">
			<h1><?php echo $detailArtikel['judul_artikel'];?></h1>
			<div class="author-box">
				<div class="media">
				  	<div class="media-left media-middle">
				    	<a href="#">
				      		<img class="media-object img-circle" src="<?= base_url('assets/public/imageupload/user/') . $detailArtikel['image2'];?>" alt="..." width="40">
				    	</a>
				  	</div>
				  	<div class="media-body">
				    	<a class="media-heading"><?php echo $detailArtikel['nama']; ?></a> <br>
				   		<small><?php echo $detailArtikel['date_created']; ?></small>
				  	</div>
				</div>
				<div class="sharethis-inline-share-buttons"></div>
			</div>
			<article class="content-news">
				<figure>
				  	<img style="padding-left: 100px;" src="<?= base_url('assets/public/imageupload/') . $detailArtikel['image'];?>" alt="" class="img-responsive">
				</figure>
				<p><?php echo $detailArtikel['isi_artikel'];?></p>
			</article>
			
			<div class="author-box">
				<div class="media">
				  	<div class="media-left media-middle">
				    	<a href="#">
				      		<img class="media-object img-circle" src="<?= base_url('assets/public/imageupload/user/') . $detailArtikel['image2'];?>" alt="..." width="40">
				    	</a>
				  	</div>
				  	<div class="media-body">
				    	<a class="media-heading"><?php echo $detailArtikel['nama']; ?></a> <br>
				   		<small><?php echo $detailArtikel['date_created']; ?></small>
				  	</div>
				</div>
				<div class="sharethis-inline-share-buttons"></div>
			</div>

		</div>		
	</div>
<?php $this->load->view('landing_page/layout/footer') ?>