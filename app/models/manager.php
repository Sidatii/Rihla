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
        $this->db->bind(':image', $data['img']);
        $this->db->bind(':nights', $data['nights']);
        $this->db->bind(':depPort', $data['depPort']);
        $this->db->bind(':depDate', $data['date']);

        return $this->db->execute();
    }

    public function updateCruise($data){

        if (empty($data->image)) {
        
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`price`=:price,`departure_port_ID`=:idd WHERE `ID_croisere`=:id');
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':id', $data['id']);
            
            $this->db->execute();
            return true;
            
        }else{
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`Price`=:price,`departure_port_ID`=:idd,`image`=:img WHERE `ID_croisere`=:id');
    
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':img', $data['image']);
            $this->db->bind(':id', $data['id']);
    
            $this->db->execute();
            return true;
        }

    }
}

?>