<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<section class="content-header">
  <h1>
    <?= $title; ?>
    <small>Edit Profile</small>
  </h1>
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
          <?= $this->session->flashdata('message'); ?>
          <a href="<?php echo base_url('profile'); ?>" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali ke Profile</a>
          <div class="foto-profil" style="width:15%; text-align: center; position:relative; padding-bottom:15%; border-radius:50%; overflow:hidden; margin:8px auto 0;">
            <img class="foto" src="<?php echo base_url() . 'assets/public/imageupload/user/' . $user['image']; ?>" alt="User profile picture" style="position:absolute; height:100%; width:100%; top:0; left:0; object-fit:cover;">
          </div>

          <h3 class="profile-username text-center"><?= $user['nama']; ?></h3>

          <p class="text-muted text-center">
            <?php if ($user['role_id'] == 1) {
              echo "Administrator";
            } else {
              echo "Pengunjung";
            } ?>
          </p>

          <form class="form-horizontal col-xs-10 col-xs-offset-1" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'];  ?>">
                <?php echo form_error('nama', '<small class="text-danger" style="color: red">', '</small>');  ?>
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
                <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="<?= $user['no_tlp'];  ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="address" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="alamat" value="<?= $user['alamat'];  ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="image" class="col-sm-2 control-label">Gambar Profile</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image">
              </div>
            </div>


            <!-- /.box-body -->
            <div class="box-footer">
              <div class="text-center">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('form').on('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      const file = formData.get('image')
      

      if (file) {
        new ImageCompressor(file, {
          quality: .5,
          success(result) {
            
            const formData1 = new FormData();
            formData1.append('compressImage', result, result.name);
            formData1.append('name',formData.get('nama'));
            formData1.append('phone',formData.get('no_tlp'));
            formData1.append('address',formData.get('alamat'));
            console.log(formData1.get('compressImage'));
            $.ajax({
              type: 'POST',
              processData: false,
              contentType: false,
              url: '<?= base_url('profile/update'); ?>',
              data: formData1,
              success : function(response){
                alert('Profil berhasil diupdate!');
                window.location = '<?= base_url('profile'); ?>';
              },
              error : function(){
                alert('Profil gagal diupdate!');
              }
            })

          },
          error(e) {
            console.log(e.message);
          },
        });
      }

      
    })
  });
</script>