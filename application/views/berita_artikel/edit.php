<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>Edit Berita Artikel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li>
        <li class="active">Edit Berita Artikel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <button onclick="" class="btn btn-primary btn-linking"><i class="fa fa-chevron-left"></i> Kembali ke List Berita Artikel</button>
      <div class="row">
      <div class="col-md-12" style="margin-top: 8px;">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Berita Artikel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('ArtikelController/update') ?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?php echo $artikel->id_artikel ?>" />
                  <label for="judulBerita">Judul Berita</label>
                  <input type="text" value="<?php echo $artikel->judul_artikel ?>" class="form-control" name="judul" placeholder="Masukkan judul berita">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="form-control select2" style="width: 70%;" name="id_kategor">
                    <?php foreach($kategoriBerita as $kategori){ ?>
                      <option <?php echo ($kategori->id_kategor == $artikel->id_kategor) ? 'selected' : ''; ?> value="<?php echo $kategori->id_kategor; ?>"><?php echo $kategori->nama_kategori; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- <div class="form-group">
                  <label for="gambarBerita">Upload gambar</label>
                  <input type="file" id="gambarBerita" name="image">
                </div> -->

                <div class="form-group">
                  <label for="kontenBerita">Konten Berita</label>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                     <?php echo $artikel->isi_artikel ?>                       
                    </textarea>

                </div>

                <div class="form-group" hidden>
                  <label for="kontenBerita">Konten Berita</label>
                    <input type="text" id="editors" name="editors" value="<?php echo $artikel->nama ?>">

                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Edit Berita Artikel</button>
              </div>
            </form>
          </div>
          </div>
          </div>
    </section>
    <!-- /.content -->