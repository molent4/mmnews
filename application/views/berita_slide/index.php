<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?= $title; ?>
        <small>List Berita Slide</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-photo"></i> Home</a></li>
        <li class="active">Berita Slide</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <a href="<?= base_url('berita/slide/create'); ?>"><button onclick="" class="btn btn-success btn-linking">Tambah Berita Slide</button></a>
      <div class="row" style="margin-top: 8px;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Berita Slide</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">Judul Berita</th>
                  <th class="text-center">Dibuat oleh</th>
                  <th class="text-center">Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Gecko</td>
                  <td>1.5</td>
                  <td class="text-center">
                    <button type="button" class="btn btn-warning btn-xs">Edit</button>
                    <button type="button" class="btn btn-danger btn-xs">Delete</button>
                  </td>
                </tr>
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

