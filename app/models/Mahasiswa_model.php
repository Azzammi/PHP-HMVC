<?php
class Mahasiswa_model{
    // Contoh menggunakan array
    private $mhs = [
      [
          "nama" => "Muhammad Luthfi Azzammi",
          "nim" => "43A87007180019",
          "email" => "luthfi_azzammi@hotmail.com",
          "jurusan" => "Sistem Informasi"
      ],
        [
            "nama" => "Fajri",
            "nim" => "43A87007180020",
            "email" => "fajri1234@hotmail.com",
            "jurusan" => "Sistem Informasi"
        ],
        [
            "nama" => "Chairulloh",
            "nim" => "43A87007180232",
            "email" => "chairulloh@hotmail.com",
            "jurusan" => "Sistem Informasi"
        ],
        [
            "nama" => "Anwar Grafika",
            "nim" => "43A87007180110",
            "email" => "anwar@hotmail.com",
            "jurusan" => "Sistem Informasi"
        ]
    ];

    private $table = 'tmahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}