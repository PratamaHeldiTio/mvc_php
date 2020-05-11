<div class="container">

  <!-- disini tempat flassher diletakan -->
  <div class="row">
    <div class="col-lg-6 mt-3">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary mt-3 buttonInsert" data-toggle="modal" data-target="#forModal">
          Tambah Data Mahasiswa
        </button>
      </div>
  </div>

  <!-- untuk search -->
  <div class="row">
    <div class="col-lg-6">
      <form action="<?= BASEURL;?>mahasiswa/search" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukan nama yang dicari" name="keyword" id="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="searchButton">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>


    <!-- unutuk tabel -->
    <div class="row">
        <div class="col-lg-6">
            <h3>DAFTAR MAHASISWA</h3>
            <ul class="list-group mt-4" id="tabel">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                <li class="list-group-item ">
                    <?= $mhs['nama'];?>
                    <a href="<?= BASEURL;?>mahasiswa/delete/<?= $mhs['id'];?>" class="badge badge-danger float-right ml-2" onclick="return confirm('Apakah anda yakin menghapus data mahasiswa?')">Hapus</a>
                    <a href="<?= BASEURL;?>mahasiswa/ubah/<?= $mhs['id'];?>" class="badge badge-warning float-right ml-2 modalUpdate" data-toggle="modal" data-target="#forModal" data-id="<?=$mhs['id'];?>">Ubah</a>
                    <a href="<?= BASEURL;?>mahasiswa/detail/<?= $mhs['id'];?>" class="badge badge-info float-right ml-2">Detail</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="forModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelModal">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>mahasiswa/insert" method="post">
        <input type="hidden" name='id' id='id'>
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukan nama anda">
          </div>

          <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" class="form-control" id="umur" name="umur" placeholder="Masukan umur anda">
          </div>

          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <select class="form-control" id="jurusan" name="jurusan">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
              <option value="Teknik Mekatronika">Teknik Mekatronika</option>
              <option value="Teknik Industri">Teknik Industri</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambahkan Data</button>
        </form>
      </div>
    </div>
  </div>
</div>