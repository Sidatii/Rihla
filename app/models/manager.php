<?php

class Manager{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCruises(){
        $this->db->query('SELECT * 
                        FROM cruise c
                        INNER JOIN  ship p
                        ON c.ID_croisere = p.ID_cruise
                        ORDER BY c.departure_date ASC
                        ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function cruiseInfos($id){
        $this->db->query('SELECT * FROM bookingDetails WHERE ID_cruise = :id');
        $this->db->bind(':id', $id);
        $booking = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $booking;
        }else{
            return false;
        }
    }

    public function getBookings($id){
        $this->db->query('SELECT * FROM bookingDetails WHERE ID_user = :id');
        $this->db->bind(':id', $id);
        $booking = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $booking;
        }else{
            return false;
        }
    }

    public function rooms($id){
        $this->db->query('SELECT * FROM room r INNER JOIN room_types t ON r.ID_type = t.ID_type where r.ID_ship=:id');
        $this->db->bind(':id', $id);
        $rooms = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $rooms;
        }else{
            return false;
        }
    }

    public function book($id_cruise, $id_user, $price, $room){
        $this->db->query('INSERT INTO booking (ID_cruise, booking_price, ID_user, ID_room) VALUES(:id_cruise, :price ,:id_user, :room )');
        $this->db->bind(':id_cruise', $id_cruise);
        $this->db->bind(':id_user', $id_user);
        $this->db->bind(':price', $price);
        $this->db->bind(':room', $room);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function addCruise($data){
        $this->db->query('INSERT INTO `cruise`(`name`, `price`, `image`, `nights_number`, `ID_port`, `departure_date`) VALUES(:name,:price,:image,:nights,:depPort,:depDate)');

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
        
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`price`=:price,`ID_port`=:idd WHERE `ID_croisere`=:id');
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':id', $data['id']);
            
            $this->db->execute();
            return true;
            
        }else{
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`Price`=:price,`ID_port`=:idd,`image`=:img WHERE `ID_croisere`=:id');
    
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

    public function delete($id){
        $this->db->query('DELETE FROM cruise WHERE ID_croisere=:id');
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteShip($id){
        $this->db->query('DELETE FROM ship WHERE ID_ship=:id');
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addShip($data){
        $this->db->query('INSERT INTO `ship`(`ship_name`, `rooms_count`, `spots_number`, `ID_cruise`) VALUES (:name,:rooms,:spots,:idc)');
        $this->db->bind(':name', $data['ship_name']);
        $this->db->bind(':rooms', $data['rooms_count']);
        $this->db->bind(':spots', $data['spots_count']);
        $this->db->bind(':idc', $data['IDC']);

        return $this->db->execute();
    }
}
