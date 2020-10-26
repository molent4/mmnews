<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style type="text/css">
  #maxl {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 14px;     /* fallback */
   max-height: 60px;      /* fallback */
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>List Berita Artikel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li>
        <li class="active">Berita Artikel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <a href="<?= site_url('berita/artikel/create'); ?>"><button onclick="" class="btn btn-success btn-linking">Tambah Berita Artikel</button></a>
      <div class="row" style="margin-top: 8px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Berita Artikel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Judul Berita</th>
                  <th>Kategori Berita</th>
                  <th width="100px">Upload oleh</th>
                  <th>Konten Berita</th>
                  <th width="128">Gambar</th>
                  <th>Tanggal Dibuat</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php foreach ($artikel as $artikels):?>
                  <td><?php echo $artikels->judul_artikel ?></td>
                  <td><?php echo $artikels->nama_kategori ?></td>
                  <td><?php echo $artikels->nama ?></td>
                  <td id="maxl"width="400"><?php echo $artikels->isi_artikel ?></td>
                  <td><img src="<?php echo base_url().'assets/public/imageupload/'.$artikels->image;?>" width="128" /></td>
                  <td><?php echo $artikels->date_created ?></td>
                  <td class="text-center"> 
                    <a href="<?= site_url('berita/artikel/edit/'.$artikels->id_artikel); ?>"><button onclick="" class="btn btn-warning btn-xs">Edit</button></a>
                    <a href="<?= site_url('berita/artikel/delete/'.$artikels->id_artikel); ?>"><button onclick="" class="btn btn-danger btn-xs">Delete</button></a>
                    
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

