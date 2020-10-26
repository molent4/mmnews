<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $title ?>
    <small>Edit Data User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
    <li class="active">Pengunjung</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- <div class="callout callout-success" style="display: none">
    <h4>Selamat!</h4>
    <p>Berhasil Memperbaharui Data.</p>
  </div>
  <div class="callout callout-danger" style="display: none">
    <h4>Peringatan!</h4>
    <p></p>
  </div> -->
  <a href="<?php echo base_url('/user'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List</a>
  <form id="formInput" method="POST" action="<?= base_url('user/'. $dataKaryawan['id_user'] . '/update'); ?>">
    <div class="box" style="margin-top: 8px;">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Data User</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
      </div>
      <?= $this->session->flashdata('message'); ?>
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?php echo $dataKaryawan['nama']; ?>" class="form-control" placeholder="Masukan nama...">
              <?php echo form_error('nama','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" value="<?php echo $dataKaryawan['email']; ?>" placeholder="Masukan Prodi..." disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" name="no_tlp" class="form-control" placeholder="Masukan nomor..." value="<?= $dataKaryawan['no_tlp']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select class="form-control" name="jenis_kelamin" disabled>
                <option value="Laki-laki" <?php echo $dataKaryawan['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo $dataKaryawan['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                <option value="Other" <?php echo $dataKaryawan['jenis_kelamin'] == 'Other' ? 'selected' : '' ?>>Other</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat..." value="<?= $dataKaryawan['alamat']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Role</label>
              <select class="form-control" name="role_id" disabled>
                <option value="1" <?php echo $dataKaryawan['role_id'] == 1 ? 'selected' : '' ?>>Administrator</option>
                <option value="2" <?php echo $dataKaryawan['role_id'] == 2 ? 'selected' : '' ?>>Pengunjung</option>
              </select>
            </div>
          </div>
        </div>
    <div class="box-footer clearfix">
      <button type="submit" class="btn btn-success">Simpan Data User</button>
    </div>
    </div>
    </div>
  </form>
</section>
