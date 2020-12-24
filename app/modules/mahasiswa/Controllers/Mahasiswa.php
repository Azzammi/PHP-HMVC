<?php
class Mahasiswa extends Controller{
    public function index(){
        $data['judul'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->template('templates/header', $data);
        $this->view('index', $data);
        $this->template('templates/footer');
    }
    public function detail($id){
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->template('templates/header', $data);
        $this->view('detail', $data);
        $this->template('templates/footer');
    }
}