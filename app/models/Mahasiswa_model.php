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
    private $dbh; // database handler
    private $stmt; // statement

    public function __construct(){
        // data source name
        $dsn = 'mysql:host=localhost;dbname=db_mahasiswa';

        try{
            $this->dbh = new PDO($dsn, 'root', 1234);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    public function getAllMahasiswa(){
        $this->stmt = $this->dbh->prepare("SELECT * FROM tmahasiswa");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}