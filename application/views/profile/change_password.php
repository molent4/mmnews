<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<section class="content-header">
    <h1>
    <?= $title; ?>
    <small>Change Password</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-address-card"></i> Home</a></li>
      <li class="active"><?= $title ?></li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <!-- Profile Image -->
      <div class="box">
        <div class="box-body"> 
        <a href="<?php echo base_url('profile'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke Profile</a>
        <form class="form-horizontal col-sm-10 col-sm-offset-1" method="post" action="<?= base_url('profile/password/update'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="oldPassword" class="col-sm-2 control-label">Password Lama</label>

                  <div class="col-sm-10">
                    <input type="password" name="oldPassword" class="form-control" id="oldPassword" placeholder="Masukkan pasword lama...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="newPassword" class="col-sm-2 control-label">Password Baru</label>

                  <div class="col-sm-10">
                    <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Masukkan password baru...">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="text-center">  
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Change Password 
                    </button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
      </div>
      
    </div>
  </div>
</section>