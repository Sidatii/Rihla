<?php

class Manager{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCruises(){
        $this->db->query('SELECT * 
                        -- trajectory.ID_cruise as trajId,
                        -- cruise.ID_cruise as cruiseId,
                        FROM cruise
                        -- INNER JOIN trajectory
                        -- ON cruise.ID_cruise = trajectory.ID_cruise
                        -- ORDER BY cruise.departure_date ASC
                        ');

        $results = $this->db->resultSet();

        return $results;
    }
}

?>