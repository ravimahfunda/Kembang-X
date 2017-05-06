<?php
class ReviewPlaceModel extends CI_Model {
    public function construct(){
        parent::__construct();
    }

    public function insert($data){
        $this->db->insert('PLACE_REVIEWS',$data);
    }

    public function getAll(){
        return $this->db->query("select DISTINCT p.ID_PLACE, p.TITLE, r.NOTES, r.AUTHOR  from PLACE_REVIEWS r , PLACES p WHERE r.ID_PLACE=p.ID_PLACE")->result();
    }

    public function getSeveral($id_place){
        $this->db->where('ID_PLACE',$id_place);
        $this->db->order_by('CREATED_AT','DESC');
        return $this->db->get('PLACE_REVIEWS')->result();
    }

    public function get($id_review){
        $this->db->where('ID_REVIEW', $id_review);
        return $this->db->get('PLACE_REVIEWS')->row_array();
    }

    public function remove($id_review){
        $this->db->where('ID_REVIEW', $id_review);
        $this->db->delete('PLACE_REVIEWS');
    }

    public function update($id_review,$data){
        $this->db->where('ID_REVIEW', $id_review);
        $this->db->update('PLACE_REVIEWS',$data);
    }

    public function isReviewed($id_place,$username){
        $this->db->where('ID_PLACE', $id_place);
        $this->db->where('AUTHOR', $username);
        $num = $this->db->get('PLACE_REVIEWS')->num_rows() or 0;
        if ($num > 0) return 1;
        return 0;
    }

    public function getOf($username){
        return $this->db->query("select DISTINCT TITLE,ID_REVIEW, p.ID_PLACE, NOTES, r.AUTHOR from PLACE_REVIEWS r ,PLACES p where r.ID_PLACE = p.ID_PLACE and p.AUTHOR ='$username'")->result();
    }
}
?>