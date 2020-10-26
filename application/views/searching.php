<?php $this->load->view('landing_page/layout/header') ?>
<div class="container content-wrapper">
	<div class="col-xs-8 single-content">
		<h4 class="featured-heading">BERITA TERKAIT</h4>
		<?php if(isset($berita)){ ?>
			<?php foreach ($berita as $item) { ?>
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
		<?php } ?>
	</div>
</div>
<?php $this->load->view('landing_page/layout/footer')  ?>
<?php $this->load->view('landing_page/layout/script') ?>