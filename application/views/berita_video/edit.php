<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <?= $title; ?>
    <small>Edit Berita Video</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-youtube-play"></i> Home</a></li>
    <li class="active">Berita Video</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <a href="<?= base_url('berita/video'); ?>"><button onclick="" class="btn btn-primary btn-linking"><i class="fa fa-chevron-left"></i> Kembali ke List Berita Video</button></a>
  <div class="row">
    <div class="col-md-12" style="margin-top: 8px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Berita Video</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <?= $this->session->flashdata('message'); ?>
        <form role="form" action="<?= base_url('berita/video/update/' . $dataBerita['id_video']); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="judulBerita">Judul berita</label>
              <input type="text" class="form-control" id="judulBerita" placeholder="Masukkan judul berita" name="judul" value="<?= $dataBerita['nama_berita']; ?>">
              <?php echo form_error('judul', '<small class="text-danger" style="color: red; margin-top:8px;">', '</small>');  ?>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control select2" style="width: 70%;" name="id_kategor">
                <?php foreach ($kategori as $item) { ?>
                  <option <?php echo ($item->id_kategor == $dataBerita['id_kategori']) ? 'selected' : ''; ?> value="<?php echo $item->id_kategor; ?>"><?php echo $item->nama_kategori; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="videopreview">Video</label>
              <div>
                <video width="320" height="240" controls>
                  <source src="<?= base_url('assets/public/video/output/' . $dataBerita['nama_video']); ?>" type="video/mp4">
                </video>
              </div>

            </div>
            <div class="form-group">
              <label for="videoBerita">Ganti Video</label>
              <input type="file" id="videoBerita" name="video">
            </div>

            <div class="form-group">
              <label for="kontenBerita">Konten berita</label>
                <textarea id="editor1" name="konten_berita" rows="10" cols="80">
                  <?= $dataBerita['konten_video']; ?>
                </textarea>
                <?php echo form_error('konten_berita', '<small class="text-danger" style="color: red; margin-top:8px;">', '</small>');  ?>

            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-success">Update Berita Video</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->