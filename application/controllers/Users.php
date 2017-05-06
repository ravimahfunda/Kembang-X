<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{

	}

	public function signUp(){
	    $this->load->view('signup');
    }

    public function logIn(){
        $this->load->view('login');
    }

    public function get($username){
        $this->usermodel->get($username);
    }

    public function authentificate()
    {
        $key = $this->input->post('key');
        $password = $this->input->post('password');

        $this->usermodel->authentificate($key,$password);
    }

    public function logout()
    {
        $this->usermodel->deauthorize();
        redirect(site_url('homepage'));
    }

    public function profile()
    {
        if ($this->session->has_userdata('username')){
            $username = $this->session->userdata('username');
            $data['user'] = $this->usermodel->get($username);
            $this->load->view('profile',$data);
        }
        else{
            redirect(site_url('users/login'));
        }
    }

    public function dashboard($tab)
    {
        if ($this->session->has_userdata('username')){
            $username = $this->session->userdata('username');
            $data['user'] = $this->usermodel->get($username);
            if($data['user']['ID_ROLE']==7){
                $data['lusers'] = $this->usermodel->getAll();
                $data['lplaces'] = $this->placemodel->getAll();
                $data['lreviews'] = $this->reviewplacemodel->getAll();
                $data['lreports']= $this->db->query("select p.ID_PLACE, TITLE, r.AUTHOR, r.DESCRIPTION from REPORTS r, PLACES p where r.ID_PLACE=p.ID_PLACE order by r.CREATED_AT DESC")->result();
                $data['lpromos']= $this->db->query("select r.ID_PROMO, p.ID_PLACE, p.TITLE, r.COST ,r.UNTIL, r.QUOTA, r.HEADLINE, r.DESCRIPTION from PROMOS r, PLACES p where r.ID_PLACE=p.ID_PLACE and QUOTA > 0 and UNTIL >= SYSDATE")->result();
                $data['lmclaims']= $this->db->query("select p.TITLE,r.UNTIL, r.HEADLINE, c.U_CODE from CLAIMS c, PROMOS r, PLACES p where c.ID_PROMO=r.ID_PROMO and r.ID_PLACE=p.ID_PLACE and UNTIL >= SYSDATE")->result();
                $data['lmrecs']= $this->db->query("select c.ID_CLAIM,c.STATUS,c.USERNAME from CLAIMS c, PROMOS r, PLACES p where c.ID_PROMO=r.ID_PROMO and r.ID_PLACE=p.ID_PLACE and UNTIL >= SYSDATE and p.AUTHOR='$username'")->result();
            }
            $data['posts'] = $this->placemodel->getOf($username);
            $data['reviews'] = $this->reviewplacemodel->getOf($username);
            $this->load->view('dashboard-'.$tab,$data);
        }
        else{
            redirect(site_url('users/login'));
        }
    }

    public function toggle($username,$value){
        $data = array(
            'STATUS' => $value
        );
        $this->usermodel->suupdate($username,$data);
        redirect(site_url('users/dashboard/lu'));
    }

    public function insert()
    {
//        $author ="ravimahfunda";
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
//
        $this->load->library('upload', $config);
//
        if ( !$this->upload->do_upload('userfileProfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            die($error['error']);
        }
        else
        {
            $data_upload = array('upload_data' => $this->upload->data());
//
            $data = array(
                'USERNAME' => $this->input->post('usernameProfile'),
                'EMAIL' => $this->input->post('emailProfile'),
                'DISPLAY_NAME' => $this->input->post('displayNameProfile'),
                'PASSWORD' => $this->input->post('passwordProfile'),
                'PROFILE_IMAGE' => $data_upload['upload_data']['file_name'],
                'COIN' => 50,
                'EXP' => 0,
                'ID_ROLE' => 1,
                'ID_LEVEL' => 1,
                'STATUS' => 1,
//                'ADDRESS' => $this->input->post('addressPlace'),
//                'HASH_TAG' => $this->input->post('hashTagPlace'),
//                'CREATED_AT' => date("d-M-y"),
//                'DESCRIPTION' => $this->input->post('descriptionPlace'),
//                'AUTHOR' => $author,
//                'IMAGE' => $data_upload['upload_data']['file_name'],
//                'OPERATIONAL_TIME' => $this->input->post('operationalTimePlace'),
//                'LAND_MARK' => $this->input->post('landMarkPlace')
            );
//
            $this->usermodel->insert($data);
            redirect(site_url('homepage'));
        }
    }
    
    public function check($id_place)
	{
//        $data['intent'] = 1;
//        $data['place'] = $this->placemodel->get($id_place);
//		$this->load->view('form_places',$data);
	}
    
    public function remove($username){
        $this->usermodel->remove($username);
        redirect(site_url('users/dashboard/lu'));
    }

    public function update($username)
    {

        $oldpass =$this->input->post('oldPassword');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE;

        if ($_FILES['userfile']['size']==0){
            $data = array(
                'EMAIL' => $this->input->post('email'),
                'DISPLAY_NAME' => $this->input->post('displayName'),
                'PASSWORD' => $this->input->post('newPassword'),
            );

            $this->usermodel->update($username,$oldpass,$data);
            redirect(site_url('users/profile'));
        } else {
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());
                die($error['error']);
            }
            else
            {
                $data_upload = array('upload_data' => $this->upload->data());
                $data = array(
                    'EMAIL' => $this->input->post('email'),
                    'DISPLAY_NAME' => $this->input->post('displayName'),
                    'PROFILE_IMAGE' => $data_upload['upload_data']['file_name'],
                    'PASSWORD' => $this->input->post('newPassword'),
                );

                $this->usermodel->update($username,$oldpass,$data);
                redirect(site_url('users/profile'));
            }
        }
    }

    public function detail($id_place)
    {
//        $data['reviews'] = $this->db->query("select * from PLACE_REVIEWS where CREATED_AT > SYSDATE-10 AND ID_REVIEW >= (SELECT MAX(ID_REVIEW)-5 FROM PLACE_REVIEWS) AND ID_PLACE =".$id_place."ORDER BY ID_REVIEW DESC")->result();
//        $data['place'] = $this->placemodel->get($id_place);
//        $this->load->view('detail_places',$data);
    }

    public function review(){
//        $id_place = $this->input->post('id_place');
//        $rate = $this->input->post('rate');
//
//        $config['upload_path']          = './uploads/';
//        $config['allowed_types']        = 'gif|jpg|png';
//        $config['encrypt_name']         = TRUE;
//
//        $this->load->library('upload', $config);
//
//        if ( !$this->upload->do_upload('userfileReviewPlace'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//            die($error['error']);
//        }
//        else
//        {
//            $author ="ravimahfunda";
//            $data_upload = array('upload_data' => $this->upload->data());
//
//            $data = array(
//                'RATE' => $rate,
//                'IMAGE' => $data_upload['upload_data']['file_name'],
//                'NOTES' => $this->input->post('notesReviewPlace'),
//                'CREATED_AT' => date("d-M-y"),
//                'AUTHOR' => $author,
//                'ID_PLACE' => $id_place
//            );
//
//            $this->reviewplacemodel->insert($data);
//            redirect(site_url('homepage'));
//        }
    }

    
}