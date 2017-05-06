<?php
class UserModel extends CI_Model {
    public function construct(){
        parent::__construct();
    }

    public function insert($data){
        $this->db->insert('USERS',$data);
    }

    public function authentificate($key,$password){
        $this->db->where('USERNAME',$key);
        $this->db->where('PASSWORD',$password);
        $this->db->where('STATUS',1);
        $query = $this->db->get('USERS');
        if ($query->num_rows() > 0){
            $data = array(
                'username' => $query->row_array()['USERNAME'],
                'role' => $query->row_array()['ID_ROLE']
            );
            $this->session->set_userdata($data);
            redirect(site_url('homepage'));
        }else{
            redirect(site_url('users/login'));
        }
    }

    public function deauthorize(){
        $data = array(
            'username',
            'role'
        );
        $this->session->unset_userdata($data);
    }

    public function get($username){
        return $this->db->query("select * from USERS natural join LEVELS where USERNAME='".$username."'")->row_array();
    }

    public function update($username,$password,$data){
        $this->db->where('USERNAME', $username);
        $this->db->where('PASSWORD', $password);
        $this->db->update('USERS',$data);
    }

    public function suupdate($username,$data){
        $this->db->where('USERNAME', $username);
        $this->db->update('USERS',$data);
    }

    public function getAll(){
        return $this->db->get('USERS')->result();
    }

    public function remove($username){
        $this->db->where('USERNAME', $username);
        $this->db->delete('USERS');
    }

//    batas


    public function getSeveral($id_place){
        $this->db->where('ID_PLACE',$id_place);
        return $this->db->get('PLACE_REVIEWS')->result();
    }

}
?>