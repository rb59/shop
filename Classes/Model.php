<?php
require_once 'config/database.php';
require_once 'QueryHelper.php';
class Model
{
    private $conn;
    public $db;
    private $table;
    public $helper;

    public function __construct()
    {
        $this->conn = new Database();
        $this->db = $this->conn->connect();
        $this->helper = new QueryHelper();
    }

    
   
    public function setTable($table)
    {
        $this->table = $table;
    }
    
    public function all()
    {
        $query = $this->db->query("SELECT * FROM {$this->table}");
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function id($id)
    {
        
        $query = $this->db->query("SELECT * FROM {$this->table} WHERE id = '{$this->helper->Filter($id)}' ");
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getBy($field,$value)
    {
        $query = $this->db->query("SELECT * FROM {$this->table} 
        WHERE {$this->helper->Filter($field)} = '{$this->helper->Filter($value)}' ");
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return  $data;
    }

    public function update($id, Array $fields)
    {
        $fieldstring = $this->getFields($fields);
        $query = $this->db->prepare("UPDATE {$this->table} SET $fieldstring WHERE id = '{$id}' ");
        $query->execute();
        return;
    }

    public function getFields(Array $fields) : String
    {
        $fieldstring = "";
        foreach ($fields as $field => $value) 
        {
            $fieldstring += "$field = {$this->helper->Filter($value)},";
        }
        return substr($fieldstring,0,-1);
    }

    public function delete(Int $id)
    {
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE id = '{$this->helper->Filter($id)}' ");
        $query->execute();
        return;
    }


    

}