<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign Up</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?= $this->session->flashdata('message'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Sign Up</b> MM News</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <form id="formInput" method="POST" style="margin-top:8px;" href="<?php echo base_url('daftar/simpan') ?>">
      <div class="form-group has-feedback">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo set_value('nama'); ?>">
              <?php echo form_error('nama','<small class="text-danger" style="color: red;">','</small>');  ?>
            </div>
      <div class="form-group has-feedback">
         <label>Email</label>
              <input type="text" name="email" class="form-control" placeholder="Masukan Email" value="<?php echo set_value('email'); ?>">
              <?php echo form_error('email','<small class="text-danger" style="color: red;">','</small>');  ?>
      </div>
      <div class="form-group has-feedback">
         <label>Nomor Telepon</label>
              <input type="text" name="no_tlp" class="form-control" placeholder="Masukan Nomor" value="<?php echo set_value('no_tlp'); ?>">
              <?php echo form_error('no_tlp','<small class="text-danger" style="color: red;">','</small>');  ?>
      </div>
      <div class="form-group has-feedback">
         <label>Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>  
                  </select>
                  <?php echo form_error('jenis_kelamin','<small class="text-danger" style="color: red;">','</small>');  ?>
      </div>
      <div class="form-group has-feedback">
          <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Masukan Password">
              <?php echo form_error('password','<small class="text-danger" style="color: red;">','</small>');  ?>
      </div>
      <div class="form-group has-feedback">
         <label>Alamat</label>
              <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?php echo set_value('alamat'); ?>">
              <?php echo form_error('alamat','<small class="text-danger" style="color: red;">','</small>');  ?>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4" >
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
