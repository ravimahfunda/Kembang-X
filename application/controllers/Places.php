<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {

	public function index()
	{
        if ($this->session->has_userdata('username')){
            $data['place'] = array(
                'TITLE' => "",
                'ADDRESS' => "",
                'HASH_TAG' => "",
                'DESCRIPTION' => "",
                'AUTHOR' => "",
                'TYPE' => "",
                'OPERATIONAL_TIME' => "00:00-00:00",
                'FEATURED_ITEM' => "",
                'AVERAGE_PRICE' => ""
            );
            $data['intent'] = 0;
            $username = $this->session->userdata('username');
            $data['user'] = $this->usermodel->get($username);
            $this->load->view('form_places',$data);
        }
        else{
            redirect(site_url('users/login'));
        }

	}
    
    public function insert()
    {
        $author =$this->session->userdata('username');
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('userfilePlace'))
        {
            $error = array('error' => $this->upload->display_errors());
            die($error['error']);
        }
        else
        {
            $data_upload = array('upload_data' => $this->upload->data());

            $data = array(
                'TITLE' => $this->input->post('titlePlace'),
                'ADDRESS' => $this->input->post('addressPlace'),
                'HASH_TAG' => $this->input->post('hashTagPlace'),
                'CREATED_AT' => date("d-M-y"),
                'DESCRIPTION' => $this->input->post('descriptionPlace'),
                'AUTHOR' => $author,
                'IMAGE' => $data_upload['upload_data']['file_name'],
                'TYPE' => $this->input->post('typePlaces'),
                'OPERATIONAL_TIME' => $this->input->post('operationalTimePlaces'),
                'FEATURED_ITEM' => $this->input->post('featuredItemPlaces'),
                'AVERAGE_PRICE' => $this->input->post('averagePricePlaces'),
                'VISIBILITY' => 1,
            );

            $this->placemodel->insert($data);
            redirect(base_url());
        }
    }

    public function promote($id_place){
        if ($this->session->has_userdata('username')){
            $data['promo'] = array(
                'HEADLINE' => "",
                'QUOTA' => "",
                'COST' => "",
                'UNTIL' => "",
                'DESCRIPTION' => "",
            );
            $data['place'] = $id_place;
            $data['intent'] = 0;
            $username = $this->session->userdata('username');
            $data['user'] = $this->usermodel->get($username);
            $this->load->view('promote',$data);
        }
        else{
            redirect(site_url('users/login'));
        }
    }

    public function gopromote(){
        $add = $this->input->post('untilPromo');
        $date = date_create(date("Y-m-d"));
        date_add ($date,date_interval_create_from_date_string($add." days"));
        $data = array(
            'ID_PLACE' => $this->input->post('placePromo'),
            'HEADLINE' => $this->input->post('headlinePromo'),
            'COST' => $this->input->post('costPromo'),
            'UNTIL' => date_format($date,"d-M-y"),
            'QUOTA' => $this->input->post('quotaPromo'),
            'DESCRIPTION' => $this->input->post('descriptionPromo'),
        );
        $this->db->insert('PROMOS',$data);
        redirect(site_url('users/dashboard/lp'));
    }

    public function claim($id_promo,$username){
        $data = array(
            'ID_PROMO' => $id_promo,
            'U_CODE' => random_string('alnum', 6),
            'USERNAME' => $username,
            'STATUS' => 0,
        );
        $this->db->insert('CLAIMS',$data);
        redirect(site_url('users/dashboard/0'));
    }

    public function ver_claim($id_claim,$username){
        $this->db->where('ID_CLAIM',$id_claim);
        $this->db->where('USERNAME',$username);
        $this->db->where('U_CODE',$this->input->post('ucodeVer'));
        $data = array(
            'STATUS' => 1,
        );
        $this->db->update('CLAIMS',$data);
        redirect(site_url('users/dashboard/0'));
    }


    public function report()
    {
        $author =$this->session->userdata('username');
        $id_place = $this->input->post('id_place');
        $data = array(
            'CREATED_AT' => date("d-M-y"),
            'DESCRIPTION' => $this->input->post('notesReportPlace'),
            'AUTHOR' => $author,
            'ID_PLACE' => $id_place,
            'TYPE' => $this->input->post('type_place'),
        );

        $this->db->insert('REPORTS',$data);
        redirect(site_url('places/detail/').$id_place);
    }
    
    public function check($id_place)
	{
        $data['intent'] = 1;
        $data['place'] = $this->placemodel->get($id_place);
        if ($this->session->has_userdata('username')){
            $username = $this->session->userdata('username');
            $data['user'] = $this->usermodel->get($username);
            $this->load->view('form_places',$data);
        }
        else{
            redirect(site_url('users/login'));
        }

	}

    public function toggle($id_place,$value){
        $data = array(
            'VISIBILITY' => $value
        );
        $this->placemodel->update($id_place,$data);
        redirect(site_url('users/dashboard/1'));
    }

    public function sutoggle($id_place,$value){
        $data = array(
            'VISIBILITY' => $value
        );
        $this->placemodel->update($id_place,$data);
        redirect(site_url('users/dashboard/lp'));
    }
    
    public function remove($id_place){
        $this->placemodel->remove($id_place);
        redirect(site_url('users/dashboard/1'));
    }
    
    public function update($id_place)
    {
        $author =$this->session->userdata('username');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE;
        $a = $this->input->post('userfilePlace');
        if ($_FILES['userfilePlace']['size']==0){
            $data = array(
                'TITLE' => $this->input->post('titlePlace'),
                'ADDRESS' => $this->input->post('addressPlace'),
                'HASH_TAG' => $this->input->post('hashTagPlace'),
                'CREATED_AT' => date("d-M-y"),
                'DESCRIPTION' => $this->input->post('descriptionPlace'),
                'TYPE' => $this->input->post('typePlaces'),
                'OPERATIONAL_TIME' => $this->input->post('operationalTimePlaces'),
                'FEATURED_ITEM' => $this->input->post('featuredItemPlaces'),
                'AVERAGE_PRICE' => $this->input->post('averagePricePlaces')
            );

            $this->placemodel->update($id_place,$data);
            redirect(site_url('users/dashboard'));
        } else {
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('userfilePlace'))
            {
                $error = array('error' => $this->upload->display_errors());
                die($error['error']);
            }
            else
            {
                $data_upload = array('upload_data' => $this->upload->data());
                $data = array(
                    'TITLE' => $this->input->post('titlePlace'),
                    'ADDRESS' => $this->input->post('addressPlace'),
                    'HASH_TAG' => $this->input->post('hashTagPlace'),
                    'CREATED_AT' => date("d-M-y"),
                    'DESCRIPTION' => $this->input->post('descriptionPlace'),
                    'IMAGE' => $data_upload['upload_data']['file_name'],
                    'TYPE' => $this->input->post('typePlaces'),
                    'OPERATIONAL_TIME' => $this->input->post('operationalTimePlaces'),
                    'FEATURED_ITEM' => $this->input->post('featuredItemPlaces'),
                    'AVERAGE_PRICE' => $this->input->post('averagePricePlaces')
                );

                $this->placemodel->update($id_place,$data);
                redirect(site_url('users/dashboard/1'));
            }
        }
    }

    public function detail($id_place)
    {
        $data['reviews'] = $this->db->query("select * from PLACE_REVIEWS where CREATED_AT > SYSDATE-10 AND ID_REVIEW >= (SELECT MAX(ID_REVIEW)-5 FROM PLACE_REVIEWS) AND ID_PLACE =".$id_place."ORDER BY ID_REVIEW DESC")->result();

        $data['place'] = $this->placemodel->get($id_place);
        if ($this->session->has_userdata('username')){
            $username = $this->session->userdata('username');
            $data['beenReview'] = $this->reviewplacemodel->isReviewed($id_place,$username);
            $data['beenReport'] = $this->placemodel->isReported($id_place,$username);
            $data['user'] = $this->usermodel->get($username);
            $this->load->view('detail_places',$data);
        }
        else{
            $this->load->view('detail_places',$data);
        }

    }

    public function review(){
        $id_place = $this->input->post('id_place');
        $rate = $this->input->post('rate');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('userfileReviewPlace'))
        {
            $error = array('error' => $this->upload->display_errors());
            die($error['error']);
        }
        else
        {
            $author =$this->session->userdata('username');;
            $data_upload = array('upload_data' => $this->upload->data());

            $data = array(
                'RATE' => $rate,
                'IMAGE' => $data_upload['upload_data']['file_name'],
                'NOTES' => $this->input->post('notesReviewPlace'),
                'CREATED_AT' => date("d-M-y"),
                'AUTHOR' => $author,
                'ID_PLACE' => $id_place
            );

            $this->reviewplacemodel->insert($data);
            redirect(site_url('places/detail/').$id_place);
        }
    }
    
}