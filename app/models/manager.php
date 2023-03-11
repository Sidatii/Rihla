<?php

class Manager{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCruise($id){
        $this->db->query('SELECT c.ID_cruise, c.name, c.price, c.image, c.nights_number, c.ID_port, p.name as port_name, c.departure_date, c.distination, s.ID_ship, s.ship_name, s.rooms_count, s.spots_number  
                        FROM cruise c
                        INNER JOIN ship s ON c.ID_ship=s.ID_ship
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        WHERE c.ID_cruise = :id
                        AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        $this->db->bind(':id', $id);
        $cruise = $this->db->single();
        $cruise->trajectory = $this->getTrajectoryById($cruise->ID_cruise);

        return  $cruise;
    }
    public function getCruises(){
        $this->db->query('SELECT c.ID_cruise, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.distination, p.name as port_name, p.pays 
                        FROM cruise c
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        WHERE c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        $cruises = $this->db->resultSet();
        foreach ($cruises as $cruise => $value){
            $cruises[$cruise]->trajectory = $this->getTrajectoryById($value->ID_cruise);
        }

        return $cruises;
    }

    public function getShipById($id){
        $this->db->query('SELECT * FROM ship WHERE ID_ship = :id');
        $this->db->bind(':id', $id);
        $ship = $this->db->single();
        if($this->db->rowCount() > 0){
            return $ship;
        }else{
            return false;
        }
    }

    public function getShips(){
        $this->db->query('SELECT * FROM ship');
        $ships = $this->db->resultSet();
        if($ships){
            return $ships;
        }else{
            return false;
        }
    }

    public function getPorts(){
        $this->db->query('SELECT * FROM port');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getPortById($id){
        $this->db->query('SELECT * FROM port WHERE ID_port = :id');
        $this->db->bind(':id', $id);
        $port = $this->db->single();
        if($this->db->rowCount() > 0){
            return $port;
        }else{
            return false;
        }
    }

    public function getRooms(){
        $this->db->query('SELECT distinct room_type, capacity, room_price FROM room inner join room_types on room.ID_type = room_types.ID_type');

        $results = $this->db->resultSet();

        return $results;
    }

//    public function cruiseInfos($id){
//        $this->db->query('SELECT * FROM cruiseInfo WHERE ID_cruise = :id');
//        $this->db->bind(':id', $id);
//        $booking = $this->db->resultSet();
//        if($this->db->rowCount() > 0){
//            return $booking;
//        }else{
//            return false;
//        }
//    }

    public function getBookings($id){
        $this->db->query('SELECT * FROM ticket WHERE ID_user = :id');
        $this->db->bind(':id', $id);
        $booking = $this->db->resultSet();
        if($this->db->rowCount() > 0){
            return $booking;
        }else{
            return false;
        }
    }

    public function rooms($id){
        $this->db->query('SELECT * FROM room r INNER JOIN room_types t ON r.ID_type = t.ID_type INNER JOIN ship s ON r.ID_ship = s.ID_ship where r.ID_ship = :id');
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

    public function bookingList($id){
        $this->db->query('SELECT * FROM booking b INNER JOIN cruise c ON b.ID_cruise=c.ID_cruise WHERE ID_booking=:id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function cancelTicket($id){
        $this->db->query('DELETE FROM booking WHERE ID_booking = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addCruise($data){
        $this->db->query('INSERT INTO `cruise`(`name`, `price`, `image`, `nights_number`, `ID_port`, `departure_date`, `ID_ship`, `distination`) VALUES(:name,:price,:image,:nights,:depPort, :depDate, :ids,  :dest)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['img']);
        $this->db->bind(':nights', $data['nights']);
        $this->db->bind(':depPort', $data['depPort']);
        $this->db->bind(':depDate', $data['date']);
        $this->db->bind(':ids', $data['ship']);
        $this->db->bind(':dest', $data['destination']);

        return $this->db->execute();
    }

    public function addPort($data){
        $this->db->query('INSERT INTO `port`(`name`, `pays`) VALUES(:name,:country)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':country', $data['country']);

        return $this->db->execute();
    }

    public function delete($id){
        $this->db->query('DELETE FROM cruise WHERE ID_cruise=:id');
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
        $this->db->query('INSERT INTO `ship`(`ship_name`, `rooms_count`, `spots_number`) VALUES (:name,:rooms,:spots)');
        $this->db->bind(':name', $data['ship_name']);
        $this->db->bind(':rooms', $data['rooms_count']);
        $this->db->bind(':spots', $data['spots_count']);

        return $this->db->execute();
    }




    public function deletePort($id){
        $this->db->query('DELETE FROM port WHERE ID_port=:id');
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function filterByMonth($month){
        $this->db->query('SELECT c.ID_cruise, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.distination, p.name as port_name, p.pays 
                        FROM cruise c
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        where MONTH(c.departure_date) = :month
                        AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        $this->db->bind(':month', $month);
        return  $this->db->resultSet();
    }

    public function filterByPort($port){
        $this->db->query('SELECT c.ID_cruise, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.distination, p.name as port_name, p.pays 
                        FROM cruise c
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        WHERE c.ID_port = :port 
                        AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        $this->db->bind(':port', $port);
        return  $this->db->resultSet();
    }

    public function filterByShip($ship){
        $this->db->query('SELECT c.ID_cruise, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.distination, p.name as port_name, p.pays 
                        FROM cruise c
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        where c.ID_ship = :ship
                        AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date DESC');
        $this->db->bind(':ship', $ship);
        return  $this->db->resultSet();
    }

    public function getRoomsByShip($id){
        $this->db->query('SELECT r.ID_room, r.ID_ship, r.room_price, r.ID_type, t.room_type, t.capacity FROM room r INNER JOIN room_types t ON r.ID_type=t.ID_type WHERE r.ID_ship=:id');
        $this->db->bind(':id', $id);
        if ($this->db->resultSet()) {
            return $this->db->resultSet() ;
        } else {
            return false;
        }
    }

    public function getBookingsByShip($id_ship){
        $this->db->query('SELECT b.ID_room, c.ID_ship, r.room_price, r.ID_type, t.room_type, t.capacity FROM booking b INNER JOIN cruise c ON b.ID_cruise=c.ID_cruise INNER JOIN room r ON r.ID_room=B.ID_room INNER JOIN room_types t WHERE c.ID_ship=:id_ship');
        $this->db->bind(':id_ship', $id_ship);
        if ($this->db->resultSet()) {
            return $this->db->resultSet() ;
        } else {
            return false;
        }
    }

    public function getRoomById($id){
        $this->db->query('SELECT r.ID_room, r.ID_ship, r.room_price, r.ID_type, t.room_type, t.capacity FROM room r INNER JOIN room_types t ON r.ID_type=t.ID_type WHERE r.ID_room=:id');
        $this->db->bind(':id', $id);
        if ($this->db->resultSet()) {
            return $this->db->resultSet() ;
        } else {
            return false;
        }
    }

    public function addItinerary($idc, $idp){
        $this->db->query('INSERT INTO `trajectory`(`ID_cruise`, `ID_port`) VALUES (:idc,:idp)');
        $this->db->bind(':idc', $idc);
        $this->db->bind(':idp', $idp);
        $this->db->execute();
        return true;
    }

    public function getLastId(){
        $this->db->query('SELECT MAX(ID_cruise) as LastId FROM cruise');
        return $this->db->single();
    }


    public function getTrajectoryById($id){
        $this->db->query('SELECT t.ID_cruise, t.ID_port, p.name as port_name, p.pays FROM trajectory t INNER JOIN port p ON t.ID_port=p.ID_port WHERE t.ID_cruise=:id');
        $this->db->bind(':id', $id);
        if ($this->db->resultSet()) {
            return $this->db->resultSet() ;
        } else {
            return false;
        }
    }

}


