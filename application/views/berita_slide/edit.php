<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Berita Slide
        <small>Edit Berita Slide</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-photo"></i> Home</a></li>
        <li class="active">Berita Slide</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <button onclick="" class="btn btn-primary btn-linking"><i class="fa fa-chevron-left"></i> Kembali ke List Berita Slide</button>
      <div class="row">
      <div class="col-md-12" style="margin-top: 8px;">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Berita Slide</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="judulBerita">Judul berita</label>
                  <input type="text" class="form-control" id="judulBerita" placeholder="Masukkan judul berita">
                </div>
                <div class="form-group">
                  <label for="gambarBerita">Upload gambar</label>
                  <input type="file" id="gambarBerita">
                </div>

                <button onclick="" class="btn btn-danger btn-linking" style="margin-bottom: 8px;">Delete Foto dan Caption</button>
                <br>  
                <button onclick="" class="btn btn-primary btn-linking pull-right" style="margin-bottom: 8px;">Tambah Foto dan Caption Baru</button>
                

                <div class="form-group">
                  <label for="kontenBerita">Konten berita</label>
                  <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            
                    </textarea>
                  </form>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Update Berita Artikel</button>
              </div>
            </form>
          </div>
          </div>
          </div>
    </section>
    <!-- /.content -->