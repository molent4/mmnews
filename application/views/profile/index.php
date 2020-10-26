<?php 
  defined('BASEPATH') OR exit('No direct script access allowed');
 ?>

<section class="content-header">
    <h1><?= $title; ?></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-address-card"></i> Home</a></li>
      <li class="active">My Profile</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <!-- Profile Image -->
      <div class="box">
        <div class="box-body">
          <div class="foto-profil" style="width:15%; text-align: center; position:relative; padding-bottom:15%; border-radius:50%; overflow:hidden; margin:8px auto 0;">
          <img class="foto" src="<?php echo base_url() . 'assets/public/imageupload/user/' . $user['image']; ?>" alt="User profile picture" style="position:absolute; height:100%; width:100%; top:0; left:0; object-fit:cover;">
          </div>
          

          <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

          <p class="text-muted text-center">
            <?php if($user['role_id'] == 1){
                echo "Administrator";
            }
            else{
              echo "Pengunjung";
            }?>
            </p>

          <div class="form-horizontal col-xs-10 col-xs-offset-1">
				    <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'];  ?>" disabled>
              </div>
            </div>

            <div class="form-group">
              <label for="gender" class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="gender" name="gender" value="<?= $user['jenis_kelamin'];  ?>" disabled>
              </div>
            </div>

              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'];  ?>" disabled>
                </div>
              </div>

              <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">No. Telepon/Hp</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['no_tlp'];  ?>" disabled>
                </div>
              </div>

              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" name="address" value="<?= $user['alamat'];  ?>" disabled>
                </div>
              </div>

              
              <!-- /.box-body -->
            <div class="box-footer">
              <div class="text-center">
              	<a href="<?php echo base_url('profile/edit'); ?>"><button class="btn btn-info btn-linking">Edit</button></a>
                <a href="<?php echo base_url('profile/password'); ?>"><button class="btn btn-warning btn-linking">Change Password</button></a>
              </div>    
            </div>
              <!-- /.box-footer -->
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>