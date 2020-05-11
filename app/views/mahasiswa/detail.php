<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Nama : <?= $data['mhs']['nama']?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Umur : <?= $data['mhs']['umur']?></h6>
            <p class="card-text">Jurusan : <?= $data['mhs']['jurusan']?></p>
            <a href="<?= BASEURL;?>mahasiswa" class="card-link">Kembali</a>
        </div>
    </div>
</div>