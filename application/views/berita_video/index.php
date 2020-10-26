<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $title; ?>
    <small>List Berita Video</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-youtube-play"></i> Home</a></li>
    <li class="active">Berita Video</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <a href="<?= site_url('berita/video/create'); ?>"><button onclick="" class="btn btn-success btn-linking">Tambah Berita Video</button></a>
  <div class="row" style="margin-top: 8px;">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Berita Video</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Judul Berita</th>
                <th>Kategori Berita</th>
                <th>Dibuat oleh</th>
                <th>Tanggal</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($berita as $item) { ?>
                <tr>
                  <td><?= $item->nama_berita; ?></td>
                  <td><?= $item->nama_kategori; ?></td>
                  <td><?= $item->nama; ?></td>
                  <td><?= $item->tangggal_video; ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('berita/video/edit/' . $item->id_video); ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>
                    <button type="button" onclick="deleteData(<?php echo $item->id_video; ?>)" class="btn btn-danger btn-xs">Delete</button>
                  </td>
                </tr>
              <?php } ?>
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
<script>
  function deleteData(id_berita) {
    if (confirm("Apakah anda yakin menghapus data ini ?")) {
      $.ajax({
        method: 'POST',
        url: '<?php echo base_url("berita/video/delete"); ?>',
        data: {
          id_berita: id_berita
        },
        success: function(data) {
          location.reload(true);
        },
        error: function(json) {
          alert("Gagal menghapus data !");
        }
      })
    }
  }
</script>