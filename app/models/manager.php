<?php

class Manager{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getCruise(){
        $this->db->query('SELECT c.ID_croisere, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.itinerary, c.distination, s.ID_ship, s.ship_name, s.rooms_count, s.spots_number  
                        FROM cruise c
                        INNER JOIN ship s ON c.ID_croisere=s.ID_cruise
                        WHERE c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        return  $this->db->resultSet();
    }
    public function getCruises(){
        $this->db->query('SELECT c.ID_croisere, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.itinerary, c.distination, p.name as port_name, p.pays  
                        FROM cruise c
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        ORDER BY c.departure_date ASC');

        $results = $this->db->resultSet();

        return $results;
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

    public function cruiseInfos($id){
        $this->db->query('SELECT * FROM cruiseInfo WHERE ID_croisere = :id');
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
        $this->db->query('SELECT * FROM booking WHERE ID_booking=:id');
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
        $this->db->query('INSERT INTO `cruise`(`name`, `price`, `image`, `nights_number`, `ID_port`, `departure_date`, `itinerary`, `distination`) VALUES(:name,:price,:image,:nights,:depPort,:depDate, :itinerary, :dest)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['img']);
        $this->db->bind(':nights', $data['nights']);
        $this->db->bind(':depPort', $data['depPort']);
        $this->db->bind(':depDate', $data['date']);
        $this->db->bind(':itinerary', $data['itinerary']);
        $this->db->bind(':dest', $data['destination']);

        return $this->db->execute();
    }

    public function addPort($data){
        $this->db->query('INSERT INTO `port`(`name`, `pays`) VALUES(:name,:country)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':country', $data['country']);

        return $this->db->execute();
    }

    public function updateCruise($data){

        if (empty($data['img'])) {
        
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`price`=:price,`ID_port`=:idd, `itinerary`=:itinerary `distination`=:dest WHERE `ID_croisere`=:id');
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':itinerary', $data['itinerary']);
            $this->db->bind(':dest', $data['destination']);
            
            $this->db->execute();
            return true;
            
        }else{
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`Price`=:price,`ID_port`=:idd,`image`=:img, `itinerary`=:itinerary, `distination`=:dest WHERE `ID_croisere`=:id');
    
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':img', $data['img']);
            $this->db->bind(':itinerary', $data['itinerary']);
            $this->db->bind(':dest', $data['destination']);
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

    public function updateShip($data){
        $this->db->query('UPDATE `ship` SET `ship_name`=:name,`rooms_count`=:rooms,`spots_number`=:spots,`ID_cruise`=:idc WHERE `ID_ship`=:id');
        $this->db->bind(':name', $data['ship_name']);
        $this->db->bind(':rooms', $data['rooms_count']);
        $this->db->bind(':spots', $data['spots_count']);
        $this->db->bind(':idc', $data['IDC']);
        $this->db->bind(':id', $data['id']);

        return $this->db->execute();
    }

    public function updatePort($data){
        $this->db->query('UPDATE `port` SET `name`=:name,`pays`=:country WHERE `ID_port`=:id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':country', $data['country']);
        $this->db->bind(':id', $data['id']);

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
        $this->db->query('SELECT c.ID_croisere, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.itinerary, c.distination, s.ID_ship, s.ship_name, s.rooms_count, s.spots_number  
                        FROM cruise c
                        INNER JOIN ship s ON c.ID_croisere=s.ID_cruise
                        where MONTH(c.departure_date) = :month
                        AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        $this->db->bind(':month', $month);
        return  $this->db->resultSet();
    }

    public function filterByPort($port){
        $this->db->query('SELECT c.ID_croisere, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.itinerary, c.distination, s.ID_ship, s.ship_name, s.rooms_count, s.spots_number, p.name as port_name, p.pays  
                        FROM cruise c
                        INNER JOIN ship s ON c.ID_croisere=s.ID_cruise
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        where c.ID_port = :port AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date ASC');
        $this->db->bind(':port', $port);
        return  $this->db->resultSet();
    }

    public function filterByShip($ship){
        $this->db->query('SELECT c.ID_croisere, c.name, c.price, c.image, c.nights_number, c.ID_port, c.departure_date, c.itinerary, c.distination, s.ID_ship, s.ship_name, s.rooms_count, s.spots_number  , p.name as port_name, p.pays
                        FROM cruise c
                        INNER JOIN ship s ON c.ID_croisere=s.ID_cruise
                        INNER JOIN port p ON c.ID_port=p.ID_port
                        where s.ID_ship = :ship
                        AND c.departure_date > CURRENT_TIMESTAMP
                        ORDER BY c.departure_date DESC');
        $this->db->bind(':ship', $ship);
        return  $this->db->resultSet();
    }

}
