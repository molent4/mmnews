<?php $this->load->view('landing_page/layout/header') ?>
<div class="container content-wrapper">
	<div class="col-xs-8 single-content">
		<h4 class="featured-heading">BERITA ARTIKEL</h4>
		<?php foreach ($teknologi as $item) { ?>
			<div class="box-big-loop">
				<div class="big-loop-item">
					<a href="<?php echo base_url('berita/') . $item->id_artikel; ?>"><img style="width: 185px; height: 100px;" src="<?= base_url('assets/public/imageupload/') . $item->image ?>" alt="" class="img-responsive"></a>
					<div class="item-content">
						<h4 class="item-heading"><a href="<?php echo base_url('berita/') . $item->id_artikel; ?>"><?= $item->judul_artikel; ?></a></h4>
						<p>
							<?php
							$num_char = 200;
							$text = $item->isi_artikel;
							echo substr($text, 0, $num_char) . '...';
							?>
						</p>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="box-thumbnail">
			<h4 class="featured-heading"> BERITA VIDEO </h4>
			<?php foreach ($teknologiVideo as $itemVideo) { ?>
				<div class="box-category-1 c3">
					<a href="<?php echo base_url('video/') . $itemVideo->id_video; ?>">
						<video width="180" height="100">
							<source src="<?= base_url('assets/public/video/input/' . $itemVideo->nama_video); ?>" type="video/mp4">
						</video>
					</a>
					<div class="item-featured">
						<h4 class="item-heading"><a href="<?php echo base_url('video/') . $itemVideo->id_video; ?>"><?= $itemVideo->nama_berita; ?></a></h4>
					</div>
				</div> <!-- jumlah 6 -->
			<?php } ?>
		</div>
	</div>

	<!-- <div class="col-xs-4 box-sidebar" style="width: 33.33333333%;">
		<div class="box-category-1">
			<h3 class="sidebar-heading"> Berita Slider </h3>
			<div class="media-news">
				<div class="media-item">
					<div class="media-image">
						<a href=""><img src="<?php echo base_url(); ?>assets/public/image/news/test.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="media-content">
						<h4 class="media-title"><a href="">Pimpinan Bingung Peran KPK di Tim Investigasi Kasus Novel</a></h4>
					</div> jumlah 7 
				</div>
			</div>
		</div>
	</div> -->
</div>
<?php $this->load->view('landing_page/layout/footer')  ?>
<?php $this->load->view('landing_page/layout/script') ?>