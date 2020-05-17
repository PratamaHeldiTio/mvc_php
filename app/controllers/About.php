<?php

class About extends Controller
{
    // methode default
    public function index($name = 'heldi', $job = 'mahasiswa')
    {
        $data['nama'] = $name;
        $data['job'] = $job;
        $data['judul'] = 'About me';
        $this->view('template/header', $data);
        $this->view('about/index', $data);
        $this->view('template/footer');
    }


    public function page()
    {
        $this->view('template/header');
        $this->view('about/page');
        $this->view('template/footer');
    }
}
