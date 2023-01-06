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

    public function addCruise($data){
        $this->db->query('INSERT INTO `cruise`(`name`, `price`, `image`, `nights_number`, `departure_port_ID`, `departure_date`) VALUES(:name,:price,:image,:nights,:depPort,:depDate)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':nights', $data['nights']);
        $this->db->bind(':depPort', $data['depPort']);
        $this->db->bind(':depDate', $data['depDate']);

        $this->db->execute();
    }
}

?>