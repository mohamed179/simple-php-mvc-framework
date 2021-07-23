<?php

class Model
{
    protected $tableName;
    protected $primaryKey;

    protected $db;

    public function __construct($tableName, $primaryKey)
    {
        $this->tableName = $tableName;
        $this->primaryKey = $primaryKey;
        $this->db = new Database;
    }

    public function getAll()
    {
        // Prepare the query
        $this->db->query('SELECT * FROM ' . $this->tableName);

        // Execute the query and return the results
        return $this->db->resultSet();
    }

    public function getFirst()
    {
        // Prepare the query
        $this->db->query('SELECT * FROM ' . $this->tableName . ' ORDER BY ' . $this->primaryKey . ' LIMIT 1');

        // Execute the query and return the results
        return $this->db->single();
    }

    public function getLast()
    {
        // Prepare the query
        $this->db->query('SELECT * FROM ' . $this->tableName . ' ORDER BY ' . $this->primaryKey . ' DESC LIMIT 1');

        // Execute the query and return the results
        return $this->db->single();
    }

    public function findByPrimayKey($primaryKeyValue = 0)
    {
        // Prepare the query
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE ' . $this->primaryKey . ' = :primary_key LIMIT 1');
        $this->db->bindParam(':primary_key', $primaryKeyValue);

        // Execute the query and return the results
        return $this->db->single();
    }
}