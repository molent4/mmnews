<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?= $title; ?>
        <small>Tambah Berita Artikel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i> Home</a></li>
        <li class="active">Berita Artikel</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?= base_url('berita/artikel'); ?>"><button onclick="" class="btn btn-primary btn-linking"><i class="fa fa-chevron-left"></i> Kembali ke List Berita Artikel</button></a>
    <div class="row">
        <div class="col-md-12" style="margin-top: 8px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Berita Artikel</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="judulBerita">Judul Berita</label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukkan judul berita">
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control select2" style="width: 70%;" name="id_kategor">
                                <?php foreach ($kategoriBerita as $kategori) { ?>
                                    <option value="<?php echo $kategori->id_kategor; ?>"><?php echo $kategori->nama_kategori; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gambarBerita">Upload gambar</label>
                            <input type="file" name="image" multiple>
                        </div>
                        <div class="form-group">
                            <label for="kontenBerita">Konten Berita</label>
                            <textarea id="jenjang" name="editor1" rows="10" cols="80">

                    </textarea>

                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Tambah Berita Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

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
                        formData1.append('judul', formData.get('judul'));
                        formData1.append('id_kategor', formData.get('id_kategor'));
                        formData1.append('compressImage', result, result.name);
                        formData1.append('editor1', CKEDITOR.instances.jenjang.getData());
                        console.log(formData1.get('compressImage'));
                        $.ajax({
                            type: 'POST',
                            processData: false,
                            contentType: false,
                            url: '<?= base_url('berita/artikel/add'); ?>',
                            data: formData1,
                            success: function(response) {
                                console.log(response);
                                alert('Berita Berhasil Disimpan!');
                                window.location = '<?= base_url('berita/artikel'); ?>';
                            },
                            error: function(response) {
                                console.log(response.responseText);
                                alert('Berita Gagal Disimpan!');
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