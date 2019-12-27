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
              <h3 class="box-title">Daftar Judul Seminar</h3>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-default1">
                  <i class="fa fa-plus-square"></i> Jadwal Seminar
                </a>&nbsp;
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
            <div class="row">
              <div class="col-md-6">
                <!-- Date and time range -->
              </div>
            </div>
            <br>
            <div class="media-scroll">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Judul Penelitian</th>
                    <td>Dosen Menyetujui</td>
                    <td>Tgl Ujian</td>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datatampilseminar as $datatampilseminar) { ?>
                  <tr>
                    <td><?=$datatampilseminar->nim;?></td>
                    <td><?=$datatampilseminar->nama;?></td>
                    <td><?=$datatampilseminar->judul;?></td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="4" style="width: 50%; color: black;">2/4
                          <span class="sr-only"></span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <?=$datatampilseminar->seminar_tanggal;?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-fw  fa-ellipsis-h"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-default1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Jadwal Ujian</h4>
                </div>
                <form role="form" action="<?php echo base_url().'kps/tambah_seminar_hasil';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="ujian_hasil_nim" id="ujian_hasil_nim" style="width: 100%;" placeholder="Nim Mahasiswa" required>
                    </div>
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="ujian_hasil_nama" id="ujian_hasil_nama" placeholder="Nama Mahasiswa"  required>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing I</label>
                      <input type="text" class="form-control" name="ujian_hasil_pembimbing1" id="ujian_hasil_pembimbing1" placeholder="Pembimbing I"  required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_pembimbing1" id="ujian_hasil_notif_pembimbing1" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing II</label>
                      <input type="text" class="form-control" name="ujian_hasil_pembimbing2" id="ujian_hasil_pembimbing2" placeholder="Pembimbing II"  required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_pembimbing2" id="ujian_hasil_notif_pembimbing2" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Penguji I</label>
                      <input type="text" class="form-control" name="ujian_hasil_penguji1" id="ujian_hasil_penguji1" placeholder="Penguji I"  required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_penguji1" id="ujian_hasil_notif_penguji1" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Penguji II</label>
                      <input type="text" class="form-control" name="ujian_hasil_penguji2" id="ujian_hasil_penguji2" placeholder="Penguji II"  required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_penguji2" id="ujian_hasil_notif_penguji2" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>

                    <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $("#ujian_hasil_nim").change(function(){
                          var nim = $(this).val();
                          $.ajax({
                            url: "<?=base_url();?>/Kps/get_nama",
                            method: "POST",
                            dataType: "JSON",
                            data: {
                              nim: nim
                            },
                            success: function(data) {
                              document.getElementById("ujian_hasil_nama").value = data[0].nama;
                              document.getElementById("ujian_hasil_pembimbing1").value = data[0].pembimbing1;
                              document.getElementById("ujian_hasil_pembimbing2").value = data[0].pembimbing2;
                              document.getElementById("ujian_hasil_penguji1").value = data[0].penguji1;
                              document.getElementById("ujian_hasil_penguji2").value = data[0].penguji2;

                            }
                          })
                        });
                      });
                    </script>

                    <div class="form-group">
                      <label>Tanggal Ujian</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="ujian_hasil_tanggal" id="datepicker" placeholder="Tanggal Ujian">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Waktu Ujian</label>
                      <select class="form-control select2" name="ujian_hasil_waktu" id="ujian_hasil_waktu" style="width: 100%;" required>
                        <option selected value="" disabled>Waktu Ujian</option>
                        <?php foreach ($datawaktuhasil as $datawaktu) { ?>
                        <option value="<?=$datawaktu->waktu_ujian_id;?>"><?=$datawaktu->waktu_mulai;?> - <?=$datawaktu->waktu_selesai;?> WITA</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat Ujian</label>
                      <select class="form-control select2" name="ujian_hasil_tempat" id="ujian_hasil_tempat" style="width: 100%;" required>
                        <option selected value="" disabled>Tempat Ujian</option>
                        <?php foreach ($datatempathasil as $datatempat) { ?>
                        <option value="<?=$datatempat->tempat_ujian_nama;?>"><?=$datatempat->tempat_ujian_nama;?></option>
                        <?php } ?>
                      </select>
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
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Detail Seminar Hasil</h4>
                </div>
                <div class="modal-body">

                  <!-- Profile Image -->
                  <div class="box box-success">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/')?>dist/img/avatar5.png" alt="User profile picture">

                      <h3 class="profile-username text-center">Abdillah Satari Rahim</h3>

                      <p class="text-muted text-center">D42114516</p>

                      <!-- <ul class="list-group list-group-bordered">
                          <li class="list-group-item">
                            <span class="col-md-6">
                              <b>Departemen Teknik Informatika</b>
                            </span>
                            <span class="col-md-6">
                                <b> Dosen Pembimbing 1
                                <span class="pull-right-container">
                                  <small class="label pull-right bg-green">Confirmed</small>
                                </span>
                              </b>
                            </span>
                          </li>
                      </ul> -->

                      <div class="box">
                        <div class="box-body">
                          <div class="col-md-6">
                            <p >Departemen Teknik Informatika</p>
                            <p >S1</p>
                            <p >Implementasi Progressive Web App (PWA) Menggunakan Framework Angular Dalam Membangun Sistem Monitoring Energy Listrik</p>
                            <p>17/10/2019</p>
                          </div>
                          <div class="col-md-6">
                            <p> Dosen Pembimbing 1
                              <span class="pull-right-container">
                                <small class="label pull-right bg-green">Confirmed</small>
                              </span>
                            </p>
                            <p> Dosen Pembimbing 2
                              <span class="pull-right-container">
                                <small class="label pull-right bg-green">Confirmed</small>
                              </span>
                            </p>
                            <p> Dosen Penguji 1
                              <span class="pull-right-container">
                                <small class="label pull-right bg-yellow">Waiting</small>
                              </span>
                            </p>
                            <p> Dosen Penguji 2
                              <span class="pull-right-container">
                                <small class="label pull-right bg-red">Rejected</small>
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>

                      <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <!-- <button type="button" class="btn btn-primary">Tambahkan</button> -->
                </div>
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
