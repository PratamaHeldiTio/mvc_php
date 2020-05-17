<?php


class Flasher {
 
    // disini kita gunakan untuk membuat pesannya
    public static function setFlash($pesan, $aksi, $tipe){

        // digunakan untuk menampung pesan saat session dijalankan
        $_SESSION['flash']= [
            'pesan'=> $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];

    }

    // ini untuk menampung isi flashnya saat mau dijalankam
    public static function flash(){

        if (isset($_SESSION['flash'])){
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">Data Mahasiswa
            <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'].'.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

          unset($_SESSION['flash']);
        }
    }

}