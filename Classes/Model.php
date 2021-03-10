<?php
require_once 'config/database.php';

class Model
{
    private $conn;
    private $db;
    private $table;

    public function __construct()
    {
        $this->conn = new Database();
        $this->db = $this->conn->connect();
    }
   
    public function setTable($table)
    {
        $this->table = $table;
    }
    
    public function all()
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table}");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function id(Int $id)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = '{$id}' ");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getBy($field,$value)
    {
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE {$field} = '{$value}' ");
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return  $data;
    }

    public function update(Int $id, Array $fields)
    {
        $fieldstring = $this->getFields($fields);
        $query = $this->db->prepare("UPDATE {$this->table} SET $fieldstring WHERE id = '{$id}' ");
        $query->execute();
    }

    public function getFields(Array $fields) : String
    {
        $fieldstring = "";
        foreach ($fields as $field => $value) 
        {
            $fieldstring += "$field = $value,";
        }
        return substr($fieldstring,0,-1);
    }

    public function delete(Int $id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE id = '{$id}' ");
        $query->execute();
    }






}