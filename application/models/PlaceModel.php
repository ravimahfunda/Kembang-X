<?php
    class PlaceModel extends CI_Model {
        public function construct(){
            parent::__construct(); 
        }
        
        public function insert($data){
            $this->db->insert('PLACES',$data);
        }
        
        public function getAll(){
            $this->db->order_by('CREATED_AT','DESC');
            return $this->db->get('PLACES')->result();
        }
        
        public function get($id_place){
            $this->db->where('ID_PLACE', $id_place);
            return $this->db->get('PLACES')->row_array();
        }

        public function getOf($username){
            return $this->db->query("select VISIBILITY,CREATED_AT,TITLE,PLACES.ID_PLACE,(SELECT AVG(RATE) FROM PLACE_REVIEWS WHERE ID_PLACE = PLACES.ID_PLACE) AS HIT from PLACES where AUTHOR ='$username' ORDER BY CREATED_AT DESC")->result();;
        }
        
        public function remove($id_place){
            $this->db->where('ID_PLACE', $id_place);
            $this->db->delete('PLACES');
        }
        
        public function update($id_place,$data){
            $this->db->where('ID_PLACE', $id_place);
            $this->db->update('PLACES',$data);
        }

        public function isReported($id_place,$username){
            $this->db->where('ID_PLACE', $id_place);
            $this->db->where('AUTHOR', $username);
            $num = $this->db->get('REPORTS')->num_rows() or 0;
            if ($num > 0) return 1;
            return 0;
        }
    }
?>