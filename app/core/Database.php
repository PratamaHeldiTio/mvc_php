<?php


class Database {
    // configurasi database dari folder config
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    // untuk database handler
    private $dbh;
    private $stmt;

    // untuk connec database agar tiap class database dipanggil langsung konek pakai construct
    public function __construct(){

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
        ]; 

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // function untuk menyiapkan query sql
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }
 
    // function untuk membersihkan query sql agar tidak terjadi sql injektion
    public function bind($param, $value, $type = null)
    {
        if( is_null($type)){
            switch (true) {
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

        $this->stmt->bindValue($param, $value, $type);
    }

    // function untuk mengeksekusi query sql
    public function execute()
    {
        $this->stmt->execute();
    }

    // function untuk mengembalikan hasil query dalam jumlah banyak
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // function untuk mengembalikan hasil query dalam jumlah satu
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function rowCount()
    {
        return $this->stmt->rowCount();
    }




}