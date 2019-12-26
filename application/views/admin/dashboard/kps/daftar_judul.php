<div class="content-wrapper">
  <style type="text/css">
      th{
          text-align: center;
      }
      td{
          text-align: center;
      }
  </style>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div>
              <!-- <br> -->
              <h3 class="box-title">Daftar Judul Penelitian</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-judul-baru">
                  <i class="fa fa-plus-square"></i> Judul Baru
                </button>&nbsp;
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">Jenjang Strata
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Jenjang S1</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                    <li><a href="#">Jenjang S3</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>
            <div class="media-scroll">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Judul Penelitian</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datatampil as $datatampil) { ?>
                    <tr>
                      <td><?=$datatampil->nim; ?></td>
                      <td><?=$datatampil->nama; ?></td>
                      <td><?=$datatampil->judul; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-judul-edit"><i class="fa fa-fw  fa-edit"></i></button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                      </td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="modal fade" id="modal-judul-baru">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Judul Penelitian</h4>
                </div>
                <form role="form" action="<?php echo base_url().'kps/tambah_judul';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="penelitian_nim" id="penelitian_nim" placeholder="Nim Mahasiswa" required>
                    </div>
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="penelitian_nama" id="penelitian_nama" placeholder="Nama Mahasiswa" readonly>
                    </div>

                    <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $("#penelitian_nim").change(function(){
                          var nim = $(this).val();
                          $.ajax({
                            url: "<?=base_url();?>/Kps/get_nama",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                              nim: nim
                            },
                            success: function(data) {
                              document.getElementById("penelitian_nama").value = data[0].nama;
                            }
                          })
                        });
                      });
                    </script>

                    <div class="form-group">
                      <label>Judul Penelitian</label>
                      <input type="text" class="form-control" name="penelitian_judul" id="penelitian_judul" placeholder="Judul Penelitian" required>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing I</label>
                      <select class="form-control select2" name="penelitian_pembimbing1" id="penelitian_pembimbing1" style="width: 100%;" required>
                        <option selected value="" disabled>Pembimbing I</option>
                        <?php foreach ($pembimbing as $pembimbing1) { ?>
                        <option><?=$pembimbing1->nama_dosen; ?></option>
                        <?php } ?>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa bimbingan saat ini : <span name="penelitian_total_bimbingan1">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing II</label>
                      <select class="form-control select2" name="penelitian_pembimbing2" id="penelitian_pembimbing2" style="width: 100%;" required>
                        <option selected value="" disabled>Pembimbing II</option>
                        <?php foreach ($pembimbing as $pembimbing2) { ?>
                        <option><?=$pembimbing2->nama_dosen; ?></option>
                        <?php } ?>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa bimbingan saat ini : <span name="penelitian_total_bimbingan2">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Penguji I</label>
                      <select class="form-control select2" name="penelitian_penguji1" id="penelitian_penguji1" style="width: 100%;" required>
                        <option selected value="" disabled>Penguji I</option>
                        <?php foreach ($penguji as $penguji1) { ?>
                        <option><?=$penguji1->nama_dosen; ?></option>
                        <?php } ?>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa diuji saat ini : <span name="penelitian_total_uji1">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Penguji II</label>
                      <select class="form-control select2" name="penelitian_penguji2" id="penelitian_penguji2" style="width: 100%;" required>
                        <option selected value="" disabled>Penguji II</option>
                        <?php foreach ($penguji as $penguji2) { ?>
                        <option><?=$penguji2->nama_dosen; ?></option>
                        <?php } ?>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa diuji saat ini : <span name="penelitian_total_uji2">20</span></h6>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <div class="modal fade" id="modal-judul-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Judul Penelitian</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="penelitian_nama" id="penelitian_nama" placeholder="Nama Mahasiswa" required>
                    </div>
                    <div class="form-group">
                      <label>Nim</label>
                      <input type="text" class="form-control" name="penelitian_nim" id="penelitian_nim" placeholder="Nim Mahasiswa" required>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="penelitian_jurusan" id="penelitian_jurusan" style="width: 100%;" required>
                        <option selected value="" disabled>Jurusan</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        <option value="Teknik Geologi">Teknik Geologi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="penelitian_departemen" id="penelitian_departemen" style="width: 100%;" required>
                        <option selected value="" disabled>Departemen</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        <option value="Teknik Geologi">Teknik Geologi</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Kelautan">Teknik Kelautan</option>
                        <option value="Teknik Perkapalan">Teknik Sistem Perkapalan</option>
                        <option value="Teknik Perencanaan Wilayah Kota">Teknik Perencanaan Wilayah Kota</option>
                        <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Judul Penelitian</label>
                      <input type="text" class="form-control" name="penelitian_judul" id="penelitian_judul" placeholder="Judul Penelitian" required>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing I</label>
                      <select class="form-control select2" name="penelitian_pembibimbing1" id="penelitian_pembimbing1" style="width: 100%;" required>
                        <option selected value="" disabled>Pembimbing I</option>
                        <option>Dosen 1</option>
                        <option>Dosen 2</option>
                        <option>Dosen 3</option>
                        <option>Dosen 4</option>
                        <option>Dosen 5</option>
                        <option>Dosen 6</option>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa bimbingan saat ini : <span name="penelitian_total_bimbingan1">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing II</label>
                      <select class="form-control select2" name="penelitian_pembibimbing2" id="penelitian_pembimbing2" style="width: 100%;" required>
                        <option selected value="" disabled>Pembimbing II</option>
                        <option>Dosen 1</option>
                        <option>Dosen 2</option>
                        <option>Dosen 3</option>
                        <option>Dosen 4</option>
                        <option>Dosen 5</option>
                        <option>Dosen 6</option>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa bimbingan saat ini : <span name="penelitian_total_bimbingan2">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Penguji I</label>
                      <select class="form-control select2" name="penelitian_penguji1" id="penelitian_penguji1" style="width: 100%;" required>
                        <option selected value="" disabled>Penguji I</option>
                        <option>Dosen 1</option>
                        <option>Dosen 2</option>
                        <option>Dosen 3</option>
                        <option>Dosen 4</option>
                        <option>Dosen 5</option>
                        <option>Dosen 6</option>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa diuji saat ini : <span name="penelitian_total_uji1">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Penguji II</label>
                      <select class="form-control select2" name="penelitian_penguji2" id="penelitian_penguji2" style="width: 100%;" required>
                        <option selected value="" disabled>Penguji II</option>
                        <option>Dosen 1</option>
                        <option>Dosen 2</option>
                        <option>Dosen 3</option>
                        <option>Dosen 4</option>
                        <option>Dosen 5</option>
                        <option>Dosen 6</option>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa diuji saat ini : <span name="penelitian_total_uji2">20</span></h6>
                    </div>
                    <div class="form-group">
                      <label>Penguji III</label>
                      <select class="form-control select2" name="penelitian_penguji3" id="penelitian_penguji3" style="width: 100%;" required>
                        <option selected value="" disabled>Penguji III</option>
                        <option>Dosen 1</option>
                        <option>Dosen 2</option>
                        <option>Dosen 3</option>
                        <option>Dosen 4</option>
                        <option>Dosen 5</option>
                        <option>Dosen 6</option>
                      </select>
                      <h6 class="help-block text-red">Mahasiswa diuji saat ini : <span name="penelitian_total_uji3">20</span></h6>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
