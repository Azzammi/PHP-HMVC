<?php

class Home extends Controller {
    public function index(){
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $this->model('User_model')->getName();
        $this->template('templates/header', $data);
        $this->view('index', $data);
        $this->template('templates/footer');
    }
}