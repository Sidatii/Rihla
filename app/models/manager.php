<?php

class Manager{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCruises(){
        $this->db->query('SELECT * FROM cruise');

        $results = $this->db->resultSet();

        return $results;
    }
}

?>