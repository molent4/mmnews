<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $title; ?>
    <small>Tambah Berita Slide</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-photo"></i> Home</a></li>
    <li class="active">Berita Slide</li>
  </ol>
</section>,

<!-- Main content -->
<section class="content">
  <a href="<?= base_url('berita/slide'); ?>"><button onclick="" class="btn btn-primary btn-linking"><i class="fa fa-chevron-left"></i> Kembali ke List Berita Slide</button></a>
  <div class="row">
    <div class="col-md-12" style="margin-top: 8px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tambah Berita Slide</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form id="my-awesome-dropzone" action="<?= base_url('berita/slide/store'); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">
              <label for="judulBerita">Judul berita</label>
              <input type="text" name="judul" class="form-control" id="judulBerita" placeholder="Masukkan judul berita">
              <?php echo form_error('judul','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control select2" style="width: 70%;" name="id_kategor">
                <?php foreach ($kategori as $item) { ?>
                  <option value="<?php echo $item->id_kategor; ?>"><?php echo $item->nama_kategori; ?></option>
                <?php } ?>
              </select>
            </div>
            <div id="wrap-gambar">
              <div class="form-group">
                <label for="gambarBerita">Upload gambar</label>
                <input type="file" name="file_gambar">
              </div>
            </div>
            <div style="margin-top: -12px;">
              <?php echo form_error('file_gambar','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>

            <button type="button" id="addFileInput" onclick="" class="btn btn-primary" style="margin-bottom: 8px; margin-top:12px;">Tambah Foto</button>

            <div class="form-group">
              <label for="kontenBerita">Konten berita</label>
              
                <textarea id="editor1" name="isi_berita" rows="10" cols="80">

                </textarea>
                <?php echo form_error('isi_berita','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-success">Tambah Berita Slide</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
<script type="text/javascript">
  $(document).ready(function() {

    $('#addFileInput').click(function() {
      if ($('#wrap-gambar .form-group').length > 4) {
        alert('Maksimal menggunakan 5 Gambar!');
      } else {
        $('#wrap-gambar').append("<div class='form-group' style='display:flex;'><input type='file' name='file_gambar'><a href='javascript:void(0);' class='remove' style='font-size: 16px;'>&times;</a></div>");
        var wrap = $('#wrap-gambar .form-group');

      }

    });

    $(document).on("click", "a.remove", function() {
      $(this).parent().remove();
    });
  });
</script>