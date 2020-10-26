<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <?= $title; ?>
    <small>Tambah Berita Video</small>
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
          <h3 class="box-title">Tambah Berita Video</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url('berita/video/store'); ?>" method="POST" enctype="multipart/form-data">
          <div class="box-body">
          <?= $this->session->flashdata('message'); ?>
            <div class="form-group">
              <label for="judulBerita">Judul berita</label>
              <input type="text" class="form-control" id="judulBerita" placeholder="Masukkan judul berita" name="nama_berita">
              <?php echo form_error('nama_berita', '<small class="text-danger" style="color: red; margin-top:8px;">', '</small>');  ?>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control select2" style="width: 70%;" name="id_kategor">
                <?php foreach ($kategori as $item) { ?>
                  <option value="<?php echo $item->id_kategor; ?>"><?php echo $item->nama_kategori; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="videoBerita">Upload video</label>
              <input type="file" id="videoBerita" name="video">
              <?php echo form_error('video', '<small class="text-danger" style="color: red;margin-top:8px;">', '</small>');  ?>
            </div>

            <div class="form-group">
              <label for="kontenBerita">Konten berita</label>
              <!-- <form> -->
              <textarea id="editor1" name="konten_berita" rows="10" cols="80">

                    </textarea>
              <?php echo form_error('konten_berita', '<small class="text-danger" style="color: red; margin-top:8px;">', '</small>');  ?>
              <!-- </form> -->
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-success">Tambah Berita Video</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->