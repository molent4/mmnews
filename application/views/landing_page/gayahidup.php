<?php $this->load->view('landing_page/layout/header') ?>
<div class="container content-wrapper">
	<div class="col-xs-8 single-content">
		<h4 class="featured-heading">BERITA ARTIKEL</h4>
		<?php foreach ($gayahidup as $item) { ?>
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
			<?php foreach ($gayahidupVideo as $itemVideo) { ?>
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
</div>
<?php $this->load->view('landing_page/layout/footer')  ?>
<?php $this->load->view('landing_page/layout/script') ?>