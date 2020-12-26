<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $db_handler;
    private $statement;

    public function __construct()
    {
        // data source name
        $dsn = 'mysql:host='. $this->host .';dbname=' . $this->db_name;
        $option = [
          PDO::ATTR_PERSISTENT => true,
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->db_handler = new PDO($dsn, $this->user, $this->pass, $option);
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
    /**
     * Menyiapkan query yang akan di bind dan di eksekusi
     * @link https://www.youtube.com/watch?v=44D7B71_WtY Sandhika Galih
     * @return array
     */
    public function query($query){
        $this->statement = $this->db_handler->prepare($query);
    }
    /**
     * Bind / Ikat parameter yang akan dimasukkan dengan nilainya agar mencegah SQL Injection
     * @link https://www.youtube.com/watch?v=44D7B71_WtY Sandhika Galih
     */
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }
    /**
     * Execute query yang sudah di siapkan sebelumnya
     * @link https://www.youtube.com/watch?v=44D7B71_WtY Sandhika Galih
     */
    public function execute(){
        $this->statement->execute();
    }
    /**
     * Kembalikan Semua Baris Data
     * @link https://www.youtube.com/watch?v=44D7B71_WtY Sandhika Galih
     * @return array
     */
    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Kembalikan Hanya 1 Baris Data
     * @link https://www.youtube.com/watch?v=44D7B71_WtY Sandhika Galih
     * @return array
     */
    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * Kembalikan jumlah baris yang terpengaruh
     * @link https://www.youtube.com/watch?v=44D7B71_WtY Sandhika Galih
     * @return integer
     */
    public function rowCount(){
        return $this->statement->rowCount();
    }
}