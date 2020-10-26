    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>Tambah Data User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

<!-- Main content -->
<section class="content">
  <a href="<?php echo base_url('/user'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke List User</a>
  <form id="formInput" method="POST" style="margin-top:8px;" action="<?= base_url('user/store'); ?>">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah Admin</h3>
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
              <input type="text" name="nama" class="form-control" placeholder="Masukan nama..." value="<?php echo set_value('nama'); ?>">
              <?php echo form_error('nama','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Masukan email..." value="<?php echo set_value('email'); ?>">
              <?php echo form_error('email','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
        </div>
        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" name="no_tlp" class="form-control" placeholder="Masukan nomor..." value="<?php echo set_value('no_tlp'); ?>">
              <?php echo form_error('no_tlp','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
          <div class="col-md-6">
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>  
                  </select>
                  <?php echo form_error('jenis_kelamin','<small class="text-danger" style="color: red;">','</small>');  ?>
                </div>
          </div>
        </div>
        <div class="row">
        
          <div class="col-md-6">
          <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukan password...">
              <?php echo form_error('password','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat..." value="<?php echo set_value('alamat'); ?>">
              <?php echo form_error('alamat','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
          </div>
        </div>
          
          
          
          
          
          <!-- <div class="col-md-6">
            <div class="form-group">
              <label>Password Confirmation</label>
              <input type="text" name="password_con" class="form-control" placeholder="Masukan Password Confrim..." required>
            </div>
          </div> -->
      </div>
      <div class="box-footer clearfix">
        <button type="submit" class="btn btn-success">Simpan Data User</button>
      </div>
    </div>
  </form>
</section>
<!-- /.content -->
