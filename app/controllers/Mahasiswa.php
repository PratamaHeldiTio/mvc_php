<?php


class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('template/footer');
    }

    public function insert()
    {
        if ($this->model('Mahasiswa_model')->insertDataMhs($_POST) > 0 ){
            Flasher::setFlash('BERHASIL', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        } else {
            Flasher::setFlash('GAGAL', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('mahasiswa_model')->delete($id) > 0){
            Flasher::setFlash('BERHASIL', 'dihapus', 'success');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }else{
            Flasher::setFlash('GAGAL', 'dihapus', 'danger');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }

    public function getDataMhs()
    {
        echo json_encode($this->model('mahasiswa_model')->getMahasiswaById($_POST['id']));
    }

    public function update()
    {
        if ($this->model('mahasiswa_model')->updateData($_POST) > 0){
            Flasher::setFlash('BERHASIL', 'diubah', 'success');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }else{
            Flasher::setFlash('GAGAL', 'diubah', 'danger');
            header('Location: ' . BASEURL . 'mahasiswa');
            exit;
        }
    }

    public function search()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('mahasiswa_model')->searchDataMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }
}
