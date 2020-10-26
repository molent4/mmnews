<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>List User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <a href="<?php echo site_url('user/create'); ?>" class="btn btn-success btn-linking">Tambah Data User</a>
      <div class="row" style="margin-top:8px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Nomor Telepon</th>
                  <th>Role</th>
                  <th>Option</th>
                </tr>
                </thead>
                  <tbody>
                  <?php foreach($dataUser as $user){ ?>
                    <tr>
                      <td><?php echo $user->nama; ?></td>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $user->no_tlp; ?></td>
                      <td><?php if($user->role_id == 1){
                                  echo "Administrator";}
                                else{
                                  echo "Pengunjung";}
                                  ?>
                      <td>
                        <a href="<?php echo base_url('user/'.$user->id_user); ?>" class='btn btn-xs btn-warning'><i class='fa fa-pencil'></i> Edit</a>
                        <button class='btn btn-xs btn-danger' onclick="deleteData(<?php echo $user->id_user; ?>)"><i class='fa fa-trash'></i> Delete</button>
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
  $(function(){
    $('#tableData').DataTable();
  })
  function deleteData(id_user){
    if(confirm("Apakah anda yakin menghapus data ini ?")){
      $.ajax({
        method : 'POST',
        url : '<?php echo base_url("user/delete");?>',
        data : {id_user: id_user},
        success : function(data){
          location.reload(true);
        },
        error: function( json ){
          alert("Gagal menghapus data !");
        }
      })
    }
  }
</script>
