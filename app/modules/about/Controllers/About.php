<?php

class About extends Controller {
    public function index($nama = 'Luthfi', $pekerjaan = "IT Support", $umur=24){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About';

        $this->template('templates/header',$data);
        $this->view('index', $data);
        $this->template('templates/footer');
    }
    public  function page(){
        $data['judul'] = 'Halaman Page';
        $this->template('templates/header',$data);
        $this->view('about/page');
        $this->template('templates/footer');
    }
}