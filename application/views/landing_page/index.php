<?php $this->load->view('landing_page/layout/header') ?>
<!-- CONTENT FEATURED VIDO -->
  <div class="container content-wrapper">
 
      <div class="box-thumbnail">
        <h3 class="featured-heading"> Berita Video </h3> 
        <?php foreach ($video as $itemVideo) { ?>
        <div class="box-category-1 c3">
          <a href="<?php echo base_url('video/'). $itemVideo->id_video;?>">
          <video width="250" height="200">
            <source src="<?= base_url('assets/public/video/input/' . $itemVideo->nama_video) ;?>" type="video/mp4">
          </video>
          </a>
          <div class="item-featured">
            <h4 class="item-heading"><a href="<?php echo base_url('video/'). $itemVideo->id_video;?>"><?= $itemVideo->nama_berita?></a></h4>
          </div>
        </div>
        <?php } ?>
      </div>

      
    <div class="col-xs-12">
    <hr>
    <h3 class="featured-heading">Berita Artikel Terbaru</h3>
    <?php foreach ($artikel as $item) { ?>
      <div class="box-big-loop">
        <div class="big-loop-item">
          <a href="<?php echo base_url('berita/'). $item->id_artikel;?>"><img style="width: 250px; height: 150px;" src="<?= base_url('assets/public/imageupload/') . $item->image ?>" alt="" class="img-responsive"></a>
          <div class="item-content">
            <a href=""><span class="category-title"><?= $item->nama_kategori; ?></span></a>
            <h4 class="item-heading"><a href="<?php echo base_url('berita/'). $item->id_artikel;?>"><?= $item->judul_artikel; ?></a></h4>
            <p>
              <?php 
              $num_char = 120;
              $text = $item->isi_artikel;
              echo substr($text, 0, $num_char) . '...';
              ?></p>
          </div>
        </div>
        <hr>
      </div>
    <?php } ?>
  </div>
</div>

<?php $this->load->view('landing_page/layout/footer') ?>
<?php $this->load->view('landing_page/layout/script') ?>
