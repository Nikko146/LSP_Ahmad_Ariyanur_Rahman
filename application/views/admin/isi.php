<?php
//==================================== HOME ====================================
if ($page == 'home') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_surat_masuk; ?></h3>

                <p>Jumlah Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-people"></i>
              </div>
              <a href="<?php echo base_url('admin/surat_masuk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_surat_keluar; ?></h3>

                <p>Jumlah Surat Keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?php echo base_url('admin/surat_keluar') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Selamat Datang <?= $_SESSION['name']; ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
          <h2>Info</h2>
          <p>Ini adalah Sistem Informasi menggunakan CI3 dengan sistem login.<br>
            Besar harapan contoh coding ini bermanfaat sebagai start awal memahami
            membangun sebuah sistem informasi yang lebih rumit.</p>
          <p>Dosen pengampu: Agus SBN</p>

        </div>
        <div class="card-footer">
          Create By Agus SBN @2022
        </div>
      </div>

    </section>
  </div>
<?php
}

//==================================== Surat Masuk ====================================
else if ($page == 'surat_masuk') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href=<?php echo base_url("admin/surat_masuk_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Surat Masuk</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>No Surat</th>
                <th>Pengirim</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Lampiran</th>
                <th>Perihal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            foreach ($surat_masuk as $d) { ?>
              <tr>
                <td><?php echo $d['no_surat'] ?></td>
                <td><?php echo $d['pengirim'] ?></td>
                <td><?php echo $d['waktu'] ?></td>
                <td><?php echo $d['tempat'] ?></td>
                <td><?php echo $d['lampiran'] ?></td>
                <td><?php echo $d['perihal'] ?></td>
                <td>
                  <a href=<?php echo base_url("admin/surat_masuk_edit/") . $d['id']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                  <a href=<?php echo base_url("admin/surat_masuk_hapus/") . $d['id']; ?> onclick="return confirm('Yakin menghapus surat masuk ini ?');" ;><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </table>

        </div>
    </section>
  </div>

<?php
}

  //--------------------------------- Tambah --------------------------------
else if ($page == 'surat_masuk_tambah') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/surat_masuk_tambah'); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_surat" id="no_surat" value="<?php echo set_value('no_surat'); ?>" placeholder="Nomor Surat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('no_surat')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo set_value('pengirim'); ?>" placeholder="Nama Pengirim">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('pengirim')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="waktu" id="waktu" value="<?php echo set_value('waktu'); ?>" placeholder="Waktu">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('waktu')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="lampiran" id="lampiran" value="<?php echo set_value('lampiran'); ?>" placeholder="Lampiran">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('lampiran')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo set_value('perihal'); ?>" placeholder="Perihal">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('perihal')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="penerima" id="penerima" value="<?php echo set_value('penerima'); ?>" placeholder="Penerima">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('penerima')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="isi" class="col-sm-2 col-form-label">Isi Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="isi" id="isi" value="<?php echo set_value('isi'); ?>" placeholder="Isi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('isi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="unit_penerbit" class="col-sm-2 col-form-label">Unit Penerbit</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('unit_penerbit', $unit_penerbit, set_value('unit_penerbit')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('unit_penerbit')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat" id="tempat" value="<?php echo set_value('tempat'); ?>" placeholder="Tempat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tempat')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_pengesah" class="col-sm-2 col-form-label">Pengesah</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('nama_pengesah', $nama_pengesah, set_value('nama_pengesah')); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pengesah')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_tembusan" class="col-sm-2 col-form-label">Nama Tembusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_tembusan" id="nama_tembusan" value="<?php echo set_value('nama_tembusan'); ?>" placeholder="Tembusan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_tembusan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="file_scan" class="col-sm-2 col-form-label">File Scan</label>
                <div class="col-sm-10">
                  <p>(No Photo)</p>
                </div>
              </div>
              

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>
        </div>
    </section>
  </div>
<?php

  //--------------------------------- Edit ---------------------------------
} else if ($page == 'surat_masuk_edit') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/surat_masuk_edit/' . $d['id']); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_surat" id="no_surat" value="<?php echo set_value('no_surat', $d['no_surat']); ?>" placeholder="Masukkan Nomor Surat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('no_surat')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo set_value('pengirim', $d['pengirim']); ?>" placeholder="Masukkan Nama Pengirim">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('pengirim')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="waktu" id="waktu" value="<?php echo set_value('waktu', $d['waktu']); ?>" placeholder="Waktu">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('waktu')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="lampiran" id="lampiran" value="<?php echo set_value('lampiran', $d['lampiran']); ?>" placeholder="Lampiran">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('lampiran')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo set_value('perihal', $d['perihal']); ?>" placeholder="Perihal">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('perihal')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="penerima" id="penerima" value="<?php echo set_value('penerima', $d['penerima']); ?>" placeholder="Penerima">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('penerima')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="isi" class="col-sm-2 col-form-label">Isi Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="isi" id="isi" value="<?php echo set_value('isi', $d['isi']); ?>" placeholder="Isi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('isi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="unit_penerbit" class="col-sm-2 col-form-label">Unit Penerbit</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('unit_penerbit', $unit_penerbit, set_value('unit_penerbit', $d['unit_penerbit']), 'class=form-control'); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('unit_penerbit')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat" id="tempat" value="<?php echo set_value('tempat', $d['tempat']); ?>" placeholder="Tempat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tempat')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_pengesah" class="col-sm-2 col-form-label">Pengesah</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('nama_pengesah', $nama_pengesah, set_value('nama_pengesah', $d['nama_pengesah']), 'class=form-control'); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pengesah')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_tembusan" class="col-sm-2 col-form-label">Nama Tembusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_tembusan" id="nama_tembusan" value="<?php echo set_value('nama_tembusan', $d['nama_tembusan']); ?>" placeholder="Tembusan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_tembusan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="file_scan" class="col-sm-2 col-form-label">File Scan</label>
                <div class="col-sm-10">
                  <p>(No Photo)</p>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>


        </div>
    </section>
  </div>
  
<?php } 

//--------------------------------- Surat Keluar ---------------------------------
else if ($page == 'surat_keluar') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">
          <a href=<?php echo base_url("admin/surat_keluar_tambah") ?> class="btn btn-primary" style="margin-bottom:15px">
            Tambah Surat Keluar</a>
          <table id="datatable_01" class="table table-bordered">
            <thead>
              <tr>
                <th>No Surat</th>
                <th>Penerima</th>
                <th>Waktu</th>
                <th>Tempat</th>
                <th>Perihal</th>
                <th>Pengesah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            foreach ($surat_keluar as $d) { ?>
              <tr>
                <td><?php echo $d['no_surat'] ?></td>
                <td><?php echo $d['penerima'] ?></td>
                <td><?php echo $d['waktu'] ?></td>
                <td><?php echo $d['tempat'] ?></td>
                <td><?php echo $d['perihal'] ?></td>
                <td><?php echo $d['nama_pengesah'] ?></td>
                <td>
                  <a href=<?php echo base_url("admin/surat_keluar_edit/") . $d['id']; ?>> <i class="fas fa-pencil-alt"></i> </a>
                  <a href=<?php echo base_url("admin/surat_keluar_hapus/") . $d['id']; ?> onclick="return confirm('Yakin menghapus surat keluar ini ?');" ;><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </table>

        </div>
    </section>
  </div>

<?php
} else if ($page == 'surat_keluar_tambah') {
  ?>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo $judul; ?></h1>
            </div>
          </div>
        </div>
      </section>
  
      <section class="content">
        <div class="card">
          <div class="card-body">
  
            <form method="POST" action="<?php echo base_url('admin/surat_keluar_tambah'); ?>" class="form-horizontal">
  
              <div class="card-body">
  
                <div class="form-group row">
                  <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_surat" id="no_surat" value="<?php echo set_value('no_surat'); ?>" placeholder="Nomor Surat">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('no_surat')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo set_value('pengirim'); ?>" placeholder="Nama Pengirim">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('pengirim')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="waktu" id="waktu" value="<?php echo set_value('waktu'); ?>" placeholder="Waktu">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('waktu')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="lampiran" id="lampiran" value="<?php echo set_value('lampiran'); ?>" placeholder="Lampiran">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('lampiran')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo set_value('perihal'); ?>" placeholder="Perihal">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('perihal')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="penerima" id="penerima" value="<?php echo set_value('penerima'); ?>" placeholder="Penerima">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('penerima')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="isi" class="col-sm-2 col-form-label">Isi Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="isi" id="isi" value="<?php echo set_value('isi'); ?>" placeholder="Isi">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('isi')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="unit_penerbit" class="col-sm-2 col-form-label">Unit Penerbit</label>
                  <div class="col-sm-10">
                    <?php echo form_dropdown('unit_penerbit', $unit_penerbit, set_value('unit_penerbit')); ?>
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('unit_penerbit')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tempat" id="tempat" value="<?php echo set_value('tempat'); ?>" placeholder="Tempat">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('tempat')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="nama_pengesah" class="col-sm-2 col-form-label">Pengesah</label>
                  <div class="col-sm-10">
                    <?php echo form_dropdown('nama_pengesah', $nama_pengesah, set_value('nama_pengesah')); ?>
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pengesah')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="nama_tembusan" class="col-sm-2 col-form-label">Nama Tembusan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_tembusan" id="nama_tembusan" value="<?php echo set_value('nama_tembusan'); ?>" placeholder="Tembusan">
                    <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_tembusan')); ?></span>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="file_scan" class="col-sm-2 col-form-label">File Scan</label>
                  <div class="col-sm-10">
                    <p>(No Photo)</p>
                  </div>
                </div>
                
  
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
              </div>
            </form>
          </div>
      </section>
    </div>
<?php } 


else if ($page == 'surat_keluar_edit') {
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo  $judul; ?></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-body">

          <form method="POST" action="<?php echo base_url('admin/surat_keluar_edit/' . $d['id']); ?>" class="form-horizontal">

            <div class="card-body">

              <div class="form-group row">
                <label for="no_surat" class="col-sm-2 col-form-label">Nomor Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_surat" id="no_surat" value="<?php echo set_value('no_surat', $d['no_surat']); ?>" placeholder="Masukkan Nomor Surat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('no_surat')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="pengirim" class="col-sm-2 col-form-label">Nama Pengirim</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="pengirim" id="pengirim" value="<?php echo set_value('pengirim', $d['pengirim']); ?>" placeholder="Masukkan Nama Pengirim">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('pengirim')); ?></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="waktu" id="waktu" value="<?php echo set_value('waktu', $d['waktu']); ?>" placeholder="Waktu">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('waktu')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="lampiran" id="lampiran" value="<?php echo set_value('lampiran', $d['lampiran']); ?>" placeholder="Lampiran">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('lampiran')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="perihal" id="perihal" value="<?php echo set_value('perihal', $d['perihal']); ?>" placeholder="Perihal">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('perihal')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="penerima" class="col-sm-2 col-form-label">Nama Penerima</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="penerima" id="penerima" value="<?php echo set_value('penerima', $d['penerima']); ?>" placeholder="Penerima">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('penerima')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="isi" class="col-sm-2 col-form-label">Isi Surat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="isi" id="isi" value="<?php echo set_value('isi', $d['isi']); ?>" placeholder="Isi">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('isi')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="unit_penerbit" class="col-sm-2 col-form-label">Unit Penerbit</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('unit_penerbit', $unit_penerbit, set_value('unit_penerbit', $d['unit_penerbit']), 'class=form-control'); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('unit_penerbit')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat" class="col-sm-2 col-form-label">Tempat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat" id="tempat" value="<?php echo set_value('tempat', $d['tempat']); ?>" placeholder="Tempat">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('tempat')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_pengesah" class="col-sm-2 col-form-label">Pengesah</label>
                <div class="col-sm-10">
                  <?php echo form_dropdown('nama_pengesah', $nama_pengesah, set_value('nama_pengesah', $d['nama_pengesah']), 'class=form-control'); ?>
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_pengesah')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="nama_tembusan" class="col-sm-2 col-form-label">Nama Tembusan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_tembusan" id="nama_tembusan" value="<?php echo set_value('nama_tembusan', $d['nama_tembusan']); ?>" placeholder="Tembusan">
                  <span class="badge badge-warning"><?php echo strip_tags(form_error('nama_tembusan')); ?></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="file_scan" class="col-sm-2 col-form-label">File Scan</label>
                <div class="col-sm-10">
                  <p>(No Photo)</p>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">Simpan</button>
            </div>
          </form>
        </div>
    </section>
  </div>
<?php } 


?>