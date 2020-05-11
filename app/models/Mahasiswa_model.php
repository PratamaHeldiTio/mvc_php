<?php

class Mahasiswa_model
{
    private $table = 'mhs';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertDataMhs($data)
    {
        $query = "INSERT INTO mhs
                    VALUE
                    ('', :nama, :umur, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['name']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();
        
        return $this->db->rowCount();

    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateData($data)
    {
        $query = "UPDATE mhs SET
                    nama = :nama,
                    umur = :umur,
                    jurusan = :jurusan
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['name']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount(); 
    }

    public function searchDataMahasiswa()
    { 
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mhs WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
